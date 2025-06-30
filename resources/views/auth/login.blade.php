@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-50">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-lg shadow-md p-8 border border-violet-300">
            <h2 class="text-3xl text-center font-semibold mb-6">Page de Connexion</h2>
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="block mb-1 font-medium">Adresse mail*</label>
                    <input id="email" type="email" name="email" required autofocus
                        class="w-full px-4 py-2 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-violet-300">
                </div>
                <div>
                    <label for="password" class="block mb-1 font-medium">Mot de passe*</label>
                    <input id="password" type="password" name="password" required
                        class="w-full px-4 py-2 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-violet-300">
                </div>
                <div class="text-center">
                    <button type="submit"
                        class="bg-gray-200 hover:bg-gray-300 text-xl rounded-full px-8 py-2 font-medium transition">
                        Se connecter
                    </button>
                </div>
                <div class="text-center mt-2">
                    <a href="{{ route('password.request') }}" class="underline text-sm text-gray-600">Mot de passe oublié?</a>
                </div>
                <div class="text-center mt-3 font-bold">
                    Pas encore de compte ? <a href="{{ route('register') }}" class="underline">Inscrivez-vous</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsectionwqqz"