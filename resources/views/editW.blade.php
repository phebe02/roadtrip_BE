<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woord Bewerken</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Woord Bewerken</h1>
        <form action="{{ route('words.update', $woord->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="woord" class="block text-gray-700">Woord</label>
                <input type="text" name="woord" id="woord" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $woord->woord }}">
            </div>
            <div class="mb-4">
                <label for="themas" class="block text-gray-700">Thema's</label>
                @foreach ($themas as $thema)
                    <div>
                        <input type="checkbox" name="themas[]" value="{{ $thema->id }}" id="thema-{{ $thema->id }}" {{ in_array($thema->id, $woord->themas->pluck('id')->toArray()) ? 'checked' : '' }}>
                        <label for="thema-{{ $thema->id }}">{{ $thema->thema }}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Opslaan</button>
            <a href="{{ route('home') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md">Annuleren</a>
        </form>
    </div>
</body>
</html>

