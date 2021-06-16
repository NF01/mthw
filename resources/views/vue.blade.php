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
        window.isAdmin = '<?php echo (isset($_SESSION['isAdmin'])?$_SESSION['isAdmin']:0) ?>';

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

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div id="popup" class="uk-flex-top" uk-modal>
                    <div class="uk-modal-dialog uk-margin-auto-vertical modal-login px-3 py-2">
                        <form method="POST" action="{{ route('login') }}" class="col px-2">
                            @csrf
                            <header class="row border-bottom py-2">
                                <div class="col-auto">
                                    <button class="uk-modal-close-default" type="button" uk-close></button>
                                </div>
                                <div class="col text-center">
                                    <h2>Concours</h2>
                                </div>
                            </header>
                            <div class="row align-items-center">
                                <div class="col py-5 text-center">
                                    <h3>Concours jusqu’au 20 juillet 2021!</h3>
                                    <p>Fini le jeu en arrivant au “Le Lavaux” pour participer au tirage au sort te permettant de gagner deux billets journaliers en 1ère classe valablent dans toute la Suisse.</p>
                                    <p>Tirage au sort organisé par les CFF sous contrôle d’un huissier de justice, seul votre adresse mail sera transmis.</p>
                                </div>
                            </div>
                            <div class="row border-top py-4 mt-auto">
                                <div class="col">
                                    <div class="row my-3">
                                        <button class="btn btn-primary full-width uk-modal-close" type="button">Commencer à jouer !</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="app">
    </section>
    <script src="{{ asset('js/app.js')}}"></script>

    <script>
        if(window.idUser!=-1)
        {
            if(localStorage.getItem('popState') != 'shown'){
                UIkit.modal($('#popup')).show();
                localStorage.setItem('popState','shown')
            }
        }

    </script>

</body>

</html>