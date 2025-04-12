<div class="bs-component">
                  <table class="table table-borderless table-responsive">
                    <tbody>

                       
                      <!--Looping throught the Teams collection.  Using the slice method of Collection class to access specific elements.-->                        
                      <tr>
                      <td><img width="50px" height="50px" class="image" src="https://s3.amazonaws.com/awaygames/{{ $depart->carrier}}_sq.svg"></td>
                        <td>{{ date('g:i a', strtotime($return->departureTime)) }}-{{ date('g:i a', strtotime($return->conArrivalTime)) }}
                        <br/>
                        {{ $return->carrier }} {{ $return->flightNumber }}

                        </td>
                        <td>{{ $tripDurationC['duration'] }}
                        <br/>
                        {{ $return->originAirport }}<i class="fa fa-long-arrow-right" aria-hidden="true"></i>{{ $return->conDestinationAirport }}
                        </td>
                        <td>1 Stop
                        <br/>  
                        {{ $tripDurationC['layover']." in ".$return->conOriginAirport }}</td>
                                                                 
                        
                                                                             
                      </tr>

                                          
                                            
                    </tbody>
                  </table>
                  </div>