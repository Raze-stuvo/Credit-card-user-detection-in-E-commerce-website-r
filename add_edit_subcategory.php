<?php
 include_once("config/config.php");
 isAdminLoggedIn();
  if(!isset($_SESSION['message'])){
	$_SESSION['message']='';
  }
  if(isset($_POST['addcategory'])){

	$query = "INSERT INTO `sub_category` (`category_id`, `name`, `status`) VALUES ('".$_POST['category']."', '".$_POST['sub_category']."', '0')";
	if(mysql_query($query)){
		$_SESSION['message']='<span class="succuess">Record inserted successfully</span>';
	}else{
		$_SESSION['message']='<span class="fail">Record Not inserted</span>';
	}
	header("location:add_edit_subcategory.php");
	exit;
   }
   else if(isset($_POST['update_category'])){
	$query = "UPDATE `sub_category` set `category_id`='".$_POST['category']."', `name`='".$_POST['sub_category']."' where id='".$_POST['sub_id']."'";
	if(mysql_query($query)){
		$_SESSION['message']='<span class="succuess">Record updated successfully</span>';
	}else{
		$_SESSION['message']='<span class="fail">Record Not Updated</span>';
	}
	header("location:add_edit_subcategory.php");
	exit; 
   }
 include_once("common/header.php");
 include_once("common/left_navi.php");
?>

<?php 
	$query = "select * from category ";
	$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_assoc($result)){
		$category[] = $row;
	}
	$row = array("id"=>"","category_id"=>"","name"=>"","status"=>"");
	if(isset($_GET['sub_id'])){
		$query = "select * from sub_category where id='".$_GET['sub_id']."'";
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
	}
		$id = $row['id'];
?>
<div id="right_navi">
<script type="text/javascript">	
  $(document).ready(function(){
    $("#subcategoryform").validate();
  });
</script>
	<br /><br />
	<div align="center"><?php echo $_SESSION['message'];$_SESSION['message']='';?></div>
	<form action="" method="post" id="subcategoryform">
	<table border="0" cellspacing="0" class="displaycontent">
	<tr>
		<td>Category</td>
		<td>
		<select name="category" id="category">
		<option value=''>Select</option>
		<?php 
		foreach($category as $cat){
			if($cat['id'] == $row['category_id']){$selected= 'selected="selected"';}
			else $selected = '';
		echo '<option '.$selected.' value="'.$cat['id'].'">'.$cat['category'].'</option>';
		}
		?>		
		</select>
		</td>
	</tr>
	<tr>	
		<td>Sub Category</td>
		<td><input type="text" name="sub_category" class="required"  value="<?php echo $row['name'] ?>" id="sub_category"/></td>
	</tr>
	<tr>	
		
		<td colspan="2" style="text-align:center">
			<?php 
			if($id != ''){ ?>
			<input type="hidden" name="sub_id"  value="<?php echo $id;?>" />
			<input type="submit" name="update_category"  value="update" />
			<?php }else{
			?>
			<input type="submit" name="addcategory"  value="Add" />
			<?php } ?>
			<input type="button" onclick="window.location.href='subcategory.php'"   value="Cancel" />
		</td>
	</tr>
	</table>
	</form>
</div>
</div>
<?php include_once("common/footer.php");?>

