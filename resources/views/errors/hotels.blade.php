@extends('layouts/application')

@section('content')
<div id="index">
<div id="headline-cover">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-center">

          <div class="panel panel-default">
            <div class="panel-heading">
              OOPS! THERE WAS A PROBLEM WITH YOUR REQUEST.
            </div>

            <div class="panel-body">

              <h2 class="error-code">404</h2>


              <p class="lead">
                We can't find hotels for this trip, at this time.  Please try again later, or choose different departure dates. Meanwhile, you may return to the <strong><a href="/dashboard">home</a></strong> page.
              </p>

              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection
