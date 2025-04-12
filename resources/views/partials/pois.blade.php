<div class="bs-component">
                  <table class="table table-borderless table-responsive">
                   
                    <tbody>

                       
                      <!--Looping throught the Teams collection.  Using the slice method of Collection class to access specific elements.-->                        
                      <tr>
                        <td><i class="fa fa-map-marker fa-4x" aria-hidden="true"></i></td>
                        <td>{{ $poi->poiName }}</td>
                        <td>{{ $poi->poiAddress.",  ".$poi->poiCity.", ".$poi->poiState." ".$poi->poiZip}}</td>
                        <td>{{ $poi->poiPhone }}</td>
                        <td><a hover class="text-info" target="_blank" href="{{ $poi->poiUrl }}">Yelp Reviews</a></td>
                        
                                                      
                      </tr>
                                                                  
                    </tbody>
                  </table>
                  </div>