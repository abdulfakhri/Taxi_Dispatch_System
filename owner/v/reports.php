<?php 
include ('../c/api.php');
include ('../c/c.php');
include ($nav);
?>
<?php 
session_start(); 
?>
    <style> 
		table.scrolldown { 
			width: 100%; 
			
			/* border-collapse: collapse; */ 
			border-spacing: 0; 
			border: 2px solid black; 
			font-size:16px;
			 border-collapse: collapse;
		} 
		
		/* To display the block as level element */ 
		table.scrolldown tbody, table.scrolldown thead { 
			display: block; 
		} 
		
		thead tr th { 
			height: 3%; 
			line-height: 3%;  
		} 
		
		table.scrolldown tbody { 
			
			/* Set the height of table body */ 
			height: 8%; 
			
			/* Set vertical scroll */ 
			overflow-y: auto; 
			
			/* Hide the horizontal scroll */ 
			overflow-x: hidden; 
		} 
		
		tbody { 
			border-top: 2px solid black; 
		} 
		
		tbody td, thead th { 
			width : 5%; 
			border-right: 2px solid black; 
		} 
		td { 
			text-align:; 
		} 
	</style> 
   <div class="table-responsive">
    <table id="customer_data" class="scrolldown table-striped">
     <thead>
      <tr>
       <th>Date</th>  
       <th>Job#</th>
       <th>Pickup</th>
       <th>C/Pick Time</th>
       <th>D/Drop Time</th>
       <th>Drop Off</th>
       <th>Driver</th>
       <th>Driver Hach Lic</th>
       <th>Driver Lic Plate</th>
      </tr>
     </thead>
    </table>
    </div>
   
  
 
 

<script type="text/javascript" language="javascript" >
 $(document).ready(function(){

  $('#customer_data').DataTable({
   "processing" : true,
   "serverSide" : true,
   "ajax" : {
    url:"/home/aidifxin/cloud/dispatch/m/reportsAPI/fetchReports.php",
    type:"POST"
   },
   dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf', 'copy'
   ],
   //"lengthMenu": [ [10, 25, 50, 50,25,10, 25, 50,25] ]
    // "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });
  
 });
 
</script>

<?php include($ft);?>