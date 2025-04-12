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
              Here's your trip information.
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
                  <h1 id="tables">{{ "Review Your Trip to ".$ticket->ticketVenueCity." on ".date('m/d/Y', strtotime($depart->departureTime)) }}</h1>
                </div>

            @if($connectCount>0)

            <h3>Departing Flight</h3>
            <h5>@include('partials.departConnectTable')</h5>

            @else

            <h3>Departing Flight</h3>
            <h5>@include('partials.departDirectTable')</h5>

            @endif


            @if($connectCountR>0)

            <h3>Returning Flight</h3>
            <h5>@include('partials.returnConnectTable')</h5>

            @else

            <h3>Returning Flight</h3>
            <h5>@include('partials.returnDirectTable')</h5>

            @endif


            <h3>Ticket Information</h3>
            <h5>@include('partials.tickets')</h5>

            <h3>Hotel Information</h3>
            <h5>@include('partials.hotels')</h5>

            <h3>Point of Interest</h3>
            <h5>@include('partials.pois')</h5>

                
                				            
          </div>

          </div>
              <a href="/trips/{{$trip->id}}/save" class="btn btn-lg btn-primary pull-right">Save Trip</a>
        </div><!-- main-content -->



        <!-- sidebar -->

      </div>
    </div>
  </section>

  @include('partials.horizontal-features')

</div>

@endsection
