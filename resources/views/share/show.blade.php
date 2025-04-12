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
              Invite some friends to come along.
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

        <div class="additional-header">
  <h3>
    Share Your Upcoming Trip With a Friend<br>
    <small>
              Separate multiple email addresses with a comma.

    </small>
  </h3>
</div>


<form id="contact-us-form" role="form" method="POST" action="{{ route('share') }}">

{{ csrf_field() }}


  <div class="row">
    <div class="col-md-5">
    
      <div class="form-group">
        <label for="email">Email <sup>*</sup></label>
        <input type="text" name="email" id="email" class="form-control">
        <input name="tripId" type="hidden" value="{{ $trips->id }}">
      </div>

    </div>

  </div>


  <div class="actions">

                 @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
    <input type="submit" class="btn btn-primary btn-lg" value="Share Trip">
  </div>
</form>
       
        </div>  

        
      </div>
  </section>

  @include('partials.horizontal-features')

</div>

@endsection
