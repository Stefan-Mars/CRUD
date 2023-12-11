@extends('layouts/head')
@section('content')
@include('layouts/nav')
    <div class='h-screen bg-slate-200'>
        <br>

        <div class='flex justify-center'>
            <div class='border p-16 rounded-sm border-spacing-y-3 bg-white'>
                
                <table>
                    <tr>
                        <td class="text-left"><a href="/" ><i class="fa-solid fa-arrow-left fa-xl"></i></a></td>
                    </tr>
                    <tr class="text-center text-2xl">
                        <td colspan="2">{{ $project->KlantNaam }}</td>
                    </tr>
                    <tr>
                        <td>Project Adres</td>
                        <td>{{ $project->ProjectAdres }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $project->Email }}</td>
                    </tr>
                    @foreach ($kozijnen as $kozijn)
                        <tr>
                            <td>{{ str_replace('_', ' ', $kozijn->kozijn) }}</td>
                            <td>{{ $kozijn->pivot->value }}</td>
                            <td>{{ $kozijn->pivot->extraInfo }}</td>
                        </tr>
                    @endforeach
                    @if (!$info || $info->project_id != $project->id)
                        <tr>
                            <td colspan="3" class='text-center bg-red-400 p-1 border border-white'>
                                <a class='block w-full h-full' href="/project/info/create/{{ $project->id }}"><i
                                        class="fa-solid fa-plus"></i>Nieuw
                                    Info</a>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="3" class='text-center bg-red-400 p-1 border border-white'>
                                <a class='block w-full h-full' href="/project/info/{{ $project->id }}">Info</a>
                            </td>
                        </tr>

                        @if (!$akkoord || ($akkoord && $akkoord->project_id != $project->id))
                            <tr>
                                <td colspan="3" class='text-center bg-red-400 p-1 border border-white'>
                                    <a class='block w-full h-full' href="/project/akkoord/create/{{ $project->id }}"><i
                                            class="fa-solid fa-plus"></i>Nieuw Akkoord</a>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="3" class='text-center bg-red-400 p-1 border border-white'>
                                    <a class='block w-full h-full' href="/project/akkoord/{{ $project->id }}">Akkoord</a>
                                </td>
                            </tr>
                        @endif
                    @endif
                </table>

            </div>

        </div>
    </div>


@endsection
