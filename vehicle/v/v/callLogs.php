 
 


    
   <div id="callerId"></div>
         
<script>
$(document).ready(function(){
        load_data();
    setInterval(function(){
	    load_data();
	},5000);
 function load_data(query){
  $.ajax({
   url:"/dispatch/m/fetchCallLogs.php",
   method:"POST",
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

</script>  
    
    
    
    
    
    
    
      

		   
 