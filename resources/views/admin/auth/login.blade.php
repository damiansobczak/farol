@extends('layouts/admin')
@section('title', 'Login to Admin panel')
@section('content')
    <div class="container mx-auto w-full h-full flex justify-center items-center">
        <form method="POST" action="{{ route('login') }}" class="md:w-1/2 xl:w-2/6 h-auto bg-white p-8 rounded shadow">
            @csrf
            <div class="pb-3 border-b border-gray-200">
                <h1 class="pb-1 text-gray-700 text-base">Panel administracyjny</h1>
                <p class="text-gray-400 text-sm font-light">Dostęp do panelu administracyjnego posiadają wyłącznie pracownicy sklepu.</p>
            </div>
            @error('email')
                <div class="my-4 p-3 rounded border border-red-300 text-red-400 bg-red-100 text-xs flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" height="24" width="24" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="pl-2">Informacje podane w formularzu nie są prawidłowe. Upewnij się że wpisujesz poprawne dane i spróbuj ponownie.</span>
                </div>
            @enderror
            <label for="email" class="text-sm text-gray-400 mt-4 block">
                <p class="mb-2 text-gray-500">Adres Email:</p>
                <input class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200"type="email" name="email" id="email" placeholder="np. admin@poczta.pl" value="{{ old('email') }}" required autocomplete="email">
            </label>
            <label for="password" class="text-sm text-gray-400 my-4 block">
                <p class="mb-2 text-gray-500">Hasło:</p>
                <input class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200"type="password" name="password" id="password" placeholder="Hasło jest ukryte" required autocomplete="current-password">
            </label>

{{--            Checked classes need to be anabled in tailwind config in order to work--}}
            <label for="remember" class="flex items-center block cursor-pointer mb-3">
                <input type="checkbox" id="remember" name="remember" class="font-light form-tick h-5 w-5 border text-xs rounded border-gray-200 rounded-md checked:bg-indigo-600 checked:border-transparent focus:outline-none" {{ old('remember') ? 'checked' : '' }}>
                <p class="text-sm text-gray-500 ml-2 font-light">Zapamiętaj mnie</p>
            </label>
            <div class="mt-5 flex items-center justify-between">
                <button class="bg-indigo-500 py-2 px-3 rounded text-white text-sm hover:bg-indigo-700" type="submit">Zaloguj się</button>
                <a href="{{ route('password.request') }}" class="text-indigo-400 text-sm underline hover:text-indigo-300">Zapomniałeś hasła?</a>
            </div>
        </form>
    </div>
@endsection
