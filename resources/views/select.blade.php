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
	  
	  <aside class="col-md-3" id="page-sidebar">
          
          <div class="sidebar-widget">
            <div class="additional-header">
              
            </div>

            <ul class="nav">

            @if (Auth::check())
              <li>
                <a href="/select">Home</a>
              </li>

              @else
                <li>
                <a href="/">Home</a>
              </li>
              @endif


              <li>
                <a href="/about">About</a>
              </li>

              <li>
                <a href="/faq">FAQs</a>
              </li>

              <li>
                <a href="gallery.html">Contact Us</a>
              </li>

            </ul>
          </div>

          
        </aside>

        <div class="col-md-9 main-content">

          <div class="page-content">
            <div class="page-header">
                  <h1 id="tables">Select Your Team</h1>
                </div>

                <div class="bs-component">
                  <table class="table table-bordered table-responsive table-striped table-hover ">
                    <thead>
                      <tr >
                        <th>AFC East</th>
                        <th>AFC North</th>
                        <th>AFC South</th>
                        <th>AFC West</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="info">
                        <td><a href="#">Buffalo</a></td>
                        <td><a href="/schedules">Baltimore</a></td>
                        <td><a href="#">Houston</a></td>
                        <td><a href="#">Denver</a></td>
                      </tr>
                      <tr class="success">
                        <td><a href="#">Miami</a></td>
                        <td><a href="#">Cleveland</a></td>
                        <td><a href="#">Indianapolis</a></td>
                        <td><a href="#">Kansas City</a></td>
                      </tr>
                      <tr class="info">
                        <td><a href="#">New England</a></td>
                        <td><a href="#">Cincinatti</a></td>
                        <td><a href="#">Jacksonville</a></td>
                        <td><a href="#">Los Angeles</a></td>
                      </tr>
                      <tr class="success">
                        <td><a href="#">New York</a></td>
                        <td><a href="#">Pittsburgh</a></td>
                        <td><a href="#">Tennessee</a></td>
                        <td><a href="#">Oakland</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
				<div class="bs-component">
                  <table class="table table-bordered table-responsive table-striped table-hover ">
                    <thead>
                      <tr>
                        <th>NFC East</th>
                        <th>NFC North</th>
                        <th>NFC South</th>
                        <th>NFC West</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="info">
                        <td><a href="#">Dallas</a></td>
                        <td><a href="#">Detroit</a></td>
                        <td><a href="#">Atlanta</a></td>
                        <td><a href="#">Arizona</a></td>
                      </tr>
                      <tr class="success" >
                        <td><a href="#">New York</a></td>
                        <td><a href="#">Chicago</a></td>
                        <td><a href="#">Carolina</a></td>
                        <td><a href="#">Los Angeles</a></td>
                      </tr>
                      <tr class="info">
                        <td><a href="#">Philadelphia</a></td>
                        <td><a href="#">Green Bay</a></td>
                        <td><a href="#">New Orleans</a></td>
                        <td><a href="#">San Francisco</a></td>
                      </tr>
                      <tr class="success">
                        <td><a href="#">Washington</a></td>
                        <td><a href="#">Minnesota</a></td>
                        <td><a href="#">Tampa Bay</a></td>
                        <td><a href="#">Seattle</a></td>
                      </tr>
                    </tbody>
                  </table>
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
