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
	  
	  <aside class="col-md-3" id="page-sidebar">
          
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

        <div class="col-md-9 main-content">

          <div class="page-content">
            <div class="page-header">
                  <h1 id="tables">Select Your Team</h1>
                </div>

                <div class="bs-component">
                  <table class="table table-bordered table-responsive table-striped table-hover ">
                    <thead>
                      <tr >
                        <th>AFC East</th>
                        <th>AFC North</th>
                        <th>AFC South</th>
                        <th>AFC West</th>
                      </tr>
                    </thead>
                    <tbody>

                       
                      <!--Looping throught the Teams collection.  Using the slice method of Collection class to access specific elements.-->                        
                      <tr class="info">
                                                                           
                        @foreach($teams->slice(0,4) as $team)
                          <td><a href="/teams/{{ $team->id }}">{{ $team->teamName }}</a></td>
                        @endforeach
                                                      
                      </tr>
                      
                      <tr class="success">
                                                                           
                        @foreach($teams->slice(4,4) as $team)
                          <td><a href="/teams/{{ $team->id }}">{{ $team->teamName }}</a></td>
                        @endforeach
                                                      
                      </tr>

                      <tr class="info">
                                                                          
                        @foreach($teams->slice(8,4) as $team)
                          <td><a href="/teams/{{ $team->id }}">{{ $team->teamName }}</a></td>
                        @endforeach
                                                      
                      </tr>
                      
                      <tr class="success">
                                                                          
                        @foreach($teams->slice(12,4) as $team)
                          <td><a href="/teams/{{ $team->id }}">{{ $team->teamName }}</a></td>
                        @endforeach
                                                      
                      </tr>
                    </tbody>
                  </table>

                <div class="bs-component">
                  <table class="table table-bordered table-responsive table-striped table-hover ">
                    <thead>
                      <tr>
                        <th>NFC East</th>
                        <th>NFC North</th>
                        <th>NFC South</th>
                        <th>NFC West</th>
                      </tr>
                    </thead>
                    <tbody>

                      <tr class="info">
                        @foreach($teams->slice(16,4) as $team)
                        <td><a href="teams/{{ $team->id }}">{{ $team->teamName }}</a></td>
                        @endforeach
                                                      
                      </tr>

                      <tr class="success">
                        @foreach($teams->slice(20,4) as $team)
                        <td><a href="teams/{{ $team->id }}">{{ $team->teamName }}</a></td>
                        @endforeach
                                                      
                      </tr>

                      <tr class="info">
                         @foreach($teams->slice(24,4) as $team)
                         <td><a href="teams/{{ $team->id }}">{{ $team->teamName }}</a></td>
                         @endforeach
                                                      
                      </tr>

                      <tr class="success">
                        @foreach($teams->slice(28,4) as $team)
                        <td><a href="teams/{{ $team->id }}">{{ $team->teamName }}</a></td>
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
