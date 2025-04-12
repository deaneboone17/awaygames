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
    
    <h6>@include('partials.sidebar')</h6>

        <div class="col-md-10 main-content">


        @if(count($trips)>0)

        <div class="col-md-10 main-content">
        <h3 class="text-center">Saved Trips</h3>
        
        <ul>
        @foreach($trips as $trip)

        <div class="btn-toolbar">
        <a href="/trips/{{$trip->id}}" class="btn btn-lg btn-primary btn-round btn-main-cta">{{ $trip->gameDate."-".$trip->visitingTeam." vs.".$trip->homeTeam }}</a>

        <a href="/trips/{{ $trip->id }}/edit" class="btn btn-xs btn-primary btn-round btn-main-cta pull-right">
              <i class="material-icons">mode_edit</i>
              Edit
            </a>

        <a href="/trips/{{ $trip->id }}/delete" class="btn btn-xs btn-primary btn-round btn-danger btn-main-cta pull-right" onclick="return confirm('Are You Sure?')">
              <i class="material-icons">delete</i>
              Delete
            </a>
        </div>
        
        @endforeach
        
        </ul>
        </div>  

                
        
        </div><!-- main-content -->

        @else

        <div class="col-md-10 main-content">
        <div>
        <h3 class="text-center">You Have No Saved Trips</h3>
          <a href="/teams" class="btn btn-lg btn-block btn-primary btn-round btn-main-cta">
              <i class="material-icons">flight</i>
              Create Trip
            </a>

        </div>
                
        </div>

        @endif
        <!-- sidebar -->

      </div>
    </div>
  </section>

  @include('partials.horizontal-features')

</div>

@endsection
