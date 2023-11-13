@extends('layouts.head')
@section('content')
    <br>
    <a href="/" class='m-4'><i class="fa-solid fa-arrow-left"></i>Back</a>
    <div class='flex justify-center'>

        <form action="/projects" method="POST" class='bg-red-700 p-16 rounded'>
            @csrf
            <table class='border-separate'>
                <tr>
                    <td colspan="2" class='text-center'>
                        Nieuw Project
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class='text-center'>
                        <input type="text" name="KlantNaam" id="KlantNaam" placeholder="Klantnaam" class='w-[80%]'>
                        @error('KlantNaam')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class='text-center'>
                        <input type="text" name="ProjectAdres" id="ProjectAdres" placeholder="Project Adres"
                            class='w-[80%]'>
                        @error('ProjectAdres')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>
                <td colspan="2" class='text-center'>
                    <input type="email" name="Email" id="Email" placeholder="Email" class='w-[80%]'>
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
                            <select class='w-full'name="{{ $kozijn->kozijn }}" id="{{ $kozijn->kozijn }}">
                                @foreach ($attributes as $attribute)
                                    @if ($kozijn->id == $attribute->kozijn_id)
                                        <option value="{{ $attribute->attribute }}">{{ $attribute->attribute }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error($kozijn->kozijn)
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                @endforeach

            </table>
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
