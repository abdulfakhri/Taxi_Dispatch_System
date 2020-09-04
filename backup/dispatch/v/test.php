<html>
<body>
<?php
$p="111 Centre Street, New York, NY, USA";
$d="120 Broadway, New York, NY, USA";
$d1=str_replace(" ","+",$d);
$p1=str_replace(" ","+",$p);

$url="https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=$p1&destinations=$d1&key=AIzaSyA9Pyf9DzK853LRdgobgwCdMDbi5B-QUMY";

//$url="https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=Washington,DC&destinations=$d&key=AIzaSyA9Pyf9DzK853LRdgobgwCdMDbi5B-QUMY";

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
   
    $time = $response_a['rows'][0]['elements'][0]['duration']['text'];
    list($v,$u)=explode(' ',$dist,2);
    echo $dist;
    echo  "<br>";
    echo $v;
    echo  "<br>";
    echo $u;
    echo  "<br>";
    echo "And";
    echo  "<br>";
    echo "Totl:"+2*$v;
    
    echo  "<br>";
    echo $time;
    echo  "<br>";
    

?>
</body>

</html>