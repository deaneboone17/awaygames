@extends('layouts.application')


@section('content')
<div id="index">
  <section id="headline-cover">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="headline-text"  data-aos="fade-up-right">
            The easy way to plan your Pro Football road trip.
          </h1>

          <p class="subheading-text"  data-aos="fade-up-right">
            Simply register or login and let's get started.
          </p>

          <div class="buttons-container" data-aos="fade-up-right">
            <a href="{{ route('Auth/register') }}" class="btn btn-lg btn-primary btn-round btn-main-cta">
              Register
            </a>

            <span class="or">or</span>

            <a href="{{ route('Auth/login') }}" class="btn btn-lg btn-primary btn-round btn-main-cta">
              Sign In
            </a>
          </div>
        </div>

        <div class="col-md-6 hidden-sm hidden-xs" data-aos="fade-up-left">
         <!-- <img class="img-responsive main-img" src="img/display/mockup-4.png" alt="">
		 -->
        </div>
		
      </div>


    </div>

  </section>


  @include('partials.horizontal-features')



  </div>
@endsection
