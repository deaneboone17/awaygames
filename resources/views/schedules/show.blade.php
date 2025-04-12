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
      
      @include('partials.sidebar')

        <div class="col-md-9 main-content">

          <div class="page-content">
            <div class="page-header">
                  <h1 id="tables">A Few Questions About Your Trip</h1>
                  
                </div>

                <div class="bs-component">
                  
                    <h4>{{ $schedule->gameDate." @ ".$schedule->gameTime." - ".$schedule->visitingTeam." vs. ".$schedule->homeTeam." (".$schedule->venueName.", ".$schedule->venueLocation.")" }}</h4>
                </div>
                <br/>
                <div class="col-md-8">
            <form role="form" method="POST" action="{{ route('flights') }}">
              {{ csrf_field() }}
                       
              
            <div class="form-group">
              <label for="departDate">Departure Date</label>
              <input type="text" class="input-group date" id="departDate" name="departDate">
              
              
            </div>
            <div class="form-group">
              <label for="returnDate">Return Date</label>
              <input type="text" class="input-group date" id="returnDate" name="returnDate">
              
              
            </div>

            <div class="form-group">
              <label for="travelers">Number of Adults</label>
              <input type="text" class="input-group text" id="travelers" name="travelers">
                            
            </div>

                  
            <button type="submit" class="btn btn-lg btn-primary">Check Available Flights
              
            </button>
            
          </form>
            
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
