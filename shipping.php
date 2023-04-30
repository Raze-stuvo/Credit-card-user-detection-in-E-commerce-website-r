<?php
 include_once("config/config.php"); 
 isUserLoggedIn();

 if(!isset($_GET['id']) && !is_numeric($_GET['id'])){
	header("Location:myaccount.php");
	exit;	
 }

 include_once("common/header.php"); 
 include_once("common/left_navi.php"); 
?>
<style>
table{
	border:1px solid #ccc;
}
table tr th{
	text-align:center;
	padding:5px;
	background:#0A95DC; 
	color:#FFF;
}
table tr td{
	text-align:center;
	padding:5px;
}
</style>
<div id="right_navi">
<br />
<h1>Product Details</h1>
<?php
$query ="SELECT * FROM `tab_orders` where check_id=".$_GET['id'];
$result = mysql_query($query);
$num = mysql_num_rows($result);

if($num >0){ ?>
	<a href="myaccount.php">Back</a>
	<div class="clearfix"></div>
	<table border="0" width="90%" cellspacing="0" >
	<tr>
		<th>S.no</th>
		<th>Product Name</th>
		<th>Price</th>
		<th>Quanity</th>
		<th>Total</th>
	</tr>
	<?php
	$i = 1;
	$tot = 0;
	while($row=mysql_fetch_assoc($result)){ 
		$final = $row;
		$bgcolor = '';
		if($i%2 ==0 ) $bgcolor ="style='background:#EBEEF3;'";
	?>


		<tr <?php echo $bgcolor; ?>>
			<td><?php echo $i; $i++; ?></td>			
			<td><?php echo $row['title'];?></td>
			<td>Rs.<?php echo $row['price'];?></td>
			<td><?php echo $row['quanity'];?></td>
			<td>Rs.<?php $price = $row['price']*$row['quanity'];$tot += $price;  echo $price;?></td>
		</tr>	
	<?php } ?>
	
	</table>
	<h2 style="font-size:18px;padding-top:5px;">Total Rs.<?php echo $tot; ?></h2>
<?php

$query ="SELECT * FROM  `tab_checkout` where id=".$_GET['id'];
$result = mysql_query($query);
$row=mysql_fetch_assoc($result);
echo '<br /><h1>Address</h1>';
echo $row['first_name'].''.$row['last_name'].',<br />';
echo  $row['address'].' '.$row['city'].',<br />';
echo $row['state'].',<br />';
echo $row['country'].',<br />';
echo $row['mobile'].',<br />';
echo $row['phone'].',<br />';
if($row['status']){
	echo '<h1>Delivered at '.$row['delivered_at'].'</h1>';
}
else{
	echo '<h1>Is in Shipping</h1>';
}
$empty_bids = false;
}
else{
$empty_bids = true;
?>
<br />
<h2 style="">Shipping Details not available</h2>

<?php
}


echo '<br /><h3 style="color:red;">'.$_SESSION['message'].'</h3>';$_SESSION['message'] = '';
?>

<?php include_once("common/footer.php");?>
