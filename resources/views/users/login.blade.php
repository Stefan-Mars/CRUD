@extends('layouts/head')
@section('content')
    <div class='w-full h-screen bg-slate-200'>
        <form class='flex flex-col items-center 'method='POST' action="/users/authenticate">
            <h1 class='mt-[10%] text-5xl'>Login</h1><br>
            @csrf
            <input placeholder='Email' name='email'maxlength='40'
                class='h-[10%] w-[30%] shadow-sm shadow-gray-500 p-4 text-black'type="email">
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <br>
            <div class='w-full relative text-center'>
                <input placeholder='Wachtwoord'
                    name='password'class='h-[80%] w-[30%] shadow-sm shadow-gray-500 mt-4 p-4 text-black' type="password"
                    id='password-input'>
                <span class='text-black z-20 flex top-2 right-[36%] absolute items-center h-full cursor-pointer'
                    id='showPassword'></span>
            </div>
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <br>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    document.getElementById('showPassword').innerHTML = '<i class="fa-solid fa-eye-slash"></i>';

                    $('#showPassword').on("click", function() {
                        var x = $('[id="password-input"]');
                        if (x.attr("type") == "password") {
                            x.attr("type", "text");
                            document.getElementById('showPassword').innerHTML = '<i class="fa-solid fa-eye"></i>';
                        } else {
                            x.attr("type", "password");
                            document.getElementById('showPassword').innerHTML =
                                '<i class="fa-solid fa-eye-slash"></i>';
                        }
                    });
                });
            </script>

            <button
                class='bg-red-600 h-[15%] w-[30%] shadow-sm shadow-gray-500 mt-4 p-4 font-bold text-2xl text-center text-white'
                type='submit'>Login</button><br>
            <a id='link' class="underline mt-4"href="/users/register">Heb je geen account?</a>
        </form>
    </div>
@endsection
