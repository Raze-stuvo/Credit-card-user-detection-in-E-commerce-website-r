<?php
 include_once("config/config.php");
 isAdminLoggedIn();
 include_once("common/header.php");
 include_once("common/left_navi.php");
	
	$query = "SELECT * FROM `tab_checkout` where status=1";
	$result = mysql_query($query);
if(mysql_num_rows($result)>0){

?>
<div id="right_navi">
<br />
<table border="0" cellspacing="0" class="displaycontent" width="600">
<tr>
	<th>Sno.</th>
	<th>Date</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Address</th>
	<th>City</th>
	<th>State</th>
	<th>Country</th>
	<th>Mobile</th>
	<th>Phone</th>
	<th>Delivered</th>
</tr>
<?php 
$i=1;
while($row = mysql_fetch_assoc($result)){ 
?>

<tr>
	<td><?php echo $i++; ?></td>
	<td><a href="shipping.php?id=<?php echo $row['id'];?>"><?php echo $row['created_at']; ?></a></td>
	<td><?php echo $row['first_name']; ?></td>
	<td><?php echo $row['last_name']; ?></td>
	<td><?php echo $row['address']; ?></td>
	<td><?php echo $row['city']; ?></td>
	<td><?php echo $row['state']; ?></td>
	<td><?php echo $row['country']; ?></td>
	<td><?php echo $row['mobile']; ?></td>
	<td><?php echo $row['phone']; ?></td>
	<td><?php echo $row['delivered_at']; ?></td>
</tr>


<?php
}
?>
</table>
<?php } else{?>
<br /><br /><br /><br /><br /><h2 align="center">No Record Found</h2>
<?php } ?>
</div>
</div>
<?php include_once("common/footer.php");?>
