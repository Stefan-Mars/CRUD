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
    <script src='/js/index.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
            * {
                font-family: 'Poppins', sans-serif;
            }
    </style>
    <link href="/literallyCanvas/css/literallycanvas.css" rel="stylesheet">

    <!-- dependency: React.js -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/react/0.14.7/react-with-addons.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/react/0.14.7/react-dom.js"></script>

    <!-- Literally Canvas -->
    <script src="/literallyCanvas/js/literallycanvas-core.js"></script>
</head>


<body class='text-black font-sans m-0 '>
    @include('layouts/flash-message')
    @yield('content')
</body>

</html>
