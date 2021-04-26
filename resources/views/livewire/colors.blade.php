<div class="w-full">
    <table class="w-full">
        <thead>
            <tr>
                <th
                    class="px-3 py-3 bg-gray-50 text-left text-xs font-medium rounded text-gray-500 uppercase tracking-wider">
                    Nazwa</th>
                <th class="py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Kolor</th>
                <th
                    class="py-3 bg-gray-50 text-left text-xs font-medium rounded text-gray-500 uppercase tracking-wider">
                    Akcje</th>
            </tr>
            <thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($colors as $color)
                <tr>
                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">{{ $color->name }}</td>
                    <td class="py-4 whitespace-nowrap text-sm text-gray-500">{{ $color->color }}</td>
                    <td class="space-x-4 text-sm">
                        <button class="text-red-500"
                            onclick="confirm('Czy na pewno chcesz usunąć?') || event.stopImmediatePropagation()"
                            wire:click.debounce.200ms="deleteColor({{ $color->id }})">Usuń</button>
                        <button class="text-indigo-500"
                            wire:click.debounce.200ms="openEditModal({{ $color->id }})">Edytuj</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
    </table>

    <div class="w-full mt-8">
        <div
            class="flex items-center w-full justify-between font-medium text-sm text-gray-600 border-b border-gray-200 pb-4 mb-4">
            Dodaj kolor
        </div>
        <div class="flex justify-between space-x-4">
            <label for="formColorName" class="flex-1">
                <div class="font-semibold text-gray-700 mb-2 text-sm">Nazwa koloru</div>
                <input
                    class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200"
                    type="text" name="formColorName" id="formColorName" placeholder="Niebieski..."
                    wire:model="formColorName">
                @error('formColorName')
                <div class="bg-red-50 text-red-500 p-2 rounded mt-2">
                    {{ $message }}
                </div>
                @enderror
            </label>

            <label for="formColorColor" class="flex-1">
                <div class="font-semibold text-gray-700 text-sm mb-2">Kolor</div>
                <input type="color" name="formColorColor" id="formColorColor" placeholder="#ffffff"
                    wire:model="formColorColor"
                    class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
                @error('formColorColor')
                <div class="bg-red-50 text-red-500 p-2 rounded mt-2">
                    {{ $message }}
                </div>
                @enderror
            </label>
        </div>


        <div class="mt-4 flex justify-end">
            <button class="rounded bg-indigo-500 text-white px-3 py-2"
                wire:click.debounce.200ms="addColor">Dodaj</button>
        </div>
    </div>

    @if ($modal)
    <div class="fixed z-50 bg-black bg-opacity-20 top-0 left-0 w-screen h-screen flex items-center justify-center">
        <div class="bg-white rounded shadow-sm px-8 p-5 w-1/3 relative">
            <button wire:click.debounce.200ms="closeEditModal()"
                class="bg-white w-6 h-6 flex items-center justify-center absolute rounded-full -right-3 -inset-y-2 border hover:bg-indigo-600 hover:text-white hover:border-indigo-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <label for="editFormColorName" class="text-sm text-gray-500 font-semibold block mt-4"">
				<p class=" mb-2 text-gray-500">Nazwa:</p>
                <input
                    class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200"
                    wire:model="editFormColorName" type="text" name="editFormColorName" id="editFormColorName" />
            </label>
            <label for="editFormColor" class="text-sm text-gray-500 font-semibold block mt-4"">
				<p class=" mb-2 text-gray-500">Kolor:</p>
                <input type="color" name="editFormColor" id="editFormColor" placeholder="#ffffff"
                    wire:model="editFormColor"
                    class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
            </label>
            <div class="w-full flex">
                <button class="rounded bg-indigo-500 text-white px-3 py-2 mt-4 ml-auto"
                    wire:click.debounce.200ms="editColor()">Zapisz</button>
            </div>
        </div>
    </div>
    @endif
</div>