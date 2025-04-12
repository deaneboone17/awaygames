<div class="bs-component">
                  <ul>
                    @foreach($tripDepart as $flight)

                 <div class="bs-component">
                 <a href="flights/{{ $flight->id }}">
                  <table class="table table-borderless table-responsive">
                    
                    <tbody>

                       
                      <!--Looping throught the Teams collection.  Using the slice method of Collection class to access specific elements.-->                        
                      <tr>

                      <td><img width="50px" height="50px" class="image" src="https://s3.amazonaws.com/awaygames/{{ $depart->carrier}}_sq.svg"></td>
                        <td>{{ date('g:i a', strtotime($flight->departureTime)) }}-{{ date('g:i a', strtotime($flight->arrivalTime)) }}
                        <br/>
                        {{ $flight->carrier }} {{ $flight->flightNumber }}

                        </td>
                        <td>{{ $flight->originAirport }}<i class="fa fa-long-arrow-right" aria-hidden="true"></i>{{ $flight->destinationAirport }}
                        </td>
                        <td>Non-Stop
                        <br/>
                        </td>
                        <td></td>
                                           
                        
                        <td>{{ "$".substr($flight->saleTotal,3) }}</td>
                                                      
                      </tr>
                      
                                            
                    </tbody>
                  </table>
                  </div>

                    @endforeach
                  </ul>
                </div>