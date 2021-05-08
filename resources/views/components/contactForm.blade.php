<form class="bg-gray-50 p-8 rounded space-y-5 w-full h-full">
    <h4 class="text-xl font-display font-semibold">Formularz kontaktowy</h4>
    <label for="email" class="flex flex-col">
        <span class="text-primary text-sm mb-2">E-mail</span>
        <input
            class="rounded-md border-gray-300 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
            id="email" type="email" name="email">
    </label>
    <label for="phone" class="flex flex-col">
        <span class="text-primary text-sm mb-2">Numer telefonu</span>
        <input
            class="rounded-md border-gray-300 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
            id="phone" type="tel" name="phone">
        <p class="text-gray-400 text-xs mt-2">Nie musisz się obawiać, Twój telefon nie będzie wykorzystany do kampani
            marketingowych</p>
    </label>
    <label for="message" class="flex flex-col">
        <span class="text-primary text-sm mb-2">Wiadomość</span>
        <textarea
            class="text-sm text-secondary rounded-md border-gray-300 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
            id="message" name="message"></textarea>
    </label>
    <button
        class="rounded-full flex items-center justify-center px-6 py-3 bg-green-500 text-white text-sm hover:bg-green-600 transition-colors">
        Wyślij zapytanie
    </button>
</form>