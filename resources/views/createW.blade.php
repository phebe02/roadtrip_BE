<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Woord Toevoegen') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8">
        <h3 class="text-center text-white">Nieuw Woord</h3>

        <form action="{{ route('words.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="woord" class="block  text-white">Woord</label>
                <input type="text" name="woord" id="woord" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="themas" class="block text-white">Thema's</label>
                @foreach ($themas as $thema)
                    <div>
                        <input type="checkbox" name="themas[]" value="{{ $thema->id }}" id="thema-{{ $thema->id }}">
                        <label class="text-white ml-2" for="thema-{{ $thema->id }}">{{ $thema->thema }}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Toevoegen</button>
            <a href="{{ route('home') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md">Annuleren</a>
        </form>
    </div>
</x-app-layout>
