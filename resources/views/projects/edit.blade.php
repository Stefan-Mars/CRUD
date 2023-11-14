@extends('layouts.head')
@section('content')
    <div class='w-full h-view bg-slate-200'>
        <br>
        <div class='flex justify-center'>
            <form action="/projects/{{ $project->id }}" method="POST" class='border p-16 rounded-sm bg-white'>
                @csrf
                <a href="/"><i class="fa-solid fa-arrow-left"></i>Back</a>
                <table class='border-separate'>
                    <tr>
                        <td colspan="2" class='text-center font-xl'>
                            Bewerk {{ $project->KlantNaam }}
                        </td>
                    </tr>
                    <tr>
                        <td>Klant naam</td>
                        <td>
                            <input type="text" name="KlantNaam" id="KlantNaam" placeholder="Klantnaam"
                                value='{{ $project->KlantNaam }}' class='w-full border-2'>
                            @error('KlantNaam')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>ProjectAdres</td>
                        <td>
                            <input type="text" name="ProjectAdres" id="ProjectAdres" placeholder="Project Adres"
                                value='{{ $project->ProjectAdres }}' class='w-full border-2'>
                            @error('ProjectAdres')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    <td>Email</td>
                    <td>
                        <input type="email" name="Email" id="Email" placeholder="Email"
                            value='{{ $project->Email }}' class='w-full border-2'>
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
                                <select class='w-full border-2 ' name="{{ $kozijn->kozijn }}" id="{{ $kozijn->kozijn }}">
                                    @foreach ($attributes[$kozijn->id - 1] as $attribute)
                                        @php
                                            $ding = $kozijn->kozijn;
                                        @endphp
                                        <option @if ($project->$ding == $attribute->attribute) selected @endif
                                            value="{{ $attribute->attribute }}">{{ $attribute->attribute }}</option>
                                    @endforeach
                                </select>
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
