<?php 
 $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
 include "$rootDir/c.php";
 ?>                      
<div class="table-responsive-clg">
           <table class="table table-bordered">
                         
		        <tr>                  
                   <td scope="row" style="width:5%" >L1</td>
                  <td style="color:white">
                       <?php
                      
                        //$d=date("Y-m-d h:i:s");
                        $sql1="SELECT * FROM urlSend WHERE taxi_comp='$api_key' AND Line='1'  AND(SE='Start' OR Duration='0') ORDER BY ID DESC LIMIT 1";
                        //SELECT * FROM table WHERE age >= '18' AND age <= '50' AND (lname = 'Doe' OR lname = 'Smith')
                        //AND(SE='End' OR Duration!='0')
                        $result1 = mysqli_query($conn,$sql1);
                        while($res1 = mysqli_fetch_array($result1)) {
                                    /*
                                    order BY Time ASC LIMIT 1
		                            $line=$res1['Line'];
		                            $calln=$res1['Phone'];
		                            */
		                            $calln=$res1['Phone'];
		 		                   //if($line==1){
		                                echo $calln;
		                          // }      
		                            /*  
		                            }else if($line==2){
		                                $l2= $calln;
		                            }else if($line==3){
		                                $l3= $calln;
		                            }
		                            */
                        }
                        ?>
                     </td>
                     
                   <td style="width:5%">L3</td>
                    <td style="color:white">
                       <?php
                       include('../c/connection.php');
                        //$d=date("Y-m-d h:i:s");
                        $sql1="SELECT * FROM urlSend WHERE taxi_comp='$api_key' AND Line='3' AND(SE='Start' OR Duration='0') ORDER BY ID DESC LIMIT 1";
                        //SELECT * FROM table WHERE age >= '18' AND age <= '50' AND (lname = 'Doe' OR lname = 'Smith')
                        //AND(SE='End' OR Duration!='0')
                        $result1 = mysqli_query($conn,$sql1);
                        while($res1 = mysqli_fetch_array($result1)) {
                                    /*
                                    order BY Time ASC LIMIT 1
		                            $line=$res1['Line'];
		                            $calln=$res1['Phone'];
		                            */
		                            $calln=$res1['Phone'];
		 		                   //if($line==1){
		                                echo $calln;
		                          // }      
		                            /*  
		                            }else if($line==2){
		                                $l2= $calln;
		                            }else if($line==3){
		                                $l3= $calln;
		                            }
		                            */
                        }
                        ?>
                     </td>
                     
                    
                     
                  </tr>
                <tr>
                     <td scope="row" style="width:5%">L2</td>
                     <td style="color:white">
                    <?php
                       include('../c/connection.php');
                        //$d=date("Y-m-d h:i:s");
                        $sql1="SELECT * FROM urlSend WHERE taxi_comp='$api_key' AND Line='2'  AND(SE='Start' OR Duration='0') ORDER BY ID DESC LIMIT 1";
                        //SELECT * FROM table WHERE age >= '18' AND age <= '50' AND (lname = 'Doe' OR lname = 'Smith')
                        //AND(SE='End' OR Duration!='0')
                        $result1 = mysqli_query($conn,$sql1);
                        while($res1 = mysqli_fetch_array($result1)) {
                                    /*
                                    order BY Time ASC LIMIT 1
		                            $line=$res1['Line'];
		                            $calln=$res1['Phone'];
		                            */
		                            $calln=$res1['Phone'];
		 		                   //if($line==1){
		                                echo $calln;
		                          // }      
		                            /*  
		                            }else if($line==2){
		                                $l2= $calln;
		                            }else if($line==3){
		                                $l3= $calln;
		                            }
		                            */
                        }
                        ?>
                     </td>
                     
                     <td style="width:5%">L4</td>
                     <td style="color:white">
                        <?php
                       include('../c/connection.php');
                        //$d=date("Y-m-d h:i:s");
                        $sql1="SELECT * FROM urlSend WHERE taxi_comp='$api_key' AND Line='4'  AND(SE='Start' OR Duration='0') ORDER BY ID DESC LIMIT 1";
                        //SELECT * FROM table WHERE age >= '18' AND age <= '50' AND (lname = 'Doe' OR lname = 'Smith')
                        //AND(SE='End' OR Duration!='0')
                        $result1 = mysqli_query($conn,$sql1);
                        while($res1 = mysqli_fetch_array($result1)) {
                                    /*
                                    order BY Time ASC LIMIT 1
		                            $line=$res1['Line'];
		                            $calln=$res1['Phone'];
		                            */
		                            $calln=$res1['Phone'];
		 		                   //if($line==1){
		                                echo $calln;
		                          // }      
		                            /*  
		                            }else if($line==2){
		                                $l2= $calln;
		                            }else if($line==3){
		                                $l3= $calln;
		                            }
		                            */
                        }
                        ?>
                     
                     </td>
                  </tr>
                  
              
          </table>
</div>
   
<?php 
/*
$output = '';
if(isset($_POST["query"])){
$api_key=$_SESSION['id'];
    //$api_key="14";
$Key=mysqli_real_escape_string($conn, $_POST["query"]);
$query ="SELECT * FROM urlSend WHERE taxi_comp='$api_key' AND Time LIKE '%".$Key."%' OR Line LIKE '%".$Key."%' OR Phone LIKE '%".$Key."%' OR Line LIKE '%".$Key."%' OR Duration LIKE '%".$Key."%' OR Name LIKE '%".$Key."%'";
}else{
 $query = "SELECT * FROM urlSend WHERE taxi_comp='$api_key' AND SE='Start' AND(RingNumber='0' OR Duration='0' AND Line='1') ORDER BY ID DESC,date_reg DESC LIMIT 4";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){
 $output .= '
              <h7>Call Logs</h7>
              <div class="form-group">
              <div class="input-group">
          <input type="text" name="search_text" id="search_text" placeholder="Search Call Log..." class="form-control" />
         </div>
        </div>
  <div class="table-responsive-clg text-nowrap">
           <table class="table">
             <tr>
              <th>Name</th>
              <th>Phone</th>
                 <th>Time And Date</th>
                 <th>Duration</th>
                 <th>Line</th>
                 <th>IO</th>
             </tr>
 ';
 while($res2 = mysqli_fetch_array($result)){
  $output .= '
   <tr> 
	<td>'.$res2['Name'].'</td>;
	<td>'.$res2['Phone'].'</td>;
    <td>'.$res2['Time'].'</td>;
    <td>'.$res2['Duration'].'</td>;
	<td>'.$res2['Line'].'</td>;
	<td>'.$res2['IO'].'</td>;
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}
?>