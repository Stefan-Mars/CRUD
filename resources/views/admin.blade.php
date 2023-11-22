@extends('layouts/head')
@section('content')
    @include('layouts/nav')
    <div class='mr-[35%] ml-[35%]'>
        <br>
        <form action="/kozijnen" method="POST" class='w-full border h-14'>
            @csrf
            <input class='w-full h-full indent-5 focus-visible:outline-slate-300' type="text" name="kozijn" id="kozijn"
                placeholder="Voeg toe">
            @error('kozijn')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror
        </form>

        @foreach ($kozijnen as $kozijn)
            <div class='rounded-sm'>
                <table class='border-separate table-fixed border'>
                    <tr onclick="show({{ $kozijn->id }})">
                        <td class='p-2 pl-4 truncate '>
                            {{ str_replace('_', ' ', $kozijn->kozijn) }}
                        </td>
                        <td id='delete{{ $kozijn->id }}' class='whitespace-nowrap w-[1%] pr-16'>
                            <a onclick="return deleteAlert({{ $kozijn->id }});" href="/kozijn/delete/{{ $kozijn->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                        <td class='whitespace-nowrap w-[1%] pr-4' id='button{{ $kozijn->id }}'>
                            <i class="fa-solid fa-angle-right cursor-pointer"></i>
                        </td>

                    </tr>
                    @foreach ($attributes as $attribute)
                        @if ($kozijn->id == $attribute->kozijnen_id)
                            <tr class='attribute-row k{{ $kozijn->id }} truncate' style='display: none;'>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;• {{ $attribute->attribute }}</td>
                                <td><a href="/attribute/delete/{{ $attribute->id }}"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    <tr class='k{{ $kozijn->id }}' style='display: none;'>
                        <form action="/attributes/{{ $kozijn->id }}" method="POST">
                            @csrf
                            <td colspan="2">
                                <i onclick="Focus({{ $kozijn->id }})" class="fa-solid fa-plus ml-4 cursor-pointer"></i>
                                <input id='input{{ $kozijn->id }}'class='indent-px p-2 focus-visible:outline-slate-300'
                                    type="text" name="attribute" id="attribute" placeholder="Voeg toe">
                                @error('attribute')
                                    <p class="text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </td>
                        </form>
                    </tr>

                </table>

            </div>
        @endforeach
        <table class='w-full'>
            <tr>
                <td class='w-1/2 text-left'><a href="{{ $kozijnen->previousPageUrl() }}">Previous</a></td>
                @if ($kozijnen->hasMorePages())
                    <td class='w-1/2 text-right'><a href="{{ $kozijnen->nextPageUrl() }}">Next</a></td>
                @endif
            </tr>
        </table>




    </div>
    <script>
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

        function deleteAlert(id) {
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
                    window.location.href = "/kozijn/delete/" + id;
                }
            });
            return false;
        }
    </script>
@endsection
