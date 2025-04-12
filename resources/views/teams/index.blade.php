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
              Pick the team you want to travel with.
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
                  <h1 id="tables">Select Your Team</h1>
                </div>

                <div class="bs-component">
                  <table class="table table-bordered table-responsive table-striped table-hover ">
                    <thead>
                      <tr class="info">
                        <th>AFC East</th>
                        <th>AFC North</th>
                        <th>AFC South</th>
                        <th>AFC West</th>
                      </tr>
                    </thead>
                    <tbody>

                       
                      <!--Looping throught the Teams collection.  Using the slice method of Collection class to access specific elements.-->                        
                      <tr>
                                                                           
                        @foreach($teams->slice(0,4) as $team)
                          <td><h5><a href="/teams/{{ $team->id }}">{{ $team->teamName }}</a></h5></td>
                        @endforeach
                                                      
                      </tr>
                      
                      <tr>
                                                                           
                        @foreach($teams->slice(4,4) as $team)
                          <td><h5><a href="/teams/{{ $team->id }}">{{ $team->teamName }}</a></h5></td>
                        @endforeach
                                                      
                      </tr>

                      <tr>
                                                                          
                        @foreach($teams->slice(8,4) as $team)
                          <td><h5><a href="/teams/{{ $team->id }}">{{ $team->teamName }}</a></h5></td>
                        @endforeach
                                                      
                      </tr>
                      
                      <tr>
                                                                          
                        @foreach($teams->slice(12,4) as $team)
                          <td><h5><a href="/teams/{{ $team->id }}">{{ $team->teamName }}</a></h5></td>
                        @endforeach
                                                      
                      </tr>
                    </tbody>
                  </table>
                  </div>

                <div class="bs-component">
                  <table class="table table-bordered table-responsive table-striped table-hover ">
                    <thead>
                      <tr class="info">
                        <th>NFC East</th>
                        <th>NFC North</th>
                        <th>NFC South</th>
                        <th>NFC West</th>
                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        @foreach($teams->slice(16,4) as $team)
                        <td><h5><a href="teams/{{ $team->id }}">{{ $team->teamName }}</a></h5></td>
                        @endforeach
                                                      
                      </tr>

                      <tr>
                        @foreach($teams->slice(20,4) as $team)
                        <td><h5><a href="teams/{{ $team->id }}">{{ $team->teamName }}</a></h5></td>
                        @endforeach
                                                      
                      </tr>

                      <tr>
                         @foreach($teams->slice(24,4) as $team)
                         <td><h5><a href="teams/{{ $team->id }}">{{ $team->teamName }}</a></h5></td>
                         @endforeach
                                                      
                      </tr>

                      <tr>
                        @foreach($teams->slice(28,4) as $team)
                        <td><h5><a href="teams/{{ $team->id }}">{{ $team->teamName }}</a></h5></td>
                        @endforeach
                                                      
                      </tr>


                    </tbody>
                  </table>
                </div>

                     


                      

                    </tbody>
                  </table>
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
