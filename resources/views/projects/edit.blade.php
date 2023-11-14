@extends('layouts.head')
@section('content')
    <br>
    <a href="/" class='m-4'><i class="fa-solid fa-arrow-left"></i>Back</a>
    <div class='flex justify-center'>
        <form action="/projects/{{ $project->id }}" method="POST" class='border p-16 rounded'>
            @csrf
            <table class='border-separate'>
                <tr>
                    <td colspan="2" class='text-center font-xl'>
                        Bewerk {{ $project->KlantNaam }}
                    </td>
                </tr>
                <tr>
                    <td>Klantnaam</td>
                    <td>
                        <input type="text" name="KlantNaam" id="KlantNaam" placeholder="Klantnaam"
                            value='{{ $project->KlantNaam }}'>
                        @error('KlantNaam')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>ProjectAdres</td>
                    <td>
                        <input type="text" name="ProjectAdres" id="ProjectAdres" placeholder="Project Adres"
                            value='{{ $project->ProjectAdres }}'>
                        @error('ProjectAdres')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>
                <td>Email</td>
                <td>
                    <input type="email" name="Email" id="Email" placeholder="Email" value='{{ $project->Email }}'>
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
                            <select class='w-full' name="{{ $kozijn->kozijn }}" id="{{ $kozijn->kozijn }}">
                                @foreach ($attributes as $attribute)
                                    @php
                                        $ding = $kozijn->kozijn;
                                    @endphp
                                    @if ($kozijn->id == $attribute->kozijn_id)
                                        <option @if ($project->$ding == $attribute->attribute) selected @endif
                                            value="{{ $attribute->attribute }}">{{ $attribute->attribute }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error($kozijn->kozijn)
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                @endforeach
                <tr class='text-center'>
                    <td colspan="2"><button class='bg-red-500 p-1 rounded-sm'type="submit">Submit</button></td>
                </tr>
            </table>


            
        </form>
    </div>
@endsection
