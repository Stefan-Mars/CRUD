@extends('layouts/head')
@section('content')

    @php
        $columns = Schema::getColumnListing('attributes');
        $excludeColumns = ['id'];
        $filteredColumns = array_diff($columns, $excludeColumns);
    @endphp
    <a href="/">Back</a>
    <div class='center'>
        <table>
            <tr>
                <td>KlantNaam</td>
                <td>{{$project->KlantNaam}}</td>
            </tr>
            <tr>
                <td>Project Adres</td>
                <td>{{$project->ProjectAdres}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{$project->Email}}</td>
            </tr>
            @foreach($filteredColumns as $collumn)
            <tr>
                <td>{{$collumn}}</td>
                <td>{{$project->$collumn}}</td>
            </tr>
            
            @endforeach
        </table>
    </div>
@endsection

