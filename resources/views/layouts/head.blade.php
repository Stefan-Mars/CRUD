<!DOCTYPE html>
<html lang="en" style="width: 100%;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://kit.fontawesome.com/356eec8587.js" crossorigin="anonymous"></script>
    <link href="/css/output.css" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src='/js/index.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Boer Kozijnen</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>

</head>

<body class='text-black font-sans m-0' style="width: 100%;">
    @include('layouts/flash-message')
    @yield('content')
</body>

</html>
