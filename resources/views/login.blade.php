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
        <div class="col-md-4">
          <div class="social-elements">
            <p>
              <a data-toggle="tooltip" title="Sign in with Facebook"  class="btn btn-primary social-login-btn social-facebook"><i class="fa fa-facebook"></i></a>
              <a data-toggle="tooltip" title="Sign in with Twitter" class="btn btn-primary social-login-btn social-twitter"><i class="fa fa-twitter"></i></a>
            </p>
            <p>
              <a data-toggle="tooltip" title="Sign in with LinkedIn" class="btn btn-primary social-login-btn social-linkedin"><i class="fa fa-linkedin"></i></a>
              <a data-toggle="tooltip" title="Sign in with Google+" class="btn btn-primary social-login-btn social-google"><i class="fa fa-google-plus"></i></a>
            </p>

            <br>

            <div class="btn-group">
              <button type="button" class="btn btn-lg social-login-btn-dropdown btn-default dropdown-toggle" data-toggle="dropdown">
                More <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#"><i class="fa fa-tumblr"></i> Tumblr</a></li>
                <li><a href="#"><i class="fa fa-github"></i> Github</a></li>
                <li><a href="#"><i class="fa fa-dropbox"></i> Dropbox</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-8">
            <form role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
              
            <div class="form-group">
              <label for="email">Username or email</label>
              <input type="email" class="form-control input-lg" placeholder="john@doe.com" id="email" name="email" value="{{ old('email') }}" required autofocus>
			  @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
			  
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <a class="pull-right" href="#">Forgot password?</a>
              <label for="password">Password</label>
              <input type="password" class="form-control input-lg" id="password" placeholder="Super Secret">
			  
			  @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
			  
			  
            </div>
            <div class="checkbox pull-right">
              <div>
                <input class="magic-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Remember Me</label>
              </div>
            </div>

            <button type="submit" class="btn btn-lg btn-primary">
              
            </button>
			<a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
          </form>
            
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
