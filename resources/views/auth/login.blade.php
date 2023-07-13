@extends('layouts.app')

@section('content')
    <main id="login">
        <section>
            <div class="container">
                <div class="row text-center text_header">
                    <h1>La Bonne Occase</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row mb-3 col-md-6 col-10 mx-auto">
                                <label for="email" class="col-md-8 col-form-label">{{ __('Adresse mail') }}</label>

                                <div class="col-12">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 col-md-6 col-10 mx-auto">
                                <label for="password" class="col-md-8 col-form-label">{{ __('Mot de passe') }}</label>

                                <div class="col-12">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 col-md-6 col-10 mx-auto">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Se souvenir de moi') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0 col-md-6 col-10 mx-auto">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-light">
                                        {{ __('Connexion') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-light" href="{{ route('password.request') }}">
                                            {{ __('Mot de passe oublié?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            {{-- <div class="row text-center mt-4">
                                <a class="btn btn-link text-light" href="{{ route('register') }}">S'inscrire</a>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
