<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thema Bewerken') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8">
        <h3 class="text-center text-white">Thema Bewerken</h3>

        <form action="{{ route('themas.update', $thema->id) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="thema" class="block text-white">Thema</label>
                <input type="text" name="thema" id="thema" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $thema->thema }}">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Opslaan</button>
            <a href="{{ route('themas') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md">Annuleren</a>
        </form>
    </div>
</x-app-layout>
