@extends('layouts.auth')

@section('auth_content')
<div class="account-container">
    <div class="content clearfix">

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <h1>Member {{ __('Login') }}</h1>

            <div class="login-fields">

                <p>Please provide your details</p>

                <div class="field">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="login username-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Adresse email" />
                    @error('email')
                        <small class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div> <!-- /field -->

                <div class="field">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="login password-field @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mot de passe confidentiel" />
                    @error('password')
                        <small class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div> <!-- /password -->

            </div> <!-- /login-fields -->

            <div class="login-actions">

                <span class="login-checkbox">
                    <input class="field login-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="choice" for="remember">{{ __('Remember Me') }}</label>
                </span>

                <button type="submit" class="button btn btn-success btn-large">
                    {{ __('Login') }}
                </button>

            </div> <!-- .actions -->

        </form> <!-- /form -->

    </div> <!-- /content -->
</div> <!-- /account-container -->

@if (Route::has('password.request'))
    <div class="login-extra">
        <a href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    </div> <!-- /login-extra -->
@endif
@endsection
