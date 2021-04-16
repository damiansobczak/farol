<div class="grid grid-cols-2 gap-8">

    {{-- Colors --}}
    <div class="col-span-1">
        <h3 class="mb-2 font-medium text-lg">Kolory</h3>
        <table class="w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nazwa</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Kolor</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Akcje</th>
                </tr>
                <thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($colors as $color)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $color->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $color->color }}</td>
                        <td>
                            <button class="text-red-500" onClick="window.confirm('Czy na pewno chcesz usunąć?')"
                                wire:click.debounce.200ms="deleteColor({{ $color->id }})">Usuń</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>

        <div class="w-full mt-8 rounded shadow-sm bg-white">
            <div class="flex justify-between p-5 space-x-4">
                <label for="formColorName" class="flex-1">
                    <div class="font-semibold text-gray-700 mb-2">Nazwa koloru</div>
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
                    <div class="font-semibold text-gray-700 mb-2">Kolor</div>
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


            <div class="bg-gray-50 p-3 flex justify-end">
                <button class="rounded bg-indigo-500 text-white px-3 py-2"
                    wire:click.debounce.200ms="addColor">Dodaj</button>
            </div>
        </div>
    </div>

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

    {{-- Materials --}}

    <div class="col-span-2">
        <h3 class="mb-2 font-medium text-lg">Materiały</h3>
        <table class="w-full">
            <thead>
                <tr>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ID</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nazwa</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Kod</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Transmisja</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Absorpcja</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Refleksja</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Obrazek</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Kolor</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Kolekcja</th>
                    <th
                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Akcje</th>
                </tr>
                <thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($materials as $material)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $material->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $material->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $material->code }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $material->transmission }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $material->absorption }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $material->reflection }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <img src="{{ $material->img }}" class="rounded-full w-8 h-8 object-cover" alt="">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $material->color->name ?? 'Brak koloru' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $material->collection?->name ?? 'Brak kolekcji' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <button class="text-red-500" onClick="window.confirm('Czy na pewno chcesz usunąć?')"
                                wire:click.debounce.200ms="deleteMaterial({{ $material->id }})">Usuń</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>

        <div class="w-full mt-8 rounded shadow-sm bg-white">
            <div class="flex justify-between p-5 flex-wrap">
                <div class="w-full mb-4">
                    <p class="uppercase tracking-wider text-xs text-gray-700 font-semibold">Ogólne informacje</p>
                    <div class="border-b border-gray-200 my-4"></div>
                </div>
                <label for="formMaterialName" class="w-full md:w-1/2 pr-4 pb-4">
                    <div class="font-semibold text-gray-700 mb-2">Nazwa materiału</div>
                    <input type="text" name="formMaterialName" id="formMaterialName" placeholder="Materiał..."
                        wire:model="formMaterialName"
                        class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
                    @error('formMaterialName')
                    <div class="bg-red-50 text-red-500 p-2 rounded mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </label>

                <label for="formMaterialCode" class="w-full md:w-1/2 pr-4 pb-4">
                    <div class="font-semibold text-gray-700 mb-2">Kod</div>
                    <input type="text" name="formMaterialCode" id="formMaterialCode" placeholder="A602.."
                        wire:model="formMaterialCode"
                        class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
                </label>

                <div class="w-full mt-6 mb-4">
                    <p class="uppercase tracking-wider text-xs text-gray-700 font-semibold">Charakterystyka</p>
                    <div class="border-b border-gray-200 my-4"></div>
                </div>
                <label for="formMaterialTransmission" class="w-full md:w-1/3 pr-4 pb-4">
                    <div class="font-semibold text-gray-700 mb-2">Transmisja</div>
                    <input type="text" name="formMaterialTransmission" id="formMaterialTransmission" placeholder="0%.."
                        wire:model="formMaterialTransmission"
                        class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
                </label>

                <label for="formMaterialReflection" class="w-full md:w-1/3 pr-4 pb-4">
                    <div class="font-semibold text-gray-700 mb-2">Refleksja</div>
                    <input type="text" name="formMaterialReflection" id="formMaterialReflection" placeholder="0%.."
                        wire:model="formMaterialReflection"
                        class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
                </label>

                <label for="formMaterialAbsorption" class="w-full md:w-1/3 pr-4 pb-4">
                    <div class="font-semibold text-gray-700 mb-2">Absorpcja</div>
                    <input type="text" name="formMaterialAbsorption" id="formMaterialAbsorption" placeholder="0%.."
                        wire:model="formMaterialAbsorption"
                        class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
                </label>

                <div class="w-full mt-6 mb-4">
                    <p class="uppercase tracking-wider text-xs text-gray-700 font-semibold">Media</p>
                    <div class="border-b border-gray-200 my-4"></div>
                </div>
                <label for="formMaterialImage" class="w-full md:w-1/2 pr-4 pb-4">
                    <div class="font-semibold text-gray-700 mb-2">Obrazek</div>
                    <input type="file" name="formMaterialImage" id="formMaterialImage" placeholder="A602.."
                        wire:model="formMaterialImage"
                        class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
                    @error('formMaterialImage')
                    <div class="bg-red-50 text-red-500 p-2 rounded mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </label>

                <label for="formMaterialImageAlt" class="w-full md:w-1/2 pr-4 pb-4">
                    <div class="font-semibold text-gray-700 mb-2">Podpis obrazka</div>
                    <input type="text" name="formMaterialImageAlt" id="formMaterialImageAlt" placeholder="A602.."
                        wire:model="formMaterialImageAlt"
                        class="aoutline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
                </label>

                <div class="w-full mt-6 mb-4">
                    <p class="uppercase tracking-wider text-xs text-gray-700 font-semibold">Przypisy</p>
                    <div class="border-b border-gray-200 my-4"></div>
                </div>
                <label for="formMaterialColor" class="w-full md:w-1/2 pr-4 pb-4">
                    <div class="font-semibold text-gray-700 mb-2">Kolor</div>
                    <select id="formMaterialColor" name="formMaterialColor" wire:model="formMaterialColor"
                        class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
                        <option value="" selected>Wybierz...</option>
                        @foreach ($colors as $color)
                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                    @error('formMaterialColor')
                    <div class="bg-red-50 text-red-500 p-2 rounded mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </label>

                <label for="formMaterialCollection" class="w-full md:w-1/2 pr-4 pb-4">
                    <div class="font-semibold text-gray-700 mb-2">Kolekcja</div>
                    <select id="formMaterialCollection" name="formMaterialCollection"
                        wire:model="formMaterialCollection"
                        class="aoutline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
                        <option value="" selected>Wybierz...</option>
                        @foreach ($collections as $collection)
                        <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                        @endforeach
                    </select>
                    @error('formMaterialCollection')
                    <div class="bg-red-50 text-red-500 p-2 rounded mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </label>
            </div>

            <div class="bg-gray-50 p-3 flex justify-end">
                <button class="rounded bg-indigo-500 text-white px-3 py-2 mt-4"
                    wire:click.debounce.200ms="addMaterial">Dodaj</button>
            </div>

        </div>

    </div>
</div>