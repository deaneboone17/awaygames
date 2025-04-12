@extends('layouts.application')

@section('content')
<div id="static-page">

  <div class="section-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>
            Admin Dashboard <br>
            <small>
              Manage users and assign user roles.
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

        

  <div class="row">
    <div class="col-lg-10">

    <h1><i class="fa fa-dashboard"></i> Admin Dashboard</h1>

    <div >

    <a href="/admin" class="btn btn-lg btn-block btn-primary  btn-main-cta">
              <i class="fa fa-user"></i>
              User Maintenance
            </a>

            @if($roles->id >2)

            <a href="#" class="btn btn-lg btn-block btn-primary  btn-main-cta">
              <i class="fa fa-calendar"></i>
              Update League Schedule
            </a>

                      
             @endif
            
        
    </div>

   

    </div>

  </div>


  
       
        </div>  

        
      </div>
  </section>

  @include('partials.horizontal-features')

</div>

@endsection














