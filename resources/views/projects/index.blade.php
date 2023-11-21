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
                    <td></td>
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
                        <td class='whitespace-nowrap w-[1%]'><a href="/project/akkoord/{{ $project->id }}"><i class="fa-solid fa-file-contract"></i></a></td>
                        <td class='whitespace-nowrap w-[1%]'><a href="/project/info/{{ $project->id }}"><i class="fa-solid fa-info"></i></a></td>
                        <td class='whitespace-nowrap w-[1%]'><a href="/project/edit/{{ $project->id }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td class='whitespace-nowrap w-[1%]'>
                            <a onclick="return deleteAlert({{ $project->id }})" href="/project/delete/{{ $project->id }}">
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
        function deleteAlert(id){
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
                    window.location.href = "/project/delete/"+id;
                }
            });
            return false;
        }
    </script>
@endsection
