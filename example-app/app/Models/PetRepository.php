<?php

namespace App\Repositories;

use App\Models\Pet;
use App\Models\PetType;
use Illuminate\Database\Eloquent\Collection;

class PetRepository
{
    // in reality this class will utilize Eloquent models to query the DB

    public function getPets(): Collection
    {
        return Pet::orderBy('name')->get();
    }

    public function getPetById(int $id): Pet
    {
        return Pet::find($id);
    }

    public function getPetTypes(): Collection
    {
        return PetType::orderBy('name')->get();
    }

    public function savePet(string $name, int $typeId): Pet
    {
        $type = PetType::find($typeId);
        $pet = Pet::factory()->make(['name' => $name]);

        $type->pets()->save($pet);

        return $pet;
    }

    public function updatePet(int $id, string $name, int $typeId): Pet
    {
        $pet = Pet::find($id);
        $type = PetType::find($typeId);

        $pet->name = $name;

        if ($typeId !== $pet->petType->id) {
            $type->pets()->save($pet);
        }

        $pet->save();

        return $pet;
    }

    public function deletePet(int$id): int {
        return Pet::destroy($id);
    }
}
