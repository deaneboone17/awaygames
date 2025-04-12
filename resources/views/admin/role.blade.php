@extends('layouts.application')

@section('content')
<div id="login-page">
  <div class="section-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>
            Assign User Role <br>
            <small>
              
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
                                 
                    <form role="form" method="POST" action="/user/{{ $user->id }}/role">
                        
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-Mail Address</label>

                            <input id="email" type="email" class="form-control input-lg" name="email" value="{{ $user->email }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="row">
                          <div class="col-md-6 col-lg-6">
                            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                              <label for="firstname">First Name</label>
                              <input id="firstname" type="text" class="form-control input-lg" name="firstname" value="{{ $user->firstname }}" required>

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                          <div class="col-md-6 col-lg-6">
                            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                              <label for="lastname">Last Name</label>
                              <input id="lastname" type="text" class="form-control input-lg" name="lastname" value="{{ $user->lastname }}" required>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>

                          </div>
                          
                          <div class="form-group">
                              <label for="roleName">User Role</label>
                              <select id="roleName" type="text" class="form-control input-lg" name="roleName" value="{{ $role->roleName }}" required>
                              <option selected disabled>Select User Role</option>
                                @foreach($roles as $role)
                              <option>{{  $role->roleName  }}</option>
                                @endforeach

                              </select>

                            </div>
                        

                       
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Assign Role</button>
                            </div>
                    </form>
      </div>
        </div>
     </div>
   </div>
</div>
    

@endsection









































