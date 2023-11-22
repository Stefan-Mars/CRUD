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
                </table>
                @if(!$info || ($info->project_id != $project->id))
                    <a href="/project/info/create/{{ $project->id }}"><i class="fa-solid fa-plus"></i>Create Info</a>
                    @else
                        <a href="/project/info/{{ $project->id }}">Show Info</a>
                         <br>
                        @if(!$akkoord || ($akkoord && $akkoord->id != $project->id))
                            <a href="/project/akkoord/create/{{ $project->id }}"><i class="fa-solid fa-plus"></i>Create Akkoord</a>
                            @else
                            <a href="/project/akkoord/{{ $project->id }}">Show Akkoords</a>
                                
                        @endif
                @endif
            </div>
            
        </div>
    </div>
    
    
@endsection
