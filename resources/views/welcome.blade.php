<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="https://www.danaher.com/themes/danaher_bootstrap/favicon.ico" type="image/vnd.microsoft.icon">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <style>
        .invalid-feedback {
            position: absolute;
            bottom: 10px;
            font-size: 1rem;
            width: 100%;
            text-align: center;
        }
    </style>
    <!-- Styles -->
</head>

<body>
    <section class="user">
        <div class="user_options-container">
          <div class="user_options-text">
            <div class="user_options-unregistered">
              <h2 class="user_unregistered-title">Don't have an account?</h2>
              <p class="user_unregistered-text">Register with your name and enterprise email address.</p>
              <button class="user_unregistered-signup" id="signup-button">Sign up</button>
            </div>

            <div class="user_options-registered">
              <h2 class="user_registered-title">Have an account?</h2>
              <p class="user_registered-text">Banjo tote bag bicycle rights, High Life sartorial cray craft beer whatever street art fap.</p>
              <button class="user_registered-login" id="login-button">Login</button>
            </div>
          </div>

          <div class="user_options-forms" id="user_options-forms">
            <div class="user_forms-login">
              <h2 class="forms_title">Login</h2>
              <form class="forms_form" method="POST" action="{{ route('login') }}">
                  @csrf
                <fieldset class="forms_fieldset">
                  <div class="forms_field">
                    <input type="email" placeholder="Email" class="forms_field-input" required autofocus name="email" />
                    {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> --}}
                  </div>
                  <div class="forms_field">
                    <input type="password" placeholder="Password" class="forms_field-input" name="password" required />
                    {{-- <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> --}}
                  </div>
                </fieldset>
                <div class="forms_buttons">
                  {{-- <button type="button" class="forms_buttons-forgot">Forgot password?</button> --}}
                  <input type="submit" value="Log In" class="forms_buttons-action">
                </div>
              </form>
            </div>
            <div class="user_forms-signup">
              <h2 class="forms_title">Sign Up</h2>
              <form class="forms_form" method="POST" action="{{ route('register') }}">
                @csrf
                <fieldset class="forms_fieldset">
                  <div class="forms_field">
                    <input type="text" placeholder="Full Name" class="forms_field-input" name="name" required />
                  </div>
                  <div class="forms_field">
                    <input type="text" placeholder="OpCo" class="forms_field-input" name="opco" required />
                  </div>
                  <div class="forms_field">
                    <input type="email" placeholder="Email" class="forms_field-input" name="email" required />
                  </div>
                  <div class="forms_field">
                    <input type="password" placeholder="Password" class="forms_field-input" name="password" required />
                  </div>
                  <div class="forms_field">
                    <input type="password" placeholder="Confirm Password" class="forms_field-input" name="password_confirmation" required />
                  </div>
                </fieldset>
                <div class="forms_buttons">
                  <input type="submit" value="Sign up" class="forms_buttons-action">
                </div>
              </form>
            </div>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>*{{ $message }}*</strong>
                </span>
            @enderror
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>*{{ $message }}*</strong>
                </span>
            @enderror
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>*{{ $message }}*</strong>
                </span>
            @enderror
          </div>
        </div>
      </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script>
        /**
 * Variables
 */
const signupButton = document.getElementById("signup-button"),
  loginButton = document.getElementById("login-button"),
  userForms = document.getElementById("user_options-forms");

/**
 * Add event listener to the "Sign Up" button
 */
signupButton.addEventListener(
  "click",
  () => {
    userForms.classList.remove("bounceRight");
    userForms.classList.add("bounceLeft");
  },
  false
);

/**
 * Add event listener to the "Login" button
 */
loginButton.addEventListener(
  "click",
  () => {
    userForms.classList.remove("bounceLeft");
    userForms.classList.add("bounceRight");
  },
  false
);

    </script>
</body>

</html>
