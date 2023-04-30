<?php
 include_once("config/config.php"); 
 isUserLoggedIn();


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
	background:#438100;
	color:#FFF;
}
table tr td{
	text-align:center;
	padding:5px;
}
</style>
<div id="right_navi">
<br /> 
<h1>Wish List</h1>
<?php

 if(isset($_GET['id'])){
	$query = "select * from tab_bid_history where add_id='".$_GET['id']."' and user_id='".$_SESSION['loggedIn']."'";
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	if(!$row){
	$query = "REPLACE INTO `tab_bid_history` (`add_id`, `user_id`, `bid_amt`,added_at) VALUES ";
	$query .= "('".$_GET['id']."', '".$_SESSION['loggedIn']."', '','".time()."')";
	mysql_query($query);	
	}
 }

 if(isset($_GET['add'])){
	$query = "select * from `tab_cart`  where  `pro_id`='".$_GET['add']."' and user_id='".$_SESSION['loggedIn']."'";
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	if($row){
		$a = $row['quanity']+1;
		$query = "Update tab_cart set quanity= '".$a."' where id=".$row['id'];
	}
	else{
	$query = "INSERT INTO  `tab_cart` (  `pro_id`, `user_id`,quanity, `added_at`) VALUES ('".$_GET['add']."','".$_SESSION['loggedIn']."', '1','".time()."'); ";
	}
	mysql_query($query) or die(mysql_error());
	$query = "Delete from `tab_bid_history`  where add_id='".$_GET['add']."' and user_id='".$_SESSION['loggedIn']."'";
	mysql_query($query) or die(mysql_error());		
	header("Location:bid_history.php");
	exit;
 }
 if(isset($_GET['del']) && is_numeric($_GET['del'])){
	$query = "Delete from `tab_bid_history`  where add_id='".$_GET['del']."' and user_id='".$_SESSION['loggedIn']."'";
	mysql_query($query) or die(mysql_error());		
	header("Location:bid_history.php");
	exit;
 }
?>
<?php
$query ="SELECT  his.add_id,his.added_at,his.add_id as product_id,p.*, cat.category  as dis_category,sub.name as dis_subname  FROM `tab_bid_history` his left join tab_adds p on his.add_id = p.id left join  `sub_category` sub  on sub.id = p.sub_category left join `category` cat on cat.id= p.category  where his.user_id='".$_SESSION['loggedIn']."'  order by his.added_at asc";
$result = mysql_query($query);
$num = mysql_num_rows($result);

if($num >0){ ?>
	<div class="clearfix"></div>
	<table border="0" width="90%" cellspacing="0" >
	<tr>
		<th>S.no</th>
		<th>Product Name</th>
		<th>Category</th>
		<th>SubCategory</th>
		<th>Price</th>
		<th>Added At</th>
		<th>Add to cart</th>
		<th>Delete</th>
	</tr>
	<?php
	$i = 1;

	while($row=mysql_fetch_assoc($result)){ 
		$final = $row;
		$bgcolor = '';
		if($i%2 ==0 ) $bgcolor ="style='background:#EBEEF3;'";

	?>
		<tr <?php echo $bgcolor; ?>>
			<td><?php echo $i; $i++; ?></td>			
			<td><a href="viewdetails.php?id=<?php echo $row['product_id']; ?>"><?php echo $row['title'];?></td>
			<td><?php echo $row['dis_category'];?></td>
			<td><?php echo $row['dis_subname'];?></td>
			<td>Rs.<?php echo $row['start_amt'];?></td> 	 	
			<td><?php echo date("d-M-y H:i:s",$row['added_at']);?></td>
			<td><a href="?add=<?php echo $row['add_id'];?>">Add to cart</a></td>
			<td><a href="?del=<?php echo $row['add_id'];?>">Delete</a></td>
		</tr>	
	<?php } ?>

	</table>
<?php
$empty_bids = false;
}
else{
$empty_bids = true;
?>
<br />
<h2 style="">No Product Available</h2>

<?php
}


echo '<br /><h3 style="color:red;">'.$_SESSION['message'].'</h3>';$_SESSION['message'] = '';
?>

<?php include_once("common/footer.php");?>
