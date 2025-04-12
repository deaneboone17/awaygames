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
            @include('partials.departConnectTable')
          
            @else

            <h3>Departing Flight</h3>
            @include('partials.departDirectTable')
          
            @endif


            @if($connectCountR>0)

            <h3>Returning Flight</h3>
            @include('partials.returnConnectTable')

            @else
            <h3>Returning Flight</h3>
            @include('partials.returnDirectTable')

            @endif

            <h3>Ticket Information</h3>
            @include('partials.tickets')

            <h3>Hotel Information</h3>
            @include('partials.hotels')

            <h3>Point of Interest</h3>
            @include('partials.pois')

                
                				            
          </div>

          <div class="btn-toolbar">

          <a href="/trips/{{ $trip->id }}/share" class="btn btn-md btn-primary pull-right">Share Trip</a>

          <a href="/trips/{{ $trip->id }}/edit" class="btn btn-md btn-primary pull-right">Edit Trip</a>

              <a href="/trips/{{ $trip->id }}/delete" class="btn btn-danger btn-md btn-primary pull-right" onclick="return confirm('Are You Sure?')">Delete Trip</a>
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
