<?php  
 $connect = mysqli_connect("localhost", "bnsznyem_abfa", "!@#123qweasdzxc", "bnsznyem_ice");  

 $query ="SELECT * FROM tbl_student ORDER BY student_id DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>RGu</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>                      
           <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.min.js"></script>            
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />  
      </head>  
      <body>  
           <br /><br />  
           <div class="container">
  <h2>Input Your Trip</h2>
  <p></p>
  <form>
    <div class="form-group">
      <label for="usr">Pickup Address:</label>
      <input type="text" class="form-control" id="usr">
    </div>
    <div class="form-group">
      <label for="pwd">Destination Address:</label>
      <input type="password" class="form-control" id="pwd">
    </div>
    <div class="form-group">
      
       <button type="submit" class="btn btn-primary">Check</button>

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
                                    <th data-column-id="id" data-type="numeric">Company</th>  
                                    <th data-column-id="name">Fare</th>  
                                    <th data-column-id="phone">Book Now</th>  
                               </tr>  
                          </thead>  
                          <tbody>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["student_id"].'</td>  
                                    <td>'.$row["student_name"].'</td>  
                                    <td><a href="tel:'.$row["student_phone"].'">'.$row["student_phone"].'</a></td>  
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