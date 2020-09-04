>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

   <div class="jobs"></div>

  <!--<ul class="nav nav-tabs">
     <li class="active"><a data-toggle="tab"  href="#Busy">Jobs</a></li>
    <li> <a data-toggle="tab" href="#Available">Available</a></li>
    
  </ul>
    <div class="tab-content">
        
      <div id="Busy" class="tab-pane fade">
        
     </div>    
     
      <div id="Available" class="tab-pane fade">
          
          <div class="AvailableJobs"></div>
        
                
           
       </div>
     
      
    </div>-->
    
  <script>
 
$(document).ready(function(){
 fetchJobs(); //This function will load all data on web page when page load
 function fetchJobs(){ // This function will fetch data from table and display under <div id="result">
  var action = "Load";
  $.ajax({
   url : "/vehicle/m/readbusydriver_api.php", //Request send to "action.php page"
   method:"POST", //Using of Post method for send data
   data:{action:action}, //action variable data has been send to server
   success:function(data){
    $('#jobs').html(data); //It will display data under div tag with id result
   }
  });
 }
 
 function fetchJobsA(){ // This function will fetch data from table and display under <div id="result">
  var action = "Load";
  $.ajax({
   url : "/vehicle/m/readdriverjobs_api.php", //Request send to "action.php page"
   method:"POST", //Using of Post method for send data
   data:{action:action}, //action variable data has been send to server
   success:function(data){
    $('#AvailableJobs').html(data); //It will display data under div tag with id result
   }
  });
 }
 
 
  
});

</script>  
   
    


    
    
    
    
    
    
    
    
    
    
    
      

		   
 