@extends('layouts.application')

@section('content')
<div id="static-page">

  <div class="section-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Update User Preferences</h2>
        </div>
      </div>
    </div>
  </div>

  <section id="sidebar-page" class="page-content">
    <div class="container">

      <div class="row">
    
    <h6>@include('partials.sidebar')</h6>

        <div class="col-md-6 col-md-offset-1 main-content">

          <div class="page-content">
            <form role="form" method="POST" action="/user/{{ $user->id }}/preferences">
                        
                        {{ csrf_field() }}

                                              
                          <div class="form-group">
                              <label for="flightNum">Flights to Return</label>
                              <select id="flightNum" type="text" class="form-control input-lg" name="flightNum" value="{{ $flightPref->prefNum }}" required>
                              <option selected disabled>Select Number of Flights</option>
                                @foreach($flightChoices as $flightChoice)
                              <option>{{  $flightChoice->prefNum  }}</option>
                                @endforeach

                              </select>

                            </div>

                            <div class="form-group">
                              <label for="hotelNum">Hotels to Return</label>
                              <select id="hotelNum" type="text" class="form-control input-lg" name="hotelNum" value="{{ $hotelPref->prefNum }}" required>
                              <option selected disabled>Select Number of Hotels</option>
                                @foreach($hotelChoices as $hotelChoice)
                              <option>{{  $hotelChoice->prefNum  }}</option>
                                @endforeach

                              </select>
                              </div>

                            <div class="form-group">
                              <label for="poiNum">Points of Interest to Return</label>
                              <select id="poiNum" type="text" class="form-control input-lg" name="poiNum" value="{{ $poiPref->prefNum }}" required>
                              <option selected disabled>Select Number of POI</option>
                                @foreach($poiChoices as $poiChoice)
                              <option>{{  $poiChoice->prefNum  }}</option>
                                @endforeach

                              </select>

                            </div>

                       
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Update Preferences</button>
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







<!--





























@extends('layouts.application')

@section('content')
<div id="login-page">
  <div class="section-header">
    <div class="container">
      <div class="row">

        <div class="col-md-12">
          <h2>
            Set User Preferences <br>
            <small>
              
            </small>

          </h2>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="login-box signup">

      <div class="row">

        <div class="col-md-10">
                                 
                    <form role="form" method="POST" action="/user/{{ $user->id }}/preferences">
                        
                        {{ csrf_field() }}

                                              
                          <div class="form-group">
                              <label for="flightNum">Flights to Return</label>
                              <select id="flightNum" type="text" class="form-control input-lg" name="flightNum" value="{{ $flightPref->prefNum }}" required>
                              <option selected disabled>Select Number of Flights</option>
                                @foreach($flightChoices as $flightChoice)
                              <option>{{  $flightChoice->prefNum  }}</option>
                                @endforeach

                              </select>

                            </div>

                            <div class="form-group">
                              <label for="hotelNum">Hotels to Return</label>
                              <select id="hotelNum" type="text" class="form-control input-lg" name="hotelNum" value="{{ $hotelPref->prefNum }}" required>
                              <option selected disabled>Select Number of Hotels</option>
                                @foreach($hotelChoices as $hotelChoice)
                              <option>{{  $hotelChoice->prefNum  }}</option>
                                @endforeach

                              </select>
                              </div>

                            <div class="form-group">
                              <label for="poiNum">Points of Interest to Return</label>
                              <select id="poiNum" type="text" class="form-control input-lg" name="poiNum" value="{{ $poiPref->prefNum }}" required>
                              <option selected disabled>Select Number of POI</option>
                                @foreach($poiChoices as $poiChoice)
                              <option>{{  $poiChoice->prefNum  }}</option>
                                @endforeach

                              </select>

                            </div>

                       
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Update Preferences</button>
                            </div>
                    </form>
      </div>
        </div>
     </div>
   </div>
</div>
    

@endsection









































