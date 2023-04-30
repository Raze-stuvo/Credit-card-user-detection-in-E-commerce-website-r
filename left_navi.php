<div id="main_content" style="border:1px solid #0000000;">
<div id="left_navi">
<ul>
<?php if($_SESSION['login_type'] =='A'){ ?>
	<li><a href="category.php" >Category</a></li>
	<li><a href="subcategory.php" >Sub Category</a></li>
	<li><a href="adds.php" >Products</a></li>
	<li><a href="orders.php" >Orders</a></li>
	<li><a href="deliveried.php" >Delivered</a></li>
	<li><a href="users.php" >Users</a></li>
<?php }

	else{ 
	$query ="select * from sub_category where status=0 limit 0,30";
	$res = mysql_query($query);
	while($row = mysql_fetch_array($res)){
		echo '<li><a href="adds_list.php?sub_id='.$row['id'].'" >'.$row['name'].'</a></li>';
	}
?>


<?php } ?>
</ul>
</div>
