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
              Create a new trip or manage an existing one.
            </small>
          </h2>
        </div>
      </div>
    </div>
  </div>

  <section class="page-content">
    <div class="container">

      <div class="row">
    
    <h6>@include('partials.sidebar')</h6>

        <div class="col-md-10 main-content">


        @if(count($trips)>0)

        <div class="col-md-10 main-content">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">

            <thead>
                <tr>
                    <th>View Saved Trips</th>
                    <th>Manage Trips</th>
                    </tr>
            </thead>

            <tbody>
                @foreach($trips as $trip)
                <tr>

                <td><h5><a href="/trips/{{ $trip->id }}">{{ $trip->gameDate."-".$trip->visitingTeam." vs.".$trip->homeTeam }}</a></h5></td>
                <td><div class="btn-toolbar">
                        <a href="/trips/{{ $trip->id }}/share" class="btn btn-info pull-left" style="margin-right: 3px;">Share</a>
                        <a href="/trips/{{ $trip->id }}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                        <a href="/trips/{{ $trip->id }}/delete" class="btn btn-danger" onclick="return confirm('Are You Sure?')" style="margin-right: 3px;">Delete</a>

                    </div></td>

                </tr>
                     
        @endforeach
        </tbody>
        </table>

        
        </div>  

        <br/>
        <br/>
        <div class="col-md-8 col-md-offset-2 main-content">
        <div>
          <a href="/teams" class="btn btn-lg btn-block btn-primary btn-main-cta">
              <i class="material-icons">flight</i>
              Create Trip
            </a>

        </div>
        <br/>

             
        
        </div><!-- main-content -->

        @else

        <div class="col-md-12 main-content">
        <div>
        <h3 class="text-center">You Have No Saved Trips</h3>
          <a href="/teams" class="btn btn-lg btn-block btn-primary  btn-main-cta">
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
