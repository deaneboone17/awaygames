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
              Enter your travel information.
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
          <h1 id="tables">A Few Questions About Your Trip</h1>
           

                <div class="bs-component">
                  
                    <h4>{{ $games->gameDate." @ ".$games->gameTime." - ".$games->visitingTeam." vs. ".$games->homeTeam." (".$games->venueName.", ".$games->venueLocation.")" }}</h4>
                </div>
                <br/>

            <div class="col-md-10" style="background:transparent url('../img/venues/{{ $games->home_id }}.jpg'); background-size: cover; background-repeat: no-repeat;">
              <form role="form" method="POST" action="{{ route('flights') }}">
                {{ csrf_field() }}

                <!--Store the destination airport code as a hidden form element, making it available with the other POST variables from the form.-->

                <input name="arriveAirport" type="hidden" value="{{ $arriveAirport }}">
                         
                
              <div class="form-group col-md-5">
                <label for="departDate">Departure Date</label>
                <input type="date" id="datepicker" class="form-control input-lg" id="departDate" name="departDate" required autofocus>
                
                
              </div>
              <div class="form-group col-md-5">
                <label for="returnDate">Return Date</label>
                <input type="date" id="datepicker" class="form-control input-lg" id="returnDate" name="returnDate" required>

                
              </div>

               <div class="form-group col-md-5">
                <label for="travelers">Number of Travelers</label>
                <input type="text" class="form-control input-lg" id="travelers" name="travelers" data-placeholder="Enter a Number" required>
                              
              </div>

              <div class="form-group col-md-5">
                <label for="departAirport">Departure Airport</label>
                <select class="form-control input-lg" id="departAirport" name="departAirport" data-placeholder="Select Departure Airport" required>

                  @foreach($airports as $key=>$airport)
                    <option value="{{ $airport }}">{{ $key }}</option>
                  @endforeach -->

                </select>
                
                
              </div>

              <div class="form-group col-md-10">
               <br/>
               <br/>

               @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
              
              <button type="submit" class="btn btn-lg btn-primary pull-left">Check Available Flights
                
              </button>

              </div> 



            </div>
            
             
                
            
            
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