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
                  <h1 id="tables">Select Your Game</h1>
                </div>

                <div class="bs-component">
                  <ul>
                    @foreach($schedules as $schedule)

                      <h5>
                        <a href="schedules/{{ $schedule->id }}">
                        {{ $schedule->gameDate." @ ".$schedule->gameTime." - ".$schedule->visitingTeam." vs. ".$schedule->homeTeam." (".$schedule->venueName.", ".$schedule->venueLocation.")" }}

                      </h5>

                    @endforeach
                  </ul>
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
