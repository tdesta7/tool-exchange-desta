<?php

namespace Tests\Unit;

use App\Repositories\PetRepository;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Services\PetService;

class PetServiceTest extends TestCase
{
    private PetService $petService; // subject under test (i.e. the class i'm testing)

    protected function setUp(): void
    {
        parent::setUp();
        $petRepoMock = $this->mock(PetRepository::class);
        $petRepoMock->shouldReceive('getPets')->once()->andReturn([
            'Salem',
            'Merlin',
            'Albus',
        ]);

        $this->petService = $this->app->make(PetService::class);
    }

    public function test_get_pets_returns_expected_array_values()
    {
        // arrange (setup your test data)
        $expectedPets = ['Salem', 'Merlin', 'Albus'];

        // act (call a method that "runs" the test)
        $actualPets = $this->petService->getPets();

        // assert (verify actual state matches your expectations)
        $this->assertEquals($expectedPets, $actualPets);
    }
}
