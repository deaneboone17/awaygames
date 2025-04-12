@extends ('layouts.application')

@section('content')
<div id="login-page">
  <div class="section-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>
            Welcome Back <br>
            <small>
              Sign in to your account
            </small>
          </h2>

        </div>
      </div>
    </div>
  </div>
<div class="container">
  <div class="login-box">
    <div class="row">

      <div class="col-md-2">
          
        </div>

        <div class="col-md-8">
            
                    <form role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-Mail Address</label>

                               <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <a class="pull-right" href="{{ route('password.request') }}">Forgot Your Password?</a>

                            <label for="password">Password</label>
                            
                                <input id="password" type="password" class="form-control input-lg" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="checkbox pull-left">
                            
                               <div> 
                                    
                                  <input class="magic-checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 
                                    
                                  <label for="remember">Remember Me</label>
                                
                            
                        </div>
                        </div>

                        <div class="form-group">
                            
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                
                                    
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
