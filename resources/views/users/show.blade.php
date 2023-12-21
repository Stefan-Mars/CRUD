@extends('layouts/head')

@section('content')
    @extends('layouts/nav')

    <table class="m-auto w-1/3 mt-8">
        <tr>
            <td colspan="2"class="text-center text-xl p-2">Account Overzicht</td>
        </tr>
        <tr class="border">
            <td class="p-2">Naam</td>
            <td class="p-2">{{ Auth::user()->name }}</td>
        </tr>
        <tr class="border">
            <td class="p-2">Email</td>
            <td class="p-2">{{ Auth::user()->email }}</td>
        </tr>
        <tr class="border">
            <td class="p-2">Rol</td>
            <td class="p-2">
                @foreach (Auth::user()->getRoleNames() as $role)
                    {{ $role }}
                @endforeach
            </td>
        </tr>
    </table>
@endsection
