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
              Select your return flight.
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

        <div class="col-md-9 main-content">

          <div class="page-content">
            <div>
                  <h1 id="tables">Choose Your Return Flight(s)</h1>
                </div>

                @if($connectCount>0)

                <h5>@include('partials.returnConnect')</h5>

                @else

               <h5> @include('partials.returnDirect')</h5>

                @endif

				            
          </div>
        </div><!-- main-content -->



        <!-- sidebar -->

      </div>
    </div>
  </section>

  @include('partials.horizontal-features')

</div>

@endsection
