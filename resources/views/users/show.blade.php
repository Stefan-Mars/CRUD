@extends('layouts/head')
@section('content')
@extends('layouts/nav')
<table>
    <tr>
        <td>Naam</td>
        <td>{{ Auth::user()->name }}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{ Auth::user()->email }}</td>
    </tr>
    <tr>
        <td>Rol</td>
        <td>
            @foreach(Auth::user()->getRoleNames() as $role) 
                {{$role}}
            @endforeach
        </td>
    </tr>
</table>

@endsection