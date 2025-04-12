@extends ('layouts.application')

@section('content')
<div id="login-page">
  <div class="section-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>
            Forgot Your Password? <br>
            <small>
              Reset Your Email
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
          <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
            
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
