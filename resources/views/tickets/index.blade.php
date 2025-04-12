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
              Here is the ticket availability.  Now let's check out the hotels in the area.
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
            <div >
                  <h1 id="tables">Ticket Availability</h1>
                </div>

                <div class="bs-component">
                  <ul>
                    

                      <h5>
                        <a href="{{ $tickets->ticketUrl }}" target="_blank">
                        {{ $tickets->ticketTitle }} <br/>

                        {{ "Date/Time:  ".date('m/d/Y  g:i a', strtotime($tickets->ticketTime)) }}<br/><hr/>

                        {{ "Number of Tickets Available:  ".$tickets->ticketCount }}<br/>

                        {{ "Lowest Price:  ".$tickets->ticketLow }}<br/>

                        {{ "Highest Price:  ".$tickets->ticketHigh }}<br/><hr/>

                        {{ "Purchase Tickets @ SeatGeek "}}<br/><br/>
                        


                      </h5>

                   
                  </ul>

                  


                </div>
                </div>
				            
          </div>
              <a href="/hotels" class="btn btn-lg btn-primary pull-right">Check Hotel Availability</a>

        </div><!-- main-content -->



        <!-- sidebar -->

      </div>
    </div>
  </section>

  @include('partials.horizontal-features')

</div>

@endsection
