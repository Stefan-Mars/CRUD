@extends('layouts.head')
@section('content')
    <div class='w-full h-view bg-slate-200'>
        <br>

        <div class='flex justify-center'>
            <form action="/projects" method="POST" class='p-10 rounded-sm bg-white border'>
                @csrf
                <a href="/"><i class="fa-solid fa-arrow-left"></i>Back</a>
                <h1 class="text-center">Nieuw Project</h1>
                <table class='border-separate'>
                    <tr>
                        <td>Klant Naam</td>
                        <td class='text-center'>
                            <input type="text" name="KlantNaam" id="KlantNaam" placeholder="Klantnaam"
                                value='{{ old('Klantnaam') }}' class='w-full border'>
                            @error('KlantNaam')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Project Adres</td>
                        <td class='text-center'>
                            <input type="text" name="ProjectAdres" id="ProjectAdres"
                                placeholder="Project Adres" value='{{ old('ProjectAdres') }}' class='w-full border'>
                            @error('ProjectAdres')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    <td>Email</td>
                    <td class='text-center'>
                        <input type="email" name="Email" id="Email" placeholder="Email"
                            class='w-full border'value='{{ old('Email') }}'>
                        @error('Email')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </td>
                    </tr>


                    @foreach ($kozijnen as $kozijn)
                        <tr>
                            <td>
                                <label for="{{ $kozijn->kozijn }}">{{ str_replace('_', ' ', $kozijn->kozijn) }}</label>
                            </td>
                            <td>
                                <select class='w-full border' name="{{ $kozijn->kozijn }}" id="{{ $kozijn->kozijn }}">
                                    @foreach ($attributes[$kozijn->id - 1] as $attribute)
                                        <option @if (old($kozijn->kozijn) == $attribute->attribute) selected @endif
                                            value="{{ $attribute->attribute }}">{{ $attribute->attribute }}</option>
                                    @endforeach
                                </select>
                                @error($kozijn->kozijn)
                                    <p class="text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </td>
                        </tr>
                    @endforeach
                    <tr class='text-center'>
                        <td colspan="2"><button class='bg-red-500 p-1 rounded-sm w-full'type="submit">Submit</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>



    </div>
@endsection
