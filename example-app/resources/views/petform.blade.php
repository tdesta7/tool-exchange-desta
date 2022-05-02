<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pet Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/pets/store" method="post">
                        @csrf

                        @isset($pet)
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$pet->id}}">
                        @endisset
                        <div>
                            <label for="name">Pet's name:</label>
                            <input type="text" name="name" id="name" value="{{$pet ? $pet->name : null}}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="type">Type of pet:</label>
                            <select name="type" id="type">
                                <option value=""></option>
                                @foreach($petTypes as $type):
                                    <option value="{{$type->id}}"
                                        {{$pet && $pet->petType->id === $type->id ? 'selected' : ''}}
                                        >{{$type->name}}</option>
                                @endforeach
                            </select>
                            @error('type')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit">Save pet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
