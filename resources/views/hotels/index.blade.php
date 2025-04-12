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
              What hotels are in the area?
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
                  <h1 id="tables">Choose Your Hotel</h1>
                </div>

                <div class="bs-component">
                  <ul>
                    @foreach($hotels as $hotel)

                      <a href="hotels/{{ $hotel->id }}">
                        <table class="table table-bordered table-striped table-hover">
                    
                    <tbody>
                       
                      <tr>
                                       
                      <td><h5>{{ $hotel->hotelName }}</h5></td>
                        </div>
                        </tr>                                   
                    </tbody>
                  </table>

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
