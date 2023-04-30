<?php
 include_once("config/config.php"); 
 $where ='';
       $_SESSION['sub_id'] ='';
	$_SESSION['cat_id']='';
 if(isset($_GET['cat_id'])){
	$_SESSION['cat_id'] = $_GET['cat_id'];
 }
 if(isset($_GET['sub_id'])){
	$_SESSION['sub_id'] = $_GET['sub_id'];
 }

 if(isset($_POST['sub_id']) || isset($_POST['sub_id'])){
	$_SESSION['sub_id'] ='';
	$_SESSION['cat_id']='';

 }

 if(isset($_POST['sub_id'])){
	$_SESSION['sub_id'] = $_POST['sub_id'];
 }
 if(isset($_POST['cat_id'])){
	$_SESSION['cat_id'] = $_POST['cat_id'];
 }
 

$criteria ='';
 if($_SESSION['cat_id']!=''){
	$where .= "  and category='".$_SESSION['cat_id']."' ";
	$criteria .='<b>Category :</b><br />';
 }
 if($_SESSION['sub_id']!=''){
	$where .= " and sub_category='".$_SESSION['sub_id']."'";
	$criteria .='<b>Sub Category :</b>'.$_SESSION['sub_id'].'<br />';
 }
 if(isset($_POST['keyword']) && ($_POST['keyword']!='')){
 $keyword = $_POST['keyword'];
 $where .=  " and  title like '%".$keyword."%'";
	$criteria .='<b>Keyword :</b>'.$keyword.'<br />';
 }
 else{
  $keyword ='';
 }
 include_once("common/header.php"); 
 include_once("common/left_navi.php"); 
 $query ="SELECT * FROM `tab_adds` where status=0 ".$where." order by created_at desc";
 $result = mysql_query($query);


?>
<div id="right_navi">
<div >
<?php if($criteria!='' && false){?>
<h3>Searching Criteria :</h3>
<p>
<?php  echo $criteria.'</p>';} ?> 
</div>
<?php
$num = mysql_num_rows($result);  
if($num >0){ 
echo '<span class="totalrec" >Total Records Found :'. $num .'</span>';
echo '<div class="clearfix"></div>';
	while($row=mysql_fetch_assoc($result)){
	?>
	<div class="add_list">
	<span class="posted_date"><?php echo date("d-M-Y h:i:s",$row['created_at']);?></span>
	<a href="viewdetails.php?id=<?php echo $row['id'];?>" class="add_title"><?php echo substr($row['title'],0,100);?></a>
	<p><?php echo substr($row['description'],0,200);?></p>
	<img src="upload/<?php echo $row['id'];?>.jpeg" />
 	<span style="">Amount:&nbsp;&nbsp; <b>Rs.<?php echo $row['start_amt'];?></b></span>
	<?php  if(isset($_SESSION['login_type']) && $_SESSION['login_type'] == 'A'){ ?>
	<a href="edit.php?edit=<?php echo $row['id']; ?>"  class="replay">Edit</a>
	<a href="upload_image.php?id=<?php echo $row['id']; ?>"  class="replay">Add/Change Image</a>
	<?php }?>
	<a href="cart.php?id=<?php echo $row['id']; ?>"  class="replay">Add to cart</a>
	<a href="bid_history.php?id=<?php echo $row['id']; ?>" class="replay" >Add to wishList<?php //echo $row['no_of_bids'];?></a>
	<div class="clearfix"></div>
	</div>
	<?php } 
}
else{?>
<br />
<h2 style="">No Product found. Pleas try some other criteria</h2>

<?php
}
?>
</div>

</div>
<?php include_once("common/footer.php");?>
