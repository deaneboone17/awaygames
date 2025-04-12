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
              You've selected your departing flight.  Now check the return flights.
            </small>
          </h2>
        </div>
      </div>
    </div>
  </div>

  <section id="sidebar-page" class="page-content">
    <div class="container">

      <div class="row">
	  
	  @include('partials.sidebar')

        <div class="col-md-10 main-content">

          <div class="page-content">
            <div>
                  <h1 id="tables">{{"Your Departing Flight on ".date('m/d/Y', strtotime($depart->departureTime)) }}</h1>
                </div>

                @if($connectCount>0)

                <h5>@include('partials.departConnectTable')</h5>

                @else

                <h5>@include('partials.departDirectTable')</h5>

                @endif

                  <div class="col-md-10">
               <br/>
               <br/>
              
              <a href="/returns" class="btn btn-lg btn-primary pull-right">Check Return Flights
                
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
