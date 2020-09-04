$addressFrom = $_POST['src_addr'];
    
    $query ="SELECT * FROM taxi_drivers WHERE taxi_comp='$api_key' dfree_busy='free'";
    
   $result = mysqli_query($conn, $query);
   if(mysqli_num_rows($result) > 0){?>
   while($res2 = mysqli_fetch_array($result)){
    $dc=$res2['dcurrent_location'];
    
    $d12=str_replace(" ","+",$addressTo);
    
    $p12=str_replace(" ","+",$dc);
    
     $dt=$res2['date_reg'];
     
 list($date,$time)=explode(" ",$dt,2);

$url="https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=$p12&destinations=$d12&key=AIzaSyA9Pyf9DzK853LRdgobgwCdMDbi5B-QUMY";
 
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
      }