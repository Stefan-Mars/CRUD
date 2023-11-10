@extends('layouts.head')
@section('content')
<a href="/">Back</a>
    <div class='center'>
        @php
            $columns = Schema::getColumnListing('attributes');
            $excludeColumns = ['id'];
            $filteredColumns = array_diff($columns, $excludeColumns);
        @endphp
        <form action="/projects" method="POST">
            @csrf
            <table>
                <tr>
                    <td colspan="2" style='text-align:center'>
                        Nieuw Project
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style='text-align:center'>
                        <input type="text" name="KlantNaam" id="KlantNaam" placeholder="Klantnaam" style='width:80%'>
                        @error('KlantNaam')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style='text-align:center'>
                        <input type="text" name="ProjectAdres" id="ProjectAdres" placeholder="Project Adres" style='width:80%'>
                        @error('ProjectAdres')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>
                    <td colspan="2" style='text-align:center'>
                        <input type="email" name="Email" id="Email" placeholder="Email" style='width:80%'>
                        @error('Email')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>

                @foreach ($filteredColumns as $column)
                    <tr>
                        <td>
                            <label for="{{ $column }}">{{ $column }}</label>
                        </td>
                        <td>
                            <select name="{{ $column }}" id="{{ $column }}">
                                @foreach ($attributes as $attribute)
                                    @php
                                        $values = explode(',', $attribute->$column);
                                    @endphp
                                    @foreach ($values as $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                            @error('{{ $column }}')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                @endforeach
            </table>
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
