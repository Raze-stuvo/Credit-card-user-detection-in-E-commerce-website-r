<?php
 include_once("config/config.php"); 
 include_once("common/header.php"); 
 include_once("common/left_navi.php");
 if(isset($_GET['id'])){
	$query = "select * from  tab_adds where id='".$_GET['id']."'";
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
 }
?>
<script type="text/javascript">	
  $(document).ready(function(){
    $("#adds_form").validate();
  });
</script>
<div id="right_navi">
	<br />
	<div id="full_view ">
		<h3><?php echo $row['title'];?></h3> 
		<br />
		<p><?php echo $row['description'];?></p>
		<p>Price Rs.<?php echo $row['start_amt'];?></p>
		<div class="clearfix"></div>
		<img src="upload/<?php echo $row['id'];?>.jpeg" >
<div class="clearfix"></div>
		<a href="cart.php?id=<?php echo $row['id'];?>" style="padding:5px;background:green;color:#FFF;float:right;margin-right:5px;">Add to Cart</a>
		<a href="bid_history.php?id=<?php echo $row['id'];?>" style="padding:5px;background:green;color:#FFF;float:right;margin-right:5px;">Add to WishList</a>
	</div>
	
	

</div>
</div>
<?php include_once("common/footer.php");?>
