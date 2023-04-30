<?php
 include_once("config/config.php");
 isAdminLoggedIn();
if(isset($_POST['add_category'])){
		$query ="INSERT INTO `category` (`category`, `status`) VALUES ('".$_POST['category']."', '0')";
		if(mysql_query($query)){
		$_SESSION['message']='<span class="succuess">Record inserted successfully</span>';
		}else{
			$_SESSION['message']='<span class="fail">Record Not inserted</span>';
		}
		header("location:category.php");
		exit;
	}
 else if(isset($_POST['up_category'])){
	$query = "UPDATE `category` set `category`='".$_POST['up_category']."' where id='".$_POST['id']."'";
	if(mysql_query($query)){
		$_SESSION['message']='<span class="succuess">Record updated successfully</span>';
	}else{
		$_SESSION['message']='<span class="fail">Record Not Updated</span>';
	}
	header("location:category.php");
	exit;
   }
 include_once("common/header.php"); 
 include_once("common/left_navi.php");
 
	$query = "select * from category ";
	$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_assoc($result)){ 
		$category[] = $row;
	}
	if(isset($_GET['edit'])){
		$id = $_GET['edit'];
	}
	else{
		$id = '';
	}
	

$i=1;?>
<div id="right_navi">
<script type="text/javascript">	
  $(document).ready(function(){
    $("#subcategoryedit").validate();
   $("#categoryform").validate();
  });
</script>
		<br /><br />
	<div align="center">
	<?php echo $_SESSION['message']; $_SESSION['message']='';?>
	<form action="" method="post" id="categoryform">
		Category :
		<input type="text" value="" name="category" class="required"/><br />
		<input type="submit" value="Add" name="add_category" />

	</form>
	</div>
	<form action="" method="post" id="subcategoryedit">
	<table border="0" cellspacing="0" class="displaycontent" width="400">
	<tr>
		<th>S no</th>
		<th>category</td>
		<th>Status</th>
		<th>Edit</th>
	</tr>
	<?php
  	  if(count($category)>0){
	  foreach($category as $cat){
		if($id == $cat['id']){
	  ?>
	<tr>
		
		<td><?php echo $i++; ?></td>
		<td ><input type="text" value="<?php echo $cat['category'];?>" name="up_category" class="required" /></td>
		<td><input type="hidden" value="<?php echo $id; ?>"  name="id"/>
			<input type="submit" value="update" /></td>
		<td><input type="button" value="cancel" onclick="window.location.href='category.php';"/></td>
	</tr>
	<?php }else{	?>
	<tr>
		<td><?php echo $i++; ?></td>	
		<td><?php echo $cat['category']; ?></td>
		<td><?php if($cat['status']==0) echo 'Active';else 'Deactive'; ?></td>
		<td><a href='category.php?edit=<?php echo $cat['id'];?>'>Edit</a></td>
	</tr>
	<?php } }} ?>
	
	</table>
	</form>
</div>
</div>
<?php include_once("common/footer.php")?>
