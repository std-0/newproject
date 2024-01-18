@extends('layouts.app')

@section('content')
    <div class="h-screen flex flex-col space-y-10 justify-center items-center">
        <div class="w-96 shadow-xl rounded p-5">
            <h1 class="text-3xl font-medium top">Autentificare</h1>
            <form method="POST" action="{{ route("login_process") }}" class="space-y-5 mt-5">
                @csrf
                <input name="email" type="text" class="w-full h-12 border rounded px-3 @error('email') border-red-500 @enderror" placeholder="Email" />
                @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input name="password" type="password" class="w-full h-12 border rounded px-3 @error('password') border-red-500 @enderror" placeholder="Parolă" />
                @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <div>
                    <a href="{{ route("register") }}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Înregistrează-te</a>
                </div>
  
                <button type="submit" class="d-flex align-items-center btn btn-primary">Conectează-te</button>
            </form>
        </div>
    </div>
@endsection