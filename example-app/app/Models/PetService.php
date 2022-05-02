<?php

namespace App\Services;

use App\Models\Pet;
use App\Repositories\PetRepository;
use Illuminate\Database\Eloquent\Collection;

class PetService
{
    public function __construct(
        private PetRepository $petRepository
    ) {}

    public function getPets(): Collection
    {
        return $this->petRepository->getPets();
    }

    public function getPetById(int $id): Pet
    {
        return $this->petRepository->getPetById($id);
    }

    public function getPetTypes(): Collection
    {
        return $this->petRepository->getPetTypes();
    }

    public function savePet(string $name, int $typeId): Pet
    {
        return $this->petRepository->savePet($name, $typeId);
    }

    public function updatePet(int $id, string $name, int $typeId): Pet
    {
        return $this->petRepository->updatePet($id, $name, $typeId);
    }

    public function deletePet(int $id): int
    {
        return $this->petRepository->deletePet($id);
    }
}
