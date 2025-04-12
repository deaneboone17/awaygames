@extends('layouts/application')

@section('content')
<div id="contact-page">

  <div id="map-container">
    <div id="map">
      <div id="marker-wrapper">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 23 21" >
          <g id="marker" x="100px" y="100px" >
            <circle class="core" cx="11.3" cy="10.8" r="0.5"/>
            <circle class="ring" stroke-width="0.2" fill="none" stroke="#000000" stroke-miterlimit="1" cx="11.3" cy="10.8" r="1"/>
          </g>
        </svg>
      </div>

      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3083.3407619776863!2d-76.61137808421908!3d39.3937960794973!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c80fbe06610c01%3A0x9c3916eeb682f854!2sTowson+University!5e0!3m2!1sen!2sus!4v1492397738065" width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

    </div>

    <div id="address">
      <div class="text">
        <h2>Get in touch</h2>
        <p class="lead">Drop in for a cup of coffee</p>

        <address>
          <strong>AwayGames</strong><br>
          7800 York Road<br>
          Towson, MD 21204<br>
          USA<br>
          
          <abbr title="Phone">Tel:</abbr> 456-121-1122
        </address>
      </div>
    </div>
  </div>


  <div class="container contact-form">
    <div class="row">
      <div class="col-md-9">
        @include('partials/contact-form')
      </div>

      <aside class="col-lg-3 col-md-3 sidebar">
        <div class="notepaper">
          <div class='note'>
            <div class='text'>

              <p>
                <strong>Call us</strong> <br>

                Talk to our customer service representative at <strong>456-212-1122</strong>
              </p>

              <hr>

              <p >
                <strong>Email us</strong> <br>

                Talk to our developers by sending an email to <strong>awaygames2017@gmail.com</strong>
              </p>


            </div>
          </div>
        </div>

        
      </aside>
    </div>
  </div>

</div>

@include ('partials/horizontal-features')

@endsection
