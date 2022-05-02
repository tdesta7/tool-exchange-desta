<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Services\PetService;
use App\Http\Requests\StorePetRequest;

class PetController extends Controller
{
    public function __construct(
        private PetService $petService
    ) { }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = $this->petService->getPets();

        return view('petlist', [
            'pets' => $pets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('access-pets-create');

        return view('petform', [
            'pet' => null,
            'petTypes' => $this->petService->getPetTypes()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePetRequest $request)
    {
        $this->authorize('create', Pet::class);

        // validate form input
        $validatedInput = $request->validated();
        // call petService::savePet(name, typeId)
        // this should return the pet with its auto-generated PK
        $pet = $this->petService->savePet($validatedInput['name'], $validatedInput['type']);

        return redirect()->route('viewPets');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $pet = $this->petService->getPetById($id);

        return view('petform', [
            'pet' => $pet,
            'petTypes' => $this->petService->getPetTypes()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(StorePetRequest $request)
    {
        $validatedInput = $request->validated();

        $pet = $this->petService->updatePet(
            $validatedInput['id'],
            $validatedInput['name'],
            $validatedInput['type']
        );

        return redirect()->route('viewPets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = [
            'records_deleted' => $this->petService->deletePet($id)
        ];

        return response()->json($data);
    }
}
