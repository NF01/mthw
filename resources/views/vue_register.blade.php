@extends('vue')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div id="modal-center" class="uk-flex-top" uk-modal="esc-close:false;bg-close:false;">
                <div class="uk-modal-dialog uk-margin-auto-vertical modal-login px-3 py-2">
                    <form method="POST" action="{{ route('register') }}" class="col px-2">
                        @csrf
                        <header class="row border-bottom py-2">
                            {{-- <div class="col-auto">
                                <button class="uk-modal-close-default" type="button" uk-close></button>
                            </div> --}}
                            <div class="col text-center">
                                <h2>S'inscrire</h2>
                            </div>
                        </header>
                        <div class="row align-items-center">
                            <div class="col py-5">

                                <div class="form-group">
                                    <label for="name">Pseudo</label>
                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Pseudo" autofocus>

                                    @error('name')
                                    <span class="alert-form" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Adresse Email</label>
                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email@exemple.com">

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
                                <div class="form-group">
                                    <label for="password-confirm">{{ __('Confirmer le mot de passe') }}</label>

                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="**********">
                                </div>

                            </div>
                        </div>
                        <div class="row border-top py-4 mt-auto">
                            <div class="col">
                                <div class="row my-3">
                                    <button type="submit" class="btn btn-primary full-width">Se connecter</button>
                                </div>
                                <div class="row">
                                    <a href="{{ url('accueil') }}" class="mx-auto primary-link">Tu as d??j?? un compte ?</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    UIkit.modal(document.getElementById('modal-center')).show();
</script>

@endsection