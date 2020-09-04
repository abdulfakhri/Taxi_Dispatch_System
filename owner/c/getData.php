<script>
    $(document).ready(function(){
// code to get all records from table via select box
$("#employee").change(function() {
var id = $(this).find(":selected").val();
var dataString = 'empid='+ id;
$.ajax({
url: '/dispatch/m/getPhonelines.php',
dataType: "json",
data: dataString,
cache: false,
success: function(employeeData) {
if(employeeData) {
$("#heading").show();
$("#no_records").hide();
$("#customer_phone").text(employeeData.Phone);
$("#customer_name").text(employeeData.Name);
$("#customer_email").text(employeeData.Phone);
$("#records").show();
} else {
$("#heading").hide();
$("#records").hide();
$("#no_records").show();
}
}
});
})
});
</script>
