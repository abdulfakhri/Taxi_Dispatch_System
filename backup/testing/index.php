<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
<th>category name</th>
</tr>
<?php
mysql_connect("localhost","jorrog3_dispatch","!@#123qweasdzxc");
mysql_select_db("jorrog3_dispatch");
$res=mysql_query("SELECT c.* , p.* FROM tbl_categories c,tbl_products p WHERE c.cat_id=p.cat_id");
while($row=mysql_fetch_array($res))
{
	?>
    <tr>
    <td><p><?php echo $row['product_id']; ?></p></td>
    <td><p><?php echo $row['product_name']; ?></p></td>
    <td><p><?php echo $row['cat_name']; ?></p></td>
    </tr>
    <?php
}
?>
</table>
</body>
</html>