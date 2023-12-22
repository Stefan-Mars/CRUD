@extends('layouts/head')
@section('content')
    <div class='w-full h-screen bg-slate-200'>

        <form class='flex flex-col items-center h-[70%] text-center'method='POST' action="/users">
            <h1 class='text-5xl mt-[10%]'>Register</h1><br>
            @csrf
            <input value="{{ old('name') }}"placeholder='Name' name='name'maxlength='40' minlength="3"
                class='h-[10%] w-[30%] shadow-sm shadow-gray-500 p-4 text-black -mb-2'type="text">
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <br>
            <input value="{{ old('email') }}"placeholder='Email' name='email'maxlength='40'
                class='h-[10%] w-[30%] shadow-sm shadow-gray-500 p-4 text-black'type="email">
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <div class='w-full relative'>
                <input placeholder='Wachtwoord'
                    name='password'class='h-[80%] w-[30%] shadow-sm shadow-gray-500 mt-4 p-4 text-black' type="password"
                    id='password-input'>
                <span class='text-black z-20 flex top-2 right-[36%] absolute items-center h-full cursor-pointer'
                    id='showPassword'></span>

            </div>
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <div class='w-full relative'>
                <input placeholder='Bevestig Wachtwoord'
                    name='password_confirmation'class='h-[80%] w-[30%] shadow-sm shadow-gray-500 mt-4 p-4 text-black'
                    type="password" id='confirm-password-input'>
                <span class='text-black z-20 flex top-2 right-[36%] absolute items-center h-full cursor-pointer'
                    id='showConfirmPassword'></span>
            </div>
            @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <br>
            <button
                class='bg-red-600 h-[15%] w-[30%] shadow-sm shadow-gray-500 p-4 font-bold text-2xl text-center text-white '
                type='submit'>Register</button><br>
            <a id='link'href="/users/login" class='mt-4 underline'>Already have an account?</a>

        </form>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                $('#showPassword').html('<i class="fa-solid fa-eye-slash"></i>');

                $('#showPassword').on("click", function() {
                    var x = $('#password-input');
                    if (x.attr("type") == "password") {
                        x.attr("type", "text");
                        $('#showPassword').html('<i class="fa-solid fa-eye"></i>');
                    } else {
                        x.attr("type", "password");
                        $('#showPassword').html('<i class="fa-solid fa-eye-slash"></i>');
                    }
                });

                $('#showConfirmPassword').html('<i class="fa-solid fa-eye-slash"></i>');

                $('#showConfirmPassword').on("click", function() {
                    var x = $('#confirm-password-input');
                    if (x.attr("type") == "password") {
                        x.attr("type", "text");
                        $('#showConfirmPassword').html('<i class="fa-solid fa-eye"></i>');
                    } else {
                        x.attr("type", "password");
                        $('#showConfirmPassword').html('<i class="fa-solid fa-eye-slash"></i>');
                    }
                });
            });
        </script>
    </div>
@endsection
