@extends('layouts/head')
@section('content')
    @include('layouts/nav')
    <div class='mr-[35%] ml-[35%]'>
            <br>
            <form action="/kozijnen" method="POST" class='w-full border h-14'>
                @csrf
                <input class='w-full h-full indent-5' type="text" name="kozijn" id="kozijn"
                    placeholder="Voeg toe">
                @error('kozijn')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </form>

            @foreach ($kozijnen as $kozijn)
                <div class='rounded-sm'>
                    <table class='border-separate table-fixed border-spacing-y-3 border'>
                    <tr>
                        <td class='p-2 pl-4'>
                            {{ str_replace('_', ' ', $kozijn->kozijn) }}
                        </td>
                        <td class='whitespace-nowrap w-[1%] pr-16'>
                            <a href="/kozijn/delete/{{ $kozijn->id }}"><i class="fa-solid fa-trash"></i></a>
                        </td>
                        <td class='whitespace-nowrap w-[1%] pr-4' id='button{{ $kozijn->id }}' onclick="test({{ $kozijn->id }})">
                            <i class="fa-solid fa-angle-right cursor-pointer"></i>
                        </td>
                        
                    </tr>
                    @foreach ($attributes as $attribute)
                        @if ($kozijn->id == $attribute->kozijn_id)
                            <tr class='attribute-row k{{ $kozijn->id }}' style='display: none;'>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;• {{ $attribute->attribute }}</td>
                                <td><a href="/attribute/delete/{{ $attribute->id }}"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                        @endif
                    @endforeach
                    <tr class='k{{ $kozijn->id }}' style='display: none;'>
                        <form action="/attributes/{{ $kozijn->id }}" method="POST">
                            @csrf
                            <td colspan="2">
                                <input class='border-2 indent-px w-full ml-4 p-4' type="text" name="attribute"
                                    id="attribute" placeholder="Voeg toe">
                                @error('attribute')
                                    <p class="text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </td>
                        </form>
                    </tr>
                </table>
                </div>
            @endforeach



    </div>
    <script>
        function test(id) {
            console.log('test');
            var elements = document.querySelectorAll('.k' + id);
            elements.forEach(function(element) {
                if (element.style.display === 'none' || element.style.display === '') {
                    element.style.display = 'table-row';
                    document.getElementById('button' + id).innerHTML = "<i class='fa-solid fa-angle-down cursor-pointer'></i>";
                } else {
                    element.style.display = 'none';
                    document.getElementById('button' + id).innerHTML = "<i class='fa-solid fa-angle-right cursor-pointer'></i>";
                }
            });
        }
    </script>
@endsection
