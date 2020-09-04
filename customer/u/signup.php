<?php include ('../c/c.php');?>
<?php include ('../c/m.php');?>
<?php include ('nav.php');?>
<?php include ($createdriverapi);?>


  <div class="container">
      
  
       <div class="title">Driver & Car Registeration</div>
    <hr>
        
                   
                    <form action=""  name="" method="POST">
                        
                      
                                    <label></label>
                                    <input type="text" placeholder="Name" name="name" required />
                                    <label> </label>
                                    <input name=phone" type="text" value="" placeholder=" Phone No" required />
                                   <label> </label>
                                   <input type="text" placeholder=" Email" name="email" required>
                                     <label></label>
                                     <input type="text" placeholder="Home Address" name="address" required><br>
                                      
                                     
                                    <label> </label>
                                   <input type="text" placeholder=" Username" name="username" required>
                                   
                                   <label> </label>
                                   <input type="text" placeholder="Password" name="password" required><br>
                                   
                                
                                     <?PHP echo $reg; ?>
                                     <hr>
                                     <button type="submit"  class="btn btn-default" name='createcustomer'>Register</button>
                                     <button type="reset" class="btn btn-default">Clear Form </button>
                            </div>
                            
                    </form> 
                    
        </div>
   </div>       
   
<?php include ($ft);?>
       