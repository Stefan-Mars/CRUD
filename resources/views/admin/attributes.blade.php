@extends('layouts/head')
@section('content')
    @include('layouts/nav')
    @include('layouts/admin')
    <div class='m-auto overflow-auto'>
        <h1 class='text-center text-2xl'>Attribuut Overzicht</h1>
        <br>



        <div class='rounded-sm m-auto'>
            <form action="/kozijnen" method="POST" class='border w-3/5 m-auto'>
                @csrf
                <input class='p-4 w-full h-full  focus-visible:outline-slate-300 m-auto' type="text" name="kozijn"
                    id="kozijn" placeholder="Voeg toe">
                <input type="submit" style="display: none;">
                @error('kozijn')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </form>
        </div>

        @foreach ($kozijnen as $kozijn)
            <div class='rounded-sm m-auto'>
                <table class='border-separate table-auto border w-3/5 m-auto'>
                    <tr onclick="show({{ $kozijn->id }})">
                        <td class='p-2 pl-4 truncate text-lg w-full'>
                            <form action="/kozijn/{{ $kozijn->id }}" method="POST">
                                @csrf
                                @method('put')
                                <input type="text" name='name'value="{{ str_replace('_', ' ', $kozijn->kozijn) }}"
                                    class='nameInputs' autocomplete="false">
                                <input type="submit" style="display: none;">
                            </form>
                        </td>
                        <td id='delete{{ $kozijn->id }}' class='pr-8 text-red-600'>
                            <form action="/kozijn/{{ $kozijn->id }}" method="POST" id="deleteForm{{ $kozijn->id }}">
                                @csrf
                                @method('delete')
                                <button type="button" onclick="warningMessage({{ $kozijn->id }})">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                        <td class='pr-8' id='button{{ $kozijn->id }}'>
                            <i class="fa-solid fa-angle-right cursor-pointer"></i>
                        </td>

                    </tr>
                    @foreach ($attributes as $attribute)
                        @if ($kozijn->id == $attribute->kozijnen_id)
                            <tr class='attribute-row k{{ $kozijn->id }} truncate' style='display: none; w-full'>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $attribute->attribute }}</td>
                                <td>
                                    <form action="/attribute/{{ $attribute->id }}" method="POST" class="text-red-600">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endif
                    @endforeach
                    <tr class='k{{ $kozijn->id }}' style='display: none;'>

                        <td colspan="2">
                            <i onclick="Focus({{ $kozijn->id }})" class="fa-solid fa-plus ml-4 cursor-pointer"></i>
                            <form action="/attributes/{{ $kozijn->id }}" method="POST">
                                @csrf
                                <input
                                    id='input{{ $kozijn->id }}'class='indent-px p-2 focus-visible:outline-slate-300 nameInputs'
                                    type="text" name="attribute" id="attribute" placeholder="Voeg toe">
                                <input type="submit" style="display: none;">
                                @error('attribute')
                                    <p class="text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </form>
                        </td>

                    </tr>

                </table>

            </div>
        @endforeach
        <table class='w-3/5 m-auto'>
            <tr>
                @if ($kozijnen->currentPage() > 1)
                    <td class='w-3/5 text-left'><a href="{{ $kozijnen->previousPageUrl() }}">Previous</a></td>
                @endif
                @if ($kozijnen->hasMorePages())
                    <td class='w-1/2 text-right'><a href="{{ $kozijnen->nextPageUrl() }}">Next</a></td>
                @endif
            </tr>
        </table>




    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nameInputs = document.querySelectorAll('.nameInputs');

            nameInputs.forEach(function(input) {
                input.addEventListener('blur', function() {
                    const form = input.closest('form'); // Find the parent form of the input
                    form.querySelector('input[type="submit"]')
                        .click(); // Simulate click on the submit button
                    console.log('d');
                });
            });
        });



        document.getElementById('kozijn').addEventListener('blur', function() {
            const form = document.getElementById('kozijn').closest('form'); // Find the parent form of the input
            form.querySelector('input[type="submit"]').click(); // Simulate click on the submit button
        });

        function show(id) {
            var elements = document.querySelectorAll('.k' + id);
            elements.forEach(function(element) {
                if (element.style.display === 'none' || element.style.display === '') {
                    element.style.display = 'table-row';
                    document.getElementById('button' + id).innerHTML =
                        "<i class='fa-solid fa-angle-down cursor-pointer'></i>";

                    document.getElementById('delete' + id).style.display = "none"

                } else {
                    element.style.display = 'none';
                    document.getElementById('button' + id).innerHTML =
                        "<i class='fa-solid fa-angle-right cursor-pointer'></i>";
                    document.getElementById('delete' + id).style.display = ""
                }
            });
        }

        function Focus(id) {
            document.getElementById("input" + id).focus();
        }

        function warningMessage(id) {
            Swal.fire({
                title: "Weet je het zeker?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ja",
                cancelButtonText: "Nee",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm' + id).submit();
                }
            });
        }
    </script>
    <style>
        input {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;

        }
    </style>
@endsection
