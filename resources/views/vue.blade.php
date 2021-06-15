<!doctype html>
<html lang='fr'>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>

    </title>

    <link media="all" type="text/css" rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.22/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.22/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.22/dist/js/uikit-icons.min.js"></script>

    <script>
        window.idUser = '<?php echo (isset($_SESSION['idUser'])?$_SESSION['idUser']:-1) ?>';

        // URL FOR PRODUCTION
        // window.URL_PREFIX = '/mthw/';
        
        // DEV URL
        window.URL_PREFIX = '/';

        window.imageURL = 'img/';
        window.vectorURL = 'svg/';
        window.edelweissURL = 'edelweiss.png';

        
    </script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        textarea {
            resize: none
        }
    </style>
</head>

<body>
    @yield('content')

    <section id="app">
    </section>
    <script src="{{ asset('js/app.js')}}"></script>


</body>

</html>