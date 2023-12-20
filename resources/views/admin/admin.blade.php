@extends('layouts/head')
@section('content')
    @include('layouts/nav')
    <br>
    <table class="m-auto">
        <tr class="border">
            <td class="p-2 text-xl"><a href="/admin/attributes">Attribuut Editor</a></td>
        </tr>
        <tr class="border">
            <td class="p-2 text-xl"><a href="/admin/accounts">Account Editor</a></td>
        </tr>
    </table>
    
    
@endsection