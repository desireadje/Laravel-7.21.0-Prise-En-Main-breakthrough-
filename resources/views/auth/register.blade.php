@extends('layouts.auth')

@section('auth_content')

<div class="account-container register">

	<div class="content clearfix">

		<form method="POST" action="{{ route('register') }}">
            @csrf

			<h2>{{ __('Register') }} Free Account</h2>

			<div class="login-fields">

                <p>Create your free account</p>

				<div class="field">
					<label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" name="name" class="login @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nom" />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div> <!-- /field -->

				<div class="field">
					<label for="email">{{ __('E-Mail Address') }}</label>
					<input id="email" type="email" class="login @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Adresse email" />
				</div> <!-- /field -->

				<div class="field">
					<label for="password">{{ __('Password') }}</label>
					<input id="password" type="password" class="login  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mot de passe confidentiel" />
                </div> <!-- /field -->

				<div class="field">
					<label for="password-confirm">{{ __('Confirm Password') }}</label>
					<input id="password-confirm" type="password" class="login" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmer mot de passe confidentiel" />
				</div> <!-- /field -->

			</div> <!-- /login-fields -->

			<div class="login-actions">

				<span class="login-checkbox">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Agree with the Terms & Conditions.</label>
                </span>

				<button type="submit" class="button btn btn-primary btn-large">
                    {{ __('Register') }}
                </button>

			</div> <!-- .actions -->

		</form>

	</div> <!-- /content -->

</div> <!-- /account-container -->

@if (Route::has('login'))
    <div class="login-extra">
        Already have an account?
        <a href="{{ route('login') }}">
            {{ __('Login to your account') }}
        </a>
    </div> <!-- /login-extra -->
@endif
@endsection
