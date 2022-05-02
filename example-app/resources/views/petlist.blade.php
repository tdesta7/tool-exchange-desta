<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Pets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div x-data="petlist"
                     class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('viewForm')}}">Add a pet to the list</a>
                    <ul>My pets:
                        @foreach($pets as $pet)
                            <li x-data="{ petName: '{{$pet->name}}'}"
                                x-init="addPet(petName)"
                                x-show="!isPetDeleted(petName)">
                                {{$pet->name}} - {{$pet->petType->name}} |
                                <a href="/pets/edit/{{$pet->id}}">Edit</a> |
                                <button @click="confirmDelete(petName, {{$pet->id}})"
                                   type="button">Delete</button> |
                                <label>
                                    <input
                                        type="checkbox"
                                        name="fed-{{ strtolower($pet->name) }}"
                                        id="fed-{{ strtolower($pet->name) }}"
                                        @click="updateFedPets($event, petName)"
                                    ><span x-text="getLabelText(petName)"></span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                    <div x-show="isAnyFedPets()">
                        <p x-text="fedPets()"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
