@extends('layouts.app')

@section('content')
    <main id="register">
        <section>
            <div class="container">
                <div class="row text-center text_header">
                    <h1>La Bonne Occase</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3 col-md-6 col-10 mx-auto">
                                <label for="pseudo" class="col-md-8 col-form-label">{{ __('Pseudo') }}</label>

                                <div class="col-12">
                                    <input id="pseudo" type="text"
                                        class="form-control @error('pseudo') is-invalid @enderror" name="pseudo"
                                        value="{{ old('pseudo') }}" required autocomplete="pseudo" autofocus>

                                    @error('pseudo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

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
                                <label for="password-confirm"
                                    class="col-md-8 col-form-label">{{ __('Confirmation mot de passe') }}</label>

                                <div class="col-12">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0 col-md-6 col-10 mx-auto">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-light">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
