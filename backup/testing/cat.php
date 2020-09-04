<html>
<head>
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
<th>category id</th>
<th>category name</th>
</tr>
<?php
mysql_connect("localhost","jorrog3_dispatch","!@#123qweasdzxc");
mysql_select_db("jorrog3_dispatch");
$res=mysql_query("SELECT * FROM tbl_categories");
while($row=mysql_fetch_array($res))
{
?>
    <tr>
    <td><p><?php echo $row['cat_id']; ?></p></td>
    <td><p><?php echo $row['cat_name']; ?></p></td>
    </tr>
    <?php
}
?>
</table>
</body>
</html>