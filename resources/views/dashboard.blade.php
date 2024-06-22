<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welkom op de Admin Pagina van de Roadtrip Game App') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <p class="text-lg text-gray-600 dark:text-gray-400 mb-4">
                    Je bevindt je nu op de admin pagina van de Roadtrip Game App. Hier kun je verschillende beheertaken uitvoeren:
                </p>
                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-2">Woorden</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        Op de <a href="{{ route('home') }}" class="text-blue-500">Woorden</a> pagina krijg je een lijst van alle woorden die in het spel worden gebruikt. Hier kun je:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 dark:text-gray-400">
                        <li>Woorden toevoegen</li>
                        <li>Woorden aanpassen</li>
                        <li>Woorden verwijderen</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-2">Thema's</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        Op de <a href="{{ route('themas') }}" class="text-blue-500">Thema's</a> pagina krijg je een lijst van alle thema's die in het spel worden gebruikt. Hier kun je:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 dark:text-gray-400">
                        <li>Thema's toevoegen</li>
                        <li>Thema's aanpassen</li>
                        <li>Thema's verwijderen</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
