
<!DOCTYPE html>


<html>
<head>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9Pyf9DzK853LRdgobgwCdMDbi5B-QUMY&libraries=places"></script>
<script>
            var autocomplete;
            
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
</head>

   <body onload="initialize()">


        <form action="" method="post">


            <label>Origin:</label> <input type="text" id="autocomplete" name="o" placeholder="Enter Origin location" required> <br><br>


            <label>Destination:</label> <input type="text" id="autocomplete1" name="d" placeholder="Enter Destination location" required> <br><br>


            <input type="submit" value="Calculate distance & time" name="submit"> <br><br>


        </form>


        <?php


            if(isset($_POST['submit'])){


            $origin = $_POST['o']; $destination = $_POST['d'];


            $api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$origin."&destinations=".$destination."&key=AIzaSyA9Pyf9DzK853LRdgobgwCdMDbi5B-QUMY");


            $data = json_decode($api);


        ?>



            <label><b>Distance: </b></label> <span><?php echo ((int)$data->rows[0]->elements[0]->distance->value / 1000).' Km'; ?></span> <br><br>


            <label><b>Travel Time: </b></label> <span><?php echo $data->rows[0]->elements[0]->duration->text; ?></span> 


        <?php } ?>


    </body>


</html>

