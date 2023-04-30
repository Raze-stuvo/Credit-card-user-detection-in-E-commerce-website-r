<?php
 include_once("config/config.php");
 isAdminLoggedIn();
 include_once("common/header.php");
 include_once("common/left_navi.php");

	$query = "select * from category ";
	$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_assoc($result)){
		$category[] = $row;
	}
	if(isset($_POST['category'])){
		$category_id = $_POST['category'];
	}
	else{ 
		$category_id = $category[0]['id'];
	}
 	$subcategory = array();
	$query = "select * from sub_category where category_id='".$category_id."'";
	$result = mysql_query($query);
	while($row = mysql_fetch_assoc($result)){
		$subcategory[] = $row;
	}
 
$i=1;?>
<div id="right_navi">
		<br /><br />
	<a href="add_edit_subcategory.php" class="btn_sm">Add</a>
	<div align="center">
	<form action="" method="post" id="subcategoryform">
		Category :
		<select name="category" onchange="document.getElementById('subcategoryform').submit();">
		<?php 
		foreach($category as $cat){
			if($cat['id'] == $category_id){$selected= 'selected="selected"';}
			else $selected = '';
		echo '<option '.$selected.' value="'.$cat['id'].'">'.$cat['category'].'</option>';
		}
		?>		
		</select>
	</form>
	</div>
	<table border="0" cellspacing="0" class="displaycontent" width="400">
	<tr>
		<th>S no</th>
		<th>Subcategory</th>
		<th>Status</th>
		<th>Edit</th>


	</tr>
	<?php
  	  if(count($subcategory)>0){
	  foreach($subcategory as $subcat){?>
	<tr>
		
		<td><?php echo $i++; ?></td>
		<td><?php echo $subcat['name']; ?></td>
		<td><?php if($subcat['status']==0) echo 'Active';else 'Deactive'; ?></td>
		<td><a href='add_edit_subcategory.php?sub_id=<?php echo $subcat['id'];?>'>Edit</a></td>
	</tr>
	<?php }} ?>
	
	</table>
</div>
</div>
<?php include_once("common/footer.php")?>
