<div class="bs-component">
                  <table class="table table-borderless table-responsive">
                    
                       
                      <!--Looping throught the Teams collection.  Using the slice method of Collection class to access specific elements.-->                        
                      <tr >
                        <td><i class="fa fa-bed fa-3x" aria-hidden="true"></i></td>
                        <td>{{ $hotel->hotelName }}</td>
                        <td>{{ $hotel->hotelAddress.",  ".$hotel->hotelCity.", ".$hotel->hotelState." ".$hotel->hotelZip}}</td>
                        <td>{{ $hotel->hotelPhone }}</td>
                        
                        <td><a hover class="text-info" target="_blank" href="{{ $hotel->hotelUrl }}">Yelp Reviews</a></td>
                        
                                                      
                      </tr>
                                                                  
                    </tbody>
                  </table>
                  </div>