@extends('layouts.head')
@section('content')
@include('layouts/nav')
    <div class='w-full h-view bg-slate-200'>
        <br>
        <div class='flex justify-center'>
            <form action="/projects/{{ $project->id }}" method="POST" class='border p-10 rounded-sm bg-white '>
                @csrf
                @method("PUT")
                <a href="/"><i class="fa-solid fa-arrow-left fa-xl"></i></a>
                <h1 class="text-center text-xl">Bewerk {{ $project->KlantNaam }}</h1>
                <table class='border-separate'>
                    <tr>
                        <td>Klant naam</td>
                        <td class='h-10'>
                            <input type="text" name="KlantNaam" id="KlantNaam" placeholder="Klantnaam"
                                value='{{ $project->KlantNaam }}' class='w-full h-full border'>
                            @error('KlantNaam')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>ProjectAdres</td>
                        <td class='h-10'>
                            <input type="text" name="ProjectAdres" id="ProjectAdres" placeholder="Project Adres"
                                value='{{ $project->ProjectAdres }}' class='w-full h-full border'>
                            @error('ProjectAdres')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td class='h-10'>
                            <input type="email" name="Email" id="Email" placeholder="Email"
                                value='{{ $project->Email }}' class='w-full h-full border'>
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
                            <td class='h-10'>
                                <select class='w-full border h-full' name="{{ $kozijn->kozijn }}" id="{{ $kozijn->kozijn }}"
                                    onchange="red('{{ $kozijn->kozijn }}')">
                                    <option value="" disabled>Selecteer optie</option>
                                    @foreach ($attributes[$kozijn->id - 1] as $attribute)
                                        <option @if ($kozijn->pivot->value == $attribute->attribute) selected @endif
                                            value="{{ $attribute->attribute }}">{{ $attribute->attribute }}</option>
                                    @endforeach
                                </select>

                                @error($kozijn->kozijn)
                                    <p class="text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </td>
                            <td class='h-10'><input type="text" class='border h-full' placeholder="Extra Info"
                                    name='extra{{ $kozijn->kozijn }}' value='{{ $kozijn->pivot->extraInfo }}'></td>
                        </tr>
                        <script>
                            red('{{ $kozijn->kozijn }}')
                        </script>
                    @endforeach


                    <tr class='text-center'>
                        <td colspan="3" class='h-10'><button class='bg-red-500 p-1 rounded-sm w-full h-full'type="submit">Opslaan</button>
                        </td>
                    </tr>
                </table>




            </form>
        </div>
    </div>
@endsection
