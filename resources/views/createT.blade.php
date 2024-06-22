<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thema Toevoegen') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8">
        <h3 class="text-center text-white">Nieuw Thema</h3>

        <form action="{{ route('themas.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="thema" class="block text-gray-700">Thema</label>
                <input type="text" name="thema" id="thema" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Toevoegen</button>
            <a href="{{ route('themas') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md">Annuleren</a>
        </form>
    </div>
</x-app-layout>
