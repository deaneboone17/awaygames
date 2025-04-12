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
              Now that you've selected your hotel, what is there to do around town?
            </small>
          </h2>
        </div>
      </div>
    </div>
  </div>

  <section id="sidebar-page" class="page-content">
    <div class="container">

      <div class="row">
	  
	  <h6>@include('partials.sidebar')</h6>

        <div class="col-md-10 main-content">

          <div class="page-content">
            <div>
                  <h1 id="tables">Your Selected Hotel</h1>
                </div>

                <h5>@include('partials.hotels')</h5>
                  <div class="col-md-10">
               <br/>
               <br/>
              
              <a href="/pois" class="btn btn-lg btn-primary pull-right">Check Area Points of Interest
                
              </a>

              </div> 
				            
          </div>
        </div><!-- main-content -->



        <!-- sidebar -->

      </div>
    </div>
  </section>

  @include('partials.horizontal-features')

</div>

@endsection
