<div class="bs-component">
                  <ul>
                    @foreach($tripReturn as $return)

                      <div class="bs-component">
                 <a href="returns/{{ $return->id }}">
                  <table class="table table-borderless table-responsive">
                    
                    <tbody>

                       
                      <!--Looping throught the Teams collection.  Using the slice method of Collection class to access specific elements.-->                        
                      <tr>

                      <td><img width="50px" height="50px" class="image" src="https://s3.amazonaws.com/awaygames/{{ $depart->carrier}}_sq.svg"></td>
                        <td>{{ date('g:i a', strtotime($return->departureTime)) }}-{{ date('g:i a', strtotime($return->arrivalTime)) }}
                        <br/>
                        {{ $return->carrier }} {{ $return->flightNumber }}

                        </td>
                        <td>{{ $return->originAirport }}<i class="fa fa-long-arrow-right" aria-hidden="true"></i>{{ $return->destinationAirport }}
                        </td>
                        <td>Non-Stop
                        <br/>
                        </td>
                        <td></td>
                                           
                        
                        <td>{{ "$".substr($return->saleTotal,3) }}</td>
                                                      
                      </tr>
                      
                                            
                    </tbody>
                  </table>
                  </div>

                    @endforeach
                  </ul>
                </div>