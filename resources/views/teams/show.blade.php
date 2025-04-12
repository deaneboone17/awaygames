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
              Pick the game you wish to see.
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
                  <h1 id="tables">Select Your Game</h1>
                </div>

                <div class="bs-component">
                  <ul>

                   @foreach($games as $game)

                      <h5>
                                       
                        <a href="/games/{{ $game->id }}">
                        {{ $game->gameDate." @ ".$game->gameTime." - ".$game->visitingTeam." vs. ".$game->homeTeam." (".$game->venueName.", ".$game->venueLocation.")" }} 

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
