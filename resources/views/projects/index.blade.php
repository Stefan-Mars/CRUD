@extends('layouts/head')
@section('content')
    
    <table>
        <tr>
            <td>Naam</td>
            <td></td>
            <td><a href='/project/create'>Nieuw Project</a><br></td>
        </tr>
    @foreach($projects as $project)
        <tr>
            <td><a href="/project/show/{{$project->id}}">{{$project->KlantNaam}}</a></td>
            <td><a href="/project/edit/{{$project->id}}">Bewerk</a></td>
            <td><a href="/project/delete/{{$project->id}}">Verwijder</a></td>
        </tr>
    @endforeach
    </table>
@endsection