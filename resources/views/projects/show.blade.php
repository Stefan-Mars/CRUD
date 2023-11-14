@extends('layouts/head')
@section('content')
    <div class='h-screen'>
    <br>
    <a href="/" class='m-4'><i class="fa-solid fa-arrow-left"></i>Back</a>
    <div class='flex justify-center'>

        <table class='border p-16 rounded border-spacing-y-3 bg-white'>
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
                    @php
                        $attribute = $column->kozijn;
                    @endphp
                    <td>{{ $project->$attribute }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
