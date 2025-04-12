<div class="bs-component">
                  <table class="table table-borderless table-responsive">
                                           
                      <!--Looping throught the Teams collection.  Using the slice method of Collection class to access specific elements.-->                        
                      <tr>
                        <td><i class="fa fa-ticket fa-4x" aria-hidden="true"></i></td>
                        <td>{{ $ticket->ticketTitle}}</td>
                        <td>{{ date('m/d/Y g:i a', strtotime($ticket->ticketTime)) }}</td>
                        <td>{{ $ticket->ticketCount." Tickets available"}}</td>
                        <td>{{ "Lowest Price: $".$ticket->ticketLow }}</td>
                        <td>{{ "Highest Price: $".$ticket->ticketHigh }}</td>
                        <td><a hover class="text-info" target="_blank" href="{{ $ticket->ticketUrl }}">Purchase Tickets @ SeatGeek</a></td>
                        
                                                      
                      </tr>
                                                                  
                    </tbody>
                  </table>
                  </div>