@extends('layouts.application')

@section('content')
<div id="static-page">

  <div class="section-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>
            Build Your Game Day Experience <br>
            <small>
              Let's get started by entering some basic information.
            </small>
          </h2>
        </div>
      </div>
    </div>
  </div>

  <section id="sidebar-page" class="page-content">
    <div class="container">

      <div class="row">
    
    <aside class="col-md-2" id="page-sidebar">
          
          <div class="sidebar-widget">
            <div class="additional-header">
              
            </div>

            <ul class="nav">

            @if (Auth::check())
              <li>
                <a href="/select">Home</a>
              </li>

              @else
                <li>
                <a href="/">Home</a>
              </li>
              @endif


              <li>
                <a href="/about">About</a>
              </li>

              <li>
                <a href="/faq">FAQs</a>
              </li>

              <li>
                <a href="gallery.html">Contact Us</a>
              </li>

            </ul>
          </div>

          
        </aside>

        <div class="col-md-10 main-content">


        <div class="col-md-6 main-content"><!--Links to saved trips-->
        <h3 class="text-center">Saved Trips</h3>
        <a href="#" class="btn btn-lg btn-block btn-primary btn-round btn-main-cta">Trip 1</a><br/>
        <a href="#" class="btn btn-lg btn-block btn-primary btn-round btn-main-cta">Trip 2</a><br/>
        <a href="#" class="btn btn-lg btn-block btn-primary btn-round btn-main-cta">Trip 3</a><br/>
        <a href="#" class="btn btn-lg btn-block btn-primary btn-round btn-main-cta">Trip 4</a>
        

        </div>  

        
        <div class="col-md-4 main-content">
        <div>
        <h3 class="text-center">Manage Trips</h3>
          <a href="/teams" class="btn btn-lg btn-block btn-primary btn-round btn-main-cta">
              <i class="material-icons">flight</i>
              Create Trip
            </a>

        </div>
        <br/>

        <div>

            <a href="#" class="btn btn-lg btn-block btn-primary btn-round btn-main-cta">
              <i class="material-icons">mode_edit</i>
              Edit Trip
            </a>

        </div>
        <br/>

        <div>

            <a href="#" class="btn btn-lg btn-block btn-primary btn-round btn-main-cta">
              <i class="material-icons">email</i>
              Share Trip
            </a>
        </div>
        
        </div><!-- main-content -->



        <!-- sidebar -->

      </div>
    </div>
  </section>

  @include('partials.horizontal-features')

</div>

@endsection
