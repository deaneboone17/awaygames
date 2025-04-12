{% extends "layouts/application.html" %}

{% block content %}
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

      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3022.944669688224!2d-74.00316699999995!3d40.74124299999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1401691893616" width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

    </div>

    <div id="address">
      <div class="text">
        <h2>Get in touch</h2>
        <p class="lead">Drop in for a cup of coffee</p>

        <address>
          <strong>SuperApp Inc.</strong><br>
          121/A, XYZ Street<br>
          New York<br>
          USA<br>
          CT21 5SH<br>
          <abbr title="Phone">Tel:</abbr> 456-121-1122
        </address>
      </div>
    </div>
  </div>


  <div class="container contact-form">
    <div class="row">
      <div class="col-md-9">
        {% include "partials/contact-form.html" %}
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

                Talk to our developers by sending an email to <strong>devs@mysite.com</strong>
              </p>


            </div>
          </div>
        </div>

        <div class="widget widget-red">
          <h5>
            Browse our knowledge base
          </h5>

          <p>
            We encourage you to browse our knowledge base for answers to common problems
          </p>

          <a href="support.html" class="btn btn-bordered btn-white">Visit Knowledge Base &rarr;</a>
        </div>
      </aside>
    </div>
  </div>

</div>

{% include "partials/horizontal-features.html" %}

{% endblock %}
