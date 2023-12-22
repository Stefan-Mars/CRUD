@extends('layouts.head')
@section('content')
    @include('layouts/nav')
    <div class='w-full h-view bg-slate-200'>
        <br>

        <div class='flex justify-center'>
            <form action="/projects" method="POST" class='p-10 rounded-sm bg-white border'>
                @csrf
                <a href="/"><i class="fa-solid fa-arrow-left fa-xl"></i></a>
                <h1 class="text-center text-xl">Nieuw Project</h1>
                <table class='border-separate'>
                    <tr>
                        <td>Klant Naam</td>
                        <td class='text-center h-10'>
                            <input type="text" name="KlantNaam" id="KlantNaam" placeholder="Klantnaam"
                                value='{{ old('Klantnaam') }}' class='w-full border h-full'>
                            @error('KlantNaam')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Project Adres</td>
                        <td class='text-center h-10'>
                            <input type="text" name="ProjectAdres" id="ProjectAdres" placeholder="Project Adres"
                                value='{{ old('ProjectAdres') }}' class='w-full border h-full'>
                            @error('ProjectAdres')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    <td>Email</td>
                    <td class='text-center h-10'>
                        <input type="email" name="Email" id="Email" placeholder="Email"
                            class='w-full border h-full'value='{{ old('Email') }}'>
                        @error('Email')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </td>
                    </tr>

                    <script>
                        function red(kozijn) {
                            var selectElement = document.getElementById(kozijn);
                            if (selectElement.value === '') {
                                selectElement.style.border = '1px solid red';
                            } else {
                                selectElement.style.border = '';
                            }
                        }
                    </script>
                    @foreach ($kozijnen as $kozijn)
                        <tr>
                            <td>
                                <label id='label{{ $kozijn->kozijn }}'
                                    for="{{ $kozijn->kozijn }}">{{ str_replace('_', ' ', $kozijn->kozijn) }}</label>
                            </td>
                            <td class="h-10">
                                <select class='w-full border h-full' name="{{ $kozijn->kozijn }}"
                                    id="{{ $kozijn->kozijn }}" onchange="red('{{ $kozijn->kozijn }}')">
                                    <option value="" disabled selected>Selecteer optie</option>
                                    @foreach ($attributes[$kozijn->id - 1] as $attribute)
                                        <option @if (old($kozijn->kozijn) == $attribute->attribute) selected @endif
                                            value="{{ $attribute->attribute }}">{{ $attribute->attribute }}</option>
                                    @endforeach
                                </select>
                                @error($kozijn->kozijn)
                                    <p class="text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </td>
                            <td class="h-10"><input type="text" class='border h-full' placeholder="Extra Info"
                                    name='extra{{ $kozijn->kozijn }}'></td>
                        </tr>
                        <script>
                            red('{{ $kozijn->kozijn }}')
                        </script>
                    @endforeach

                    <tr class='text-center'>
                        <td colspan="3" class='h-10'><button
                                class='bg-red-500 p-1 rounded-sm w-full h-full'type="submit">Opslaan</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>


    </div>
@endsection
