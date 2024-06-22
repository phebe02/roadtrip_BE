<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Woorden') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8">
        <h3 class="text-center text-white">Woorden Tabel</h3>

        <a href="{{ route('words.create') }}" class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-md">Woord Toevoegen</a>

        <table class="table-auto w-full mt-4 text-white ">
            <thead>
                <tr>
                    <th class="px-4 py-2 ">@sortablelink('id', 'ID')</th>
                    <th class="px-4 py-2">@sortablelink('woord', 'Woord')</th>

                    <th class="px-4 py-2">Edit</th>
                    <th class="px-4 py-2">Delete</th>
                </tr>
            </thead>
            <tbody>
                @if($woorden->count())
                    @foreach($woorden as $woord)
                        <tr>
                            <td class="border px-4 py-2 text-center">{{ $woord->id }}</td>
                            <td class="border px-4 py-2 text-center">{{ $woord->woord }}</td>

                            <td class="border px-4 py-2 text-center">
                                <a href="{{ route('words.edit', $woord->id) }}" class="text-blue-500">Edit</a>
                            </td>
                            <td class="border px-4 py-2 text-center">
                                <form action="{{ route('words.destroy', $woord->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" data-modal-target="modelConfirm" class="bg-red-500 text-white px-4 py-2 rounded delete-button">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="border px-4 py-2 text-center" colspan="5">No woorden found</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="mt-4">
            {!! $woorden->appends(request()->except('page'))->render() !!}
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="modelConfirm" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4">
        <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">
            <div class="flex justify-end p-2">
                <button onclick="closeModal('modelConfirm')" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="p-6 pt-0 text-center">
                <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you sure you want to delete this woord?</h3>
                <button id="confirm-delete" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                    Yes, I'm sure
                </button>
                <button onclick="closeModal('modelConfirm')"
                    class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center">
                    No, cancel
                </button>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.openModal = function(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
            document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden');
        }

        window.closeModal = function(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden');
        }

        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('button[data-modal-target="modelConfirm"]');
            const confirmDeleteButton = document.getElementById('confirm-delete');
            let formToSubmit;

            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    formToSubmit = this.closest('td').querySelector('form');
                    openModal('modelConfirm');
                });
            });

            confirmDeleteButton.addEventListener('click', function () {
                if (formToSubmit) {
                    formToSubmit.submit();
                }
            });
        });

        document.onkeydown = function(event) {
            event = event || window.event;
            if (event.keyCode === 27) {
                document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden');
                let modals = document.getElementsByClassName('modal');
                Array.prototype.slice.call(modals).forEach(i => {
                    i.classList.add('hidden');
                });
            }
        };
    </script>
</x-app-layout>
