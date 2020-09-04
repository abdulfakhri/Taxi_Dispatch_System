<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Using Inner Join</title>
<style>
table,td,th
{
	padding:10px;
	border-collapse:collapse;
	font-family:Georgia, "Times New Roman", Times, serif;
	border:solid #ddd 2px;
}
</style>
</head>
<body>
<table align="center" border="1" width="100%">
<tr>
<th>product id</th>
<th>product name</th>
<th>category id</th>
<th>category name</th>
</tr>
<?php
mysql_connect("localhost","root");
mysql_select_db("dbtuts");
$res=mysql_query("SELECT c.* , p.* FROM tbl_categories c INNER JOIN tbl_products p ON c.cat_id=p.cat_id");
while($row=mysql_fetch_array($res))
{
	?>
    <tr>
    <td><p><?php echo $row['product_id']; ?></p></td>
    <td><p><?php echo $row['product_name']; ?></p></td>
    <td><p><?php echo $row['cat_id']; ?></p></td>
    <td><p><?php echo $row['cat_name']; ?></p></td>
    </tr>
    <?php
}
?>
</table>
</body>
</html>