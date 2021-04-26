<div class="grid grid-cols-2 gap-8">
    {{-- Collections --}}
    <div class="col-span-1">
        <h3 class="mb-2 font-medium text-lg">Kolekcje</h3>
        <table class="w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nazwa</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Akcje</th>
                </tr>
                <thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($collections as $collection)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $collection->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm ">
                            <button class="text-red-500" onClick="window.confirm('Czy na pewno chcesz usunąć?')"
                                wire:click.debounce.200ms="deleteCollection({{ $collection->id }})">Usuń</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>

        <div class="w-full mt-8 rounded shadow-sm bg-white">
            <div class="flex justify-between p-5 space-x-4">
                <label for="formCollectionName" class="flex-1">
                    <div class="font-semibold text-gray-700 mb-2">Nazwa kolekcji</div>
                    <input type="text" name="formCollectionName" id="formCollectionName" placeholder="Carina..."
                        wire:model="formCollectionName"
                        class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
                    @error('formCollectionName')
                    <div class="bg-red-50 text-red-500 p-2 rounded mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </label>
            </div>

            <div class="bg-gray-50 p-3 flex justify-end">
                <button class="rounded bg-indigo-500 text-white px-3 py-2"
                    wire:click.debounce.200ms="addCollection">Dodaj</button>
            </div>

        </div>
    </div>
</div>
</div>