<!DOCTYPE html>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOaaBuRk00UU-EPHrQa24sSgoV72keiq8&libraries=places"></script>
<script>

            var autocomplete;
            var autocomplete1;
          
            
            function initialize() {
                
              autocomplete = new google.maps.places.Autocomplete(
                  /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
                  { types: ['geocode'] });
                  
              google.maps.event.addListener(autocomplete, 'place_changed', function() {
              });
              
              autocomplete = new google.maps.places.Autocomplete(
                  /** @type {HTMLInputElement} */(document.getElementById('autocomplete1')),
                  { types: ['geocode'] });
                  
              google.maps.event.addListener(autocomplete1, 'place_changed', function() {
              });
              
            }

</script>
<?php  
 $connect = mysqli_connect("localhost", "bnsznyem_abfa", "!@#123qweasdzxc", "bnsznyem_ice");  
 
 if(isset($_POST['check'])) {
 
     $addressFrom = $_POST['pick'];
    
     $addressTo = $_POST['dest'];
     
    $d1=str_replace(" ","+",$addressTo);
    
    $p1=str_replace(" ","+",$addressFrom);
    
    $url="https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=$p1&destinations=$d1&key=AIzaSyCe6_Sj3b-WqB2KwCtl-ra2syljLzpuM-8";
     
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $response_a = json_decode($response, true);
    $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
    $duration = $response_a['rows'][0]['elements'][0]['duration']['text'];
    list($distance,$u)=explode(' ',$dist,2);
    
    $distance;
     
}
 if(isset($_POST['estimate'])) {
 
     $addressFrom = $_POST['pick'];
    
     $addressTo = $_POST['dest'];
     
     $sql="INSERT INTO passenger(pickup,destination) VALUES('$addressFrom','$addressTo')";  
     
      $result=mysqli_query($connect, $sql);
   
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    if ($result != null) {
        
        
	 } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      
   
    }
     
}

 
 $query ="SELECT * FROM taxi_company ORDER BY estimate_quote DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>RGU</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>                      
           <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.min.js"></script>            
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />  
      </head>  
      <body>  
           <br /><br />  
<div class="container">
  <h2>Input Your Trip:</h2>
  <p></p>
  <form  method="POST" action="">
    <div class="form-group">
      <label for="usr">Pickup Address:</label>
      <input type="text" name="pick" class="form-control" id="autocomplete" oninput="initialize()">
    </div>
    <div class="form-group">
      <label for="pwd">Destination Address:</label>
      <input type="text"  name="dest" class="form-control" oninput="initialize()" id="autocomplete1">
    </div>
    <div class="form-group">
      
       <button type="submit" class="btn btn-primary" name="check">Check</button>
        <button type="submit" class="btn btn-primary" name="estimate">Estimate</button>
        <hr>
        <p>Distnace:<?php echo $dist;?></p> 
        <p>Duration:<?php echo $duration;?></p> 

    </div>
  </form>
</div>
           <hr>
           
           <div class="container">  
                <h3 align="center">Best Services Near You</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <th data-column-id="name" data-type="">Company</th>  
                                    <th data-column-id="estimate_quote">Fare</th>  
                                    <th data-column-id="phone">Book Now</th>  
                               </tr>  
                          </thead>  
                          <tbody>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  {  
                            $p=$row["distance_charge"];
                            $c=$dist;
                            $total=$p*$c;
                               echo '  
                               <tr>  
                                    <td>'.$row["name"].'</td>  
                                    <td>'?><?php echo $total."$";?> <?php '</td>  
                                    <td><a href="tel:'.$row["phone"].'">'.$row["phone"].'</a></td>  
                               </tr>  
                               ';  
                          }  
                          ?>  
                          </tbody>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $("#employee_data").bootgrid();  
 </script>  