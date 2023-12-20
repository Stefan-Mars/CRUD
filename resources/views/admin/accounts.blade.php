@extends('layouts/head')
@section('content')
    @include('layouts/nav')
    <h1 class="text-xl text-center">Alle Gebruikers</h1>
    <table class="m-auto w-[70%]">
        <tr class="border">
            <td class="px-2">Naam</td>
            <td class="px-2">Email</td>
            <td class="px-2">Rol</td>
        </tr>
    @foreach($users as $user)
        <tr class="border">
            <td class="px-2">{{$user->name}}</td>
            <td class="px-2">{{$user->email}}</td>
            <td class="px-2">
                <form action="/admin/roles/{{$user->id}}" method="POST">
                    @csrf
                    @method("PUT")
                    <select class="border border-gray-300"name="user_role" id="user_role_{{$user->id}}">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" @if($user->hasRole($role->id)) selected @endif>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit">Opslaan</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
@endsection