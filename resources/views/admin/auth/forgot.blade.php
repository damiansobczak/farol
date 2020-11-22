@extends('layouts/admin')
@section('title', 'Login to Admin panel')
@section('content')
    <div class="container mx-auto w-full h-full flex justify-center items-center">
        <form class="md:w-1/2 xl:w-2/6 h-auto bg-white p-8 rounded shadow">
            <div class="pb-3 border-b border-gray-200">
                <h1 class="pb-1 text-gray-700 text-base">Przypomnienie hasła</h1>
                <p class="text-gray-400 text-sm font-light">Wiadomość z linkiem resetującym hasło zostanie wysłana na podany niżej adres email.</p>
            </div>
            <div class="my-4 p-3 rounded border border-red-300 text-red-400 bg-red-100 text-xs flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" height="24" width="24" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="pl-2">Informacje podane w formularzu nie są prawidłowe. Upewnij się że wpisujesz poprawne dane i spróbuj ponownie.</span>
            </div>
            <div class="my-4 p-3 rounded text-white bg-green-500 text-xs flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" height="24" width="24" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="pl-2">Link resetujący został poprawnie wysłany na podany adres email.</span>
            </div>
            <label for="email" class="text-sm text-gray-400 my-4 block">
                <p class="mb-2 text-gray-500">Adres Email:</p>
                <input class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200"type="email" name="email" id="email" placeholder="np. admin@poczta.pl">
            </label>
            <button class="bg-indigo-500 py-2 px-3 rounded text-white text-sm hover:bg-indigo-700" type="submit">Wyślij przypomnienie</button>
        </form>
    </div>
@endsection
