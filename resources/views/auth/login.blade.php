<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ca joue, ou bien ?!</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.22/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.22/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.22/dist/js/uikit-icons.min.js"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div id="modal-center" class="uk-flex-top" uk-modal>
                    <div class="uk-modal-dialog uk-margin-auto-vertical modal-login px-3 py-2">
                        <form method="POST" action="{{ route('login') }}" class="col px-2">
                            @csrf
                            <header class="row border-bottom py-2">
                                <div class="col-auto">
                                    <button class="uk-modal-close-default" type="button" uk-close></button>
                                </div>
                                <div class="col text-center">
                                    <h2>Connexion</h2>
                                </div>
                            </header>
                            <div class="row align-items-center">
                                <div class="col py-default">
                                    <div class="form-group">
                                        <label for="email">Adresse Email</label>
                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email@exemple.com" autofocus>

                                        @error('email')
                                        <span class="alert-form" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mot de passe</label>
                                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="**********">

                                        @error('password')
                                        <span class="alert-form" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="row border-top py-4 mt-auto">
                                <div class="col">
                                    <div class="row my-3">
                                        <button type="submit" class="btn btn-primary full-width">Se connecter</button>
                                    </div>
                                    <div class="row">
                                        <a href="{{ url('nouveau-compte') }}" class="mx-auto primary-link">Tu n'as pas de compte ?</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

<script>
    UIkit.modal(document.getElementById('modal-center')).show();
</script>

</html>