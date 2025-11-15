
  <body>
    <div class="container">
      <form  method="POST" action="{{ route('login') }}">
        @csrf
                @if(session('message'))
                    <div class="alert alert-info" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
        <p>Welcome</p>
                        <input id="email" name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">

                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        <br />
                        <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">

                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                        <br />
                            <button type="submit" class="btn btn-primary px-4" style="width: 200px; height:30px;border-radius: 10px;">
                                {{ trans('global.login') }}
                            </button>
                            <br />
                                    @if(Route::has('password.request'))
                                <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                    {{ trans('global.forgot_password') }}
                                </a><br>
                            @endif
                            <a class="btn btn-link px-0" href="{{ route('register') }}">
                                {{ trans('global.register') }}
                            </a>
      </form>

      <div class="drops">
        <div class="drop drop-1"></div>
        <div class="drop drop-2"></div>
        <div class="drop drop-3"></div>
        <div class="drop drop-4"></div>
        <div class="drop drop-5"></div>
      </div>
    </div>
    <div class="MDJAminDiv">
      <a
        class="MDJAmin"
        href="https://github.com/ajaysingh1212"
        target="_blank"
        >Rock On Devil</a
      >
    </div>
  </body>
<style>
    body {
  background: linear-gradient(45deg, #c3ff00, #002aff);
  height: 100%;
  font-family: "Montserrat", sans-serif;
}

.container {
  position: absolute;
  transform: translate(-50%, -50%);
  top: 50%;
  left: 50%;
}

form {
  background: rgba(255, 255, 255, 0.3);
  padding: 3em;
  height: 320px;
  border-radius: 20px;
  border-left: 1px solid rgba(255, 255, 255, 0.3);
  border-top: 1px solid rgba(255, 255, 255, 0.3);
  backdrop-filter: blur(10px);
  box-shadow: 20px 20px 40px -6px rgba(0, 0, 0, 0.2);
  text-align: center;
  position: relative;
  transition: all 0.2s ease-in-out;
}
form p {
  font-weight: 500;
  color: #fff;
  opacity: 0.7;
  font-size: 1.4rem;
  margin-top: 0;
  margin-bottom: 60px;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}
form a {
  text-decoration: none;
  color: #ddd;
  font-size: 12px;
}

orm a:hover {
  text-shadow: 2px 2px 6px #00000040;
}
form a:active {
  text-shadow: none;
}
form input {
  background: transparent;
  width: 200px;
  padding: 1em;
  margin-bottom: 2em;
  border: none;
  border-left: 1px solid rgba(255, 255, 255, 0.3);
  border-top: 1px solid rgba(255, 255, 255, 0.3);
  border-radius: 5000px;
  backdrop-filter: blur(5px);
  box-shadow: 4px 4px 60px rgba(0, 0, 0, 0.2);
  color: #fff;
  font-family: Montserrat, sans-serif;
  font-weight: 500;
  transition: all 0.2s ease-in-out;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}
form input:hover {
  background: rgba(255, 255, 255, 0.1);
  box-shadow: 4px 4px 60px 8px rgba(0, 0, 0, 0.2);
}
form input[type="email"]:focus,
form input[type="password"]:focus {
  background: rgba(255, 255, 255, 0.1);
  box-shadow: 4px 4px 60px 8px rgba(0, 0, 0, 0.2);
}
form input[type="button"] {
  margin-top: 10px;
  width: 150px;
  font-size: 1rem;
}
form input[type="button"]:hover {
  cursor: pointer;
}
form input[type="button"]:active {
  background: rgba(255, 255, 255, 0.2);
}
form:hover {
  margin: 4px;
}

::placeholder {
  font-family: Montserrat, sans-serif;
  font-weight: 400;
  color: #fff;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
}

.drop {
  background: rgba(255, 255, 255, 0.3);
  backdrop-filter: blur(10px);
  border-radius: 10px;
  border-left: 1px solid rgba(255, 255, 255, 0.3);
  border-top: 1px solid rgba(255, 255, 255, 0.3);
  box-shadow: 10px 10px 60px -8px rgba(0, 0, 0, 0.2);
  position: absolute;
  transition: all 0.2s ease;
}
.drop-1 {
  height: 80px;
  width: 80px;
  top: -20px;
  left: -40px;
  z-index: -1;
}
.drop-2 {
  height: 80px;
  width: 80px;
  bottom: -30px;
  right: -10px;
}
.drop-3 {
  height: 100px;
  width: 100px;
  bottom: 120px;
  right: -50px;
  z-index: -1;
}
.drop-4 {
  height: 120px;
  width: 120px;
  top: -60px;
  right: -60px;
}
.drop-5 {
  height: 60px;
  width: 60px;
  bottom: 170px;
  left: 90px;
  z-index: -1;
}

a,
input:focus,
select:focus,
textarea:focus,
button:focus {
  outline: none;
}

.MDJAminDiv {
  z-index: 4444;
  position: fixed;
  bottom: 5%;
  left: 2%;
}

.MDJAmin {
  text-decoration: none;
  border-bottom: 1px dashed rgb(44, 44, 44);
  border-top: 1px dashed rgb(44, 44, 44);
  padding: 4px 0;
  color: rgba(44, 44, 44, 0.525);
  font-family: monospace;
  font-style: italic;
  font-size: 1.3em;
  transition: all 0.5s;
}

.MDJAmin:hover {
  color: #000000;
}

</style>