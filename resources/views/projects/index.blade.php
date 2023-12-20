@extends('layouts/head')
@section('content')
    @include('layouts/nav')

    <div class='m-auto w-1/2 md:w-4/5'>
        <br>
        <h1 class='text-center text-3xl'>Welkom</h1>
        @can('viewPages')
        <table id="myTable" class='display table'>
            <thead>
                <tr>
                    <td>Naam</td>
                    <td>Aangemaakt door</td>
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
                        <td>{{$project->user->name}}</td>
                        <td class='whitespace-nowrap w-[1%]'><a href="/project/edit/{{ $project->id }}"><i
                                    class="fa-solid fa-pen-to-square"></i></a></td>
                        <td class='whitespace-nowrap w-[1%]'>
                            <form action="/project/{{ $project->id }}" method="POST" id="deleteForm{{ $project->id }}">
                                @csrf
                                @method("delete")
                                <button type="button"onclick="warningMessage({{ $project->id }})">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        


    </div>
    @else
        <p class="text-center">Je hebt geen permissie om deze pagina te zien</p>
    @endcan
    <script>
        $('#myTable').DataTable({
            dom: 'tpr',
            pagingType: 'simple',
            sort: false,
        });
        function warningMessage(id){
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
                    document.getElementById('deleteForm'+id).submit();
                }
            });
        }

    </script>
@endsection
