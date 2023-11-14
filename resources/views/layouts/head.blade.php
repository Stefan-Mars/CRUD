<!DOCTYPE html>
<html lang="en">

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

    <title>Document</title>
</head>

<body class='text-black font-sans m-0'>
    @include('layouts/flash-message')
    @yield('content')
</body>

</html>
