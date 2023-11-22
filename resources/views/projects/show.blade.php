@extends('layouts/head')
@section('content')
    <div class='h-screen bg-slate-200'>
        <br>

        <div class='flex justify-center'>
            <div class='border p-16 rounded-sm border-spacing-y-3 bg-white'>
                <a href="/" class='m-4'><i class="fa-solid fa-arrow-left mt-4"></i>Back</a>
                <table>

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
                    @foreach ($kozijnen as $column)
                        <tr>
                            <td>{{ str_replace('_', ' ', $column->kozijn) }}</td>
                            <td>{{ $column->pivot->value }}</td>
                        </tr>
                    @endforeach
                    @if (!$info || $info->project_id != $project->id)
                        <tr>
                            <td colspan="2" class='text-center'>
                                <a href="/project/info/create/{{ $project->id }}"><i class="fa-solid fa-plus"></i>Create
                                    Info</a>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="2" class='text-center bg-red-400 p-1 border border-white'>
                                <a class='block w-full h-full' href="/project/info/{{ $project->id }}">Info</a>
                            </td>
                        </tr>
                        @if (!$akkoord || ($akkoord && $akkoord->id != $project->id))
                            <tr>
                                <td colspan="2" class='text-center'>
                                    <a href="/project/akkoord/create/{{ $project->id }}"><i
                                            class="fa-solid fa-plus"></i>Create Akkoord</a>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="2" class='text-center bg-red-400 p-1 border border-white'>
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
