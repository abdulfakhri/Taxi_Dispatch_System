
 <script type="text/javascript">
    function ChangeColor(tableRow, highLight)
    {
    if (highLight)
    {
      tableRow.style.backgroundColor = '#ffbf00';
    }
    else
    {
      tableRow.style.backgroundColor = '';
    }
  }

  function DoNav(theUrl)
  {
  document.location.href = theUrl;
  }
  </script>
  
  

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <ul class="nav nav-tabs">
     <li class="active" style="color:green"><a data-toggle="tab" href="#home">Active Jobs</a></li>
     
     <li><a data-toggle="tab" href="#menu1">Reservatons</a></li>
     <li><a data-toggle="tab" href="#closedjob">Closed Jobs</a></li>
     <li><a data-toggle="tab" href="#calllog">Call logs</a></li>
    
  </ul>

<div class="tab-content">
      
<div id="home" class="tab-pane fade in active">
   
     <input type="text-full" name="asearch" id="asearch"  placeholder="Search Active Jobs..." class="" />
     <div id="activejoblist"></div>
         
</div>
<div id="savedjobs" class="tab-pane fade">
   
     <input type="text-full" name="savedsearch" id="savedsearch"  placeholder="Search Saved Jobs..." class="" />
     <div id=""></div>
         
</div>    
<div id="menu1" class="tab-pane fade">
     <input type="text-full" name="re_search" id="re_search" placeholder="Search Reservation ..." class="input" />
     <div id="reservation"></div>        
</div>
    
<div id="calllog" class="tab-pane fade">
        
     
              
          <input type="text-full" name="search_text" id="search_text" placeholder="Search Call Logs..." class="input" />
        
         <div class="" id="callerId"></div>
</div>

<div id="closedjob" class="tab-pane fade">
    
     <input type="text-full" name="closed_search" id="closed_search" placeholder="Search Closed Jobs..." class="input" />
    
            <div id="closedjobs"></div>        
           
    
      
</div>    
<?php include('../v/jobstableRows.php');?>
</div> 

<script>
$(document).ready(function(){

            load_data();
      load_activejobs();
     load_reservation();
      load_closedjobs();
      //load_savedjobs();
     
    setInterval(function(){
        load_activejobs();
         load_closedjobs();
	fetch_activeJobs();
	fetch_reservation();
	load_reservation();
	    load_data();
	    fetch_callerId();
	   fetch_closedJob();
	    load_savedjobs();
	},1000);
    
	
	

	



 function load_data(query){
  $.ajax({
   url:"/dispatch/m/calllogsAPI/fetchCallLogs.php",
   method:"POST",
   async: "false",
   data:{query:query},
   success:function(data)
   {
    $('#callerId').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
 
 
 function load_activejobs(acquery){
  $.ajax({
   url:"/dispatch/m/jobsAPI/activejoblist_api.php",
   method:"POST",
   async: "false",
   data:{acquery:acquery},
   success:function(Adata)
   {
    $('#activejoblist').html(Adata);
   }
  });
 }
 $('#asearch').keyup(function(){
  var searchA = $(this).val();
  if(searchA != '')
  {
   load_activejobs(searchA);
  }
  else
  {
   load_activejobs();
  }
 });
 
 
 
  function load_reservation(queryReserv){
  $.ajax({
   url:"/dispatch/m/jobsAPI/reservationjobslist_api.php",
   method:"POST",
   data:{queryReserv:queryReserv},
   success:function(dataR)
   {
    $('#reservation').html(dataR);
   }
  });
 }
 $('#re_search').keyup(function(){
  var searchR = $(this).val();
  if(searchR != '')
  {
   load_reservation(searchR);
  }
  else
  {
   load_reservation();
  }
 });
  
  /*
   function load_savedjobs(querySavedJobs){
  $.ajax({
   url:"/home/aidifxin/cloud/dispatch/m/jobsAPI/saveJobsAPI.php",
   method:"POST",
   data:{querySJ:querySJ},
   success:function(dataSJ)
   {
    $('#savedjoblist').html(dataSJ);
   }
  });
 }
 $('#savedsearch').keyup(function(){
  var searchSJ = $(this).val();
  if(searchSJ != '')
  {
   load_savedjobs(searchSJ);
  }
  else
  {
   load_savedjobs();
  }
 });
 */
 
  function load_closedjobs(queryClosed){
  $.ajax({
   url:"/dispatch/m/jobsAPI/closedjoblist_api.php",
   method:"POST",
   data:{queryClosed:queryClosed},
   success:function(dataC)
   {
    $('#closedjobs').html(dataC);
   }
  });
 }
 $('#closed_search').keyup(function(){
  var searchRC = $(this).val();
  if(searchRC!= '')
  {
   load_closedjobs(searchRC);
  }
  else
  {
   load_closedjobs();
  }
 });
 
 
});
</script>  
   
    
    
    
    
    
    
      

		   
 