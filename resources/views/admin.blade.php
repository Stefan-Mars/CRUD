@extends('layouts/head')
@section('content')
    @include('layouts/nav')
    <div class='flex justify-center'>
        <table class='border-separate'>
            @foreach ($kozijnen as $kozijn)
                <tr>
                    <td>
                        {{ str_replace('_', ' ', $kozijn->kozijn) }}
                    </td>
                    <td id='button{{ $kozijn->id }}' onclick="test({{ $kozijn->id }})">
                        <i class="fa-solid fa-angle-right"></i>
                    </td>
                    <td>
                        <a href="/kozijn/delete/{{ $kozijn->id }}"><i class="fa-solid fa-trash"></i></a>
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
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input class='shadow shadow-gray-400' type="text" name="attribute"
                                id="attribute" placeholder="Naam">
                            @error('attribute')
                                <p class="text-red text-xs">{{ $message }}</p>
                            @enderror
                        </td>
                        <td>
                            <button type="submit"><i class="fa-solid fa-plus"></i></button>
                        </td>
                    </form>
                </tr>
            @endforeach




            <form action="/kozijnen" method="POST">
                @csrf
                <tr>
                    <td colspan="2">
                        <input class='shadow shadow-gray-400 w-[80%]' type="text" name="kozijn" id="kozijn"
                            placeholder="Naam">
                        @error('kozijn')
                            <p class="text-red text-xs">{{ $message }}</p>
                        @enderror
                    </td>
                    <td>
                        <button type="submit"><i class="fa-solid fa-plus"></i></button>
                    </td>
                </tr>
            </form>
        </table>
    </div>

    <script>
        function test(id) {
            console.log('test');
            var elements = document.querySelectorAll('.k' + id);
            elements.forEach(function(element) {
                if (element.style.display === 'none' || element.style.display === '') {
                    element.style.display = 'table-row';
                    document.getElementById('button' + id).innerHTML = "<i class='fa-solid fa-angle-down'></i>";
                } else {
                    element.style.display = 'none';
                    document.getElementById('button' + id).innerHTML = "<i class='fa-solid fa-angle-right'></i>";
                }
            });
        }
    </script>
@endsection
