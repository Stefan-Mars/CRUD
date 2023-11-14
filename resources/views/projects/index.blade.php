@extends('layouts/head')
@section('content')
    @include('layouts/nav')

    <div class='mr-[15%] ml-[15%]'>
        <br>
        <table id="myTable" class='display table'>
            <thead>
                <tr>
                    <td>Projecten</td>
                    <td></td>
                    <td style='text-align: right'>
                        <a href='/project/create'>
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td><a class='underline'href="/project/{{ $project->id }}">{{ $project->KlantNaam }}</a></td>
                        <td><a href="/project/edit/{{ $project->id }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td class='text-right'>
                            <a href="/project/delete/{{ $project->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
    <script>
        $('#myTable').DataTable({
            dom: 'tpr',
            pagingType: 'simple',
            sort: false,
        });
    </script>
@endsection
