<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Themas') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8 text-white">
        <h3 class="text-center">Thema's Tabel</h3>

        <a href="{{ route('themas.create') }}" class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-md">Thema Toevoegen</a>

        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Thema</th>
                    <th class="px-4 py-2">Edit</th>
                    <th class="px-4 py-2">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($themas as $thema)
                    <tr>
                        <td class="border px-4 py-2 text-center">{{ $thema->id }}</td>
                        <td class="border px-4 py-2 text-center">{{ $thema->thema }}</td>
                        <td class="border px-4 py-2 text-center">
                            <a href="{{ route('themas.edit', $thema->id) }}" class="text-blue-500">Edit</a>
                        </td>
                        <td class="border px-4 py-2 text-center">
                            <form action="{{ route('themas.destroy', $thema->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
