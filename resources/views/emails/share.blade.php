<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AwayGames</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:500,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #000000;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
     <div>

     <div class="page-header content">

     <h1>AwayGames</h1>
     <h2>Road Trips Made Easy</h2>
     <br/>
                  <h1 id="tables">{{ $sender->firstname." shared a trip to ".$ticket->ticketVenueCity." on ".date('m/d/Y', strtotime($depart->departureTime)) }}</h1>
                </div>
                <br/>
        <div class="bs-component">
            
            @if($connectCount>0)

            <h3>Departing Flight</h3>
            @include('partials.departConnectTable')
          
            @else

            <h3>Departing Flight</h3>
            @include('partials.departDirectTable')
          
            @endif

            @if($connectCountR>0)

            <h3>Returning Flight</h3>
            @include('partials.returnConnectTable')

            @else
            <h3>Returning Flight</h3>
            @include('partials.returnDirectTable')

            @endif

            <h3>Ticket Information</h3>
            @include('partials.tickets')

            <h3>Hotel Information</h3>
            @include('partials.hotels')

            <h3>Point of Interest</h3>
            @include('partials.pois')

                  
        </div>

            <br/>
            <br/>           
            <div class="btn-toolbar content">

          <a href="http://ec2-54-174-196-69.compute-1.amazonaws.com/" class="btn btn-lg btn-primary pull-right">Create Your Own Trip</a>
              </div>
            <br/>
            <br/>

    </div>
        
        
        
          
    </body>
</html>