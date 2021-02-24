<div class="container max-w-screen-sm mx-auto pb-12">
    <form method="POST" action="" class="w-full">
        @csrf
        <div class="pb-3 border-b border-gray-200">
            <h1 class="pb-1 text-gray-700 text-base">Dane logowania</h1>
        </div>
        <div class="my-4 p-3 rounded border border-red-300 text-red-400 bg-red-100 text-xs flex items-start">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" height="24" width="24" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="pl-2">Informacje podane w formularzu nie są prawidłowe. Upewnij się że wpisujesz poprawne dane
                i spróbuj ponownie.</span>
        </div>
        <label for="email" class="text-sm text-gray-400 mt-4 block">
            <p class="mb-2 text-gray-500">Adres Email:</p>
            <input
                class="font-light hover:border-green-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200"
                type="email" name="email" id="email" placeholder="np. admin@poczta.pl" value="" required
                autocomplete="email">
        </label>
        <label for="password" class="text-sm text-gray-400 my-4 block">
            <p class="mb-2 text-gray-500">Stare Hasło:</p>
            <input
                class="font-light hover:border-green-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200"
                type="password" name="password" id="password" placeholder="Hasło jest ukryte" required
                autocomplete="current-password">
        </label>
        <label for="password" class="text-sm text-gray-400 my-4 block">
            <p class="mb-2 text-gray-500">Nowe Hasło:</p>
            <input
                class="font-light hover:border-green-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200"
                type="password" name="password" id="password" placeholder="Hasło jest ukryte" required
                autocomplete="current-password">
        </label>
        <label for="password" class="text-sm text-gray-400 my-4 block">
            <p class="mb-2 text-gray-500">Powtórz Nowe Hasło:</p>
            <input
                class="font-light hover:border-green-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200"
                type="password" name="password" id="password" placeholder="Hasło jest ukryte" required
                autocomplete="current-password">
        </label>
    </form>
    <form method="POST" action="" class="w-full mt-12">
        @csrf
        <div class="pb-3 border-b border-gray-200">
            <h1 class="pb-1 text-gray-700 text-base">Dane adresowe</h1>
        </div>
        <div class="my-4 p-3 rounded border border-red-300 text-red-400 bg-red-100 text-xs flex items-start">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" height="24" width="24" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="pl-2">Informacje podane w formularzu nie są prawidłowe. Upewnij się że wpisujesz poprawne dane
                i spróbuj ponownie.</span>
        </div>
        <label for="email" class="text-sm text-gray-400 mt-4 block">
            <p class="mb-2 text-gray-500">Miasto, Kod pocztowy:</p>
            <input
                class="font-light hover:border-green-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200"
                type="email" name="email" id="email" placeholder="np. Warszawa, 56-400" value="" required
                autocomplete="email">
        </label>
        <label for="password" class="text-sm text-gray-400 my-4 block">
            <p class="mb-2 text-gray-500">Adres:</p>
            <input
                class="font-light hover:border-green-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200"
                type="password" name="password" id="password" placeholder="np. Warszawska 64/21A" required
                autocomplete="current-password">
        </label>
        <label for="password" class="text-sm text-gray-400 my-4 block">
            <p class="mb-2 text-gray-500">Imię i nazwisko:</p>
            <input
                class="font-light hover:border-green-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200"
                type="password" name="password" id="password" placeholder="Jan Kowalski" required
                autocomplete="current-password">
        </label>
        <label for="password" class="text-sm text-gray-400 my-4 block">
            <p class="mb-2 text-gray-500">Telefon:</p>
            <input
                class="font-light hover:border-green-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200"
                type="password" name="password" id="password" placeholder="+48 000 000 000" required
                autocomplete="current-password">
        </label>
        <div class="mt-5 flex items-center justify-end">
            <button class="bg-green-500 py-2 px-3 rounded text-white text-sm hover:bg-green-700" type="submit">Zapisz
                zmiany</button>
        </div>
    </form>
</div>