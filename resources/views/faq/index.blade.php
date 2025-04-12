@extends('layouts/application')

@section('content')
<div id="faq">
  <div class="section-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>
            Frequently Asked Questions <br>
            <small>
              Don't hesitate to email us if you need any additional help
            </small>
          </h2>
        </div>
      </div>
    </div>
  </div>


  <section id="accordion">
    <div class="container">

      <div class="row">
        <div class="col-md-10 main-content">

          <div class="panel-group">

            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    What is AwayGames?
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                  AwayGames provides travel and ticket information for professional football games.  Its main purpose is to help fans plan road trips to see their favorite team.
                </div>
              </div>
            </div>



            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                    How does AwayGames work?
                  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                  After creating an account choose which team to follow and their away schedule is displayed.  Select a game, enter your travel information, and AwayGames returns options for you to choose from.  Once you have finalized your selections, you can share the trip with friends and family.
                </div>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                    I forgot my password.  How do I reset it?
                  </a>
                </h4>
              </div>
              <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                  If you have forgotten your password, simply click the "Forgot My Password" link on the sign in page, enter the email address used to register and click the "Reset My Password" button.  An email will be sent with a link to reset your password.
                </div>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                    How do I see more results?
                  </a>
                </h4>
              </div>
              <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                  The number of results can be changed using the User Preferences page.  The number of flights, hotels, and points of interest can be changed there.
                </div>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                    My preferred airport isn't listed as a departure airport.  What gives?
                  </a>
                </h4>
              </div>
              <div id="collapseFive" class="panel-collapse collapse">
                <div class="panel-body">
                  The airports listed are the major international airports in the United States as published by nationsonline.org.  A few additional airports were added to cover teams from smaller markets not served by major airports.
                </div>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                    Why are some airline carriers not listed in the results?
                  </a>
                </h4>
              </div>
              <div id="collapseSix" class="panel-collapse collapse">
                <div class="panel-body">
                  Some airlines have elected not to provide their data to the third-party API used to generate the flight options.  However, there are plenty of carriers that do participate.
                </div>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
                    How do I delete my account?
                  </a>
                </h4>
              </div>
              <div id="collapseSeven" class="panel-collapse collapse">
                <div class="panel-body">
                  We're sorry that you want to leave.  Drop us an email at awaygames2017@gmail.com and we will delete your user account.
                </div>
              </div>
            </div>

          </div>

          <div class="row text-center">

            
          </div>
        </div>


        <h5>@include('partials/sidebar')</h5>
        
      </div>
    </div>
  </section>

</div>

@endsection
