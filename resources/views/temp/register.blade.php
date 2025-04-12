@extends('layouts.application')

@section('content')
<div id="login-page">
  <div class="section-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>
            Sign Up <br>
            <small>
              You are just one step away from using our app
            </small>

          </h2>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="login-box signup">

      <div class="row">
        <div class="col-md-12">
          <form role="form" method="POST" action="{{ route('Auth/register') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control input-lg" placeholder="you@yourcompany.com" id="email" name="email" required>
            </div>

            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label for="firstname">First Name</label>
                  <input type="text" class="form-control input-lg" placeholder="Jeremy" id="firstname" name="firstname" required>
                </div>
              </div>

              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label for="lastname">Last Name</label>
                  <input type="text" class="form-control input-lg" placeholder="Evans" id="lastname" name="lastname" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control input-lg" placeholder="Super Secret" id="password" name="password" required>
            </div>

            <div class="form-group">
              <label for="inputPasswordConfirmation">Password Confirmation</label>
              <input type="password" class="form-control input-lg" placeholder="Super Secret" id="inputPasswordConfirmation">
            </div>

            <div class="form-group checkbox">
              <div>
                <input class="magic-checkbox" type="checkbox" name="layout" id="agree" checked="checked">
                <label for="agree">I agree to the <a href="sidebar.html">Terms and Conditions</a></label>
              </div>
            </div>

            <br>

            <div class="actions">
              <button type="submit" class="btn btn-lg btn-primary">
                <i class="fa fa-check-sign"></i> Create your account
              </button>

              <br><br>

              <small class="text-muted">
                Already have an account? <a href="login">Login</a>
              </small>
            </div>


          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
