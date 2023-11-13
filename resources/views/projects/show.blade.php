@extends('layouts/head')
@section('content')
    <br>
    <a href="/" class='m-4'><i class="fa-solid fa-arrow-left"></i>Back</a>
    <div class='flex justify-center'>
        <table class='border p-16 rounded border-spacing-y-3'>
            <tr>
                <td>KlantNaam</td>
                <td>{{ $project->KlantNaam }}</td>
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
                    @php
                        $attribute = $column->kozijn;
                    @endphp
                    <td>{{ $project->$attribute }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
