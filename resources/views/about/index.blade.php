@extends('layouts/application')

@section('content')
<div id="about" class="page">

  <div class="section-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>
            About AwayGames

            <br>

            <small>
              Road Trips Made Easy
            </small>
          </h2>
        </div>
      </div>
    </div>
  </div>

  <div class="page-content">
    <div class="container">


      <div class="row">
        <div class="col-sm-8">

          <div class="additional-header">
            <h3>Background</h3>
          </div>
          <h5>
          <p>
            The AwayGames project is a web-based application that allows users to research tickets, travel and lodging within a single interface.  The project incorporates several technologies and best practices currently used in the Information Technology domain which aligns with the concept of applied IT within the Towson University AIT program.  These include object-oriented programming, database management and web design.  
          </p>

          <p>
            AwayGames was developed using the Laravel PHP Framework.  Laravel uses a fully-compliant model-view-controller (MVC) design pattern that leverages Composer for dependency management.  The framework also adheres to object oriented programming concepts through its implementation of base classes and methods used to create and manage objects within the application.  
          </p>

          <p>
            The application was deployed as a cloud-based system utilizing infrastructure provided by Amazon Web Services (AWS).  A LAMP (Linux, Apache, MySQL, and PHP) server, storage and a database instance was provisioned using AWS Elastic Compute Cloud (EC2) and AWS Relational Database Service.  
          </p>

          <p>
            Because of its responsiveness, flexibility, and support, the user interface was designed using the Bootstrap framework.  The server-side PHP was created with the Sublime3 IDE. A MySQL database was created and managed using migrations from the Eloquent ORM implementation within Laravel.  The application makes calls to resources provided by Google QPX Express, SeatGeek and Yelp.  The calls are made using RESTful services.

          </p></h5>
          <br/>

          </div>

        <div class="col-sm-4">
          <div class="widget widget-cream about-widget">
            <div class="image">
              <img src="img/cleancut/business3.jpg" alt="" class="img-responsive img-thumbnail">
            </div>
            <div class="text">
              <h5>Typical AwayGames development area!</h5>
              <p>Not at all true.</p>
            </div>
          </div>
        </div>
      </div>

      

    </div><!-- container -->
  </div><!-- page content -->


  
  @include('partials/horizontal-features')


</div>
@endsection
