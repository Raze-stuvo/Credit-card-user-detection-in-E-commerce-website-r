<?php
 include_once("config/config.php"); 
 isAdminLoggedIn();

$query = "Select * from tab_adds where id=".$_GET['id'];
$result = mysql_query($query);
$row = mysql_fetch_assoc($result);

 if(isset($_POST['update'])){
	$img1= false;$img2=false;$img3=false;$img4=false;
	$upthis = '';
	$upquery = '';
	$add_id = $_POST['id'];
	if($_POST['temp1']=='remove') $upthis['upload1']=" ";
	if($_POST['temp2']=='remove') $upthis['upload2']=" ";
	if($_POST['temp3']=='remove') $upthis['upload3']=" ";
	if($_POST['temp4']=='remove') $upthis['upload4']=" ";
	
	$date = date("Y-m-d",strtotime($_POST['bid_end_date']));
	$query = "UPDATE `tab_adds` SET  `category` = '".$_POST['category']."', `sub_category` = '".$_POST['sub_category']."', `title` = '".$_POST['title']."',";
	$query .= " `description` = '".$_POST['discription']."',start_amt ='".$_POST['bid_start']."', `updated_at` = '".time()."',bid_end_date='".$date."' ".$upquery." WHERE `id` = '".$add_id."'";
        if(mysql_query($query)){
		$_SESSION['message']='<span class="succuess">Record Updated successfully.</span>';
	}else{
		$_SESSION['message']='<span class="fail">Record Not Updated</span>';
	}
	header("location:edit.php?edit=".$add_id); 
	exit;
}
 if(isset($_POST['addpost'])){
	$date = date("Y-m-d",strtotime($_POST['bid_end_date']));
	$query .= "INSERT INTO `tab_adds` (`added_by`, `category`, `sub_category`, `title`, `description`, `created_at`, `upload1`, `upload2`, `upload3`,";
	$query .= " `upload4`,start_amt,bid_end_date, `status`) VALUES ('".$_SESSION['loggedIn']."', '".$_POST['category']."', '".$_POST['sub_category']."', '";
	$query .= $_POST['title']."','".$_POST['discription']."', '".time()."', '', '', '', '','".$_POST['bid_start']."','".$date."', '0');";
      	if(mysql_query($query)){
		$add_id = mysql_insert_id();	
		$_SESSION['message']='<span class="succuess">Record inserted successfully.<br/> '.$msg.'</span>';
	}else{
		$_SESSION['message']='<span class="fail">Record Not inserted</span>';
	}
	header("location:adds.php");
	exit;
}

 include_once("common/header.php"); 
 include_once("common/left_navi.php");
if(isset($_GET['edit'])){
		$query = "SELECT * FROM `tab_adds` where id='".$_GET['edit']."'";
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
	}
	else{
		$row['id']='';
	 	$row['added_by']='';
	 	$row['category']='';
	 	$row['sub_category']='';
		$row['title']='';
	 	$row['description']='';
	 	$row['created_at']='';
	 	$row['upload1']='';
		$row['upload2']='';
		$row['upload3']='';
		$row['upload4']='';
	}
if(isset($_POST['category'])){
	$row['category']=$_POST['category'];
}
if(isset($_POST['sub_category'])){
	$row['sub_category']=$_POST['sub_category'];
}
	$query = "select * from category ";
	$result = mysql_query($query) or die(mysql_error());
	while($row1 = mysql_fetch_assoc($result)){
		$category[] = $row1;
	}

	if($row['category']!=''){ $where = " and category_id='".$row['category']."'";}
	else{ $where = " and category_id='".$category[0]['id']."'";}

	$subcategory = array();
	$query = "select * from sub_category where status=0 ".$where;
	$result = mysql_query($query);
	while($row2 = mysql_fetch_assoc($result)){
		$subcategory[] = $row2;
	}
	?>
<link href="jsDatePick_ltr.min.css" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>
<script type="text/javascript">	
  $(document).ready(function(){
    $("#adds_form").validate();
  });
 function remove(id){
	document.getElementById('img'+id).style.display ="none";
	document.getElementById('rem'+id).style.display ="none";
	document.getElementById('temp'+id).value = 'remove';

}
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"bid_end_date",
			dateFormat:"%d-%M-%Y",
			selectedDate:{		
				day:<?php echo date("d"); ?>,		
				month:<?php echo date("m"); ?>,
				year:<?php echo date("Y"); ?>
			},
			limitToToday:false,
			dateFormat:"%d-%m-%Y",
		});
	};
</script>

</script>
<div id="right_navi">
	<br />
	<a href="upload_image.php?id=<?php echo $_GET['edit']; ?>" class="replay"  style="margin:10px;" >Upload Image</a>
	<img src="upload/<?php echo $_GET['edit']; ?>.jpeg" />
	<div style="clear:both;"><br /></div>
	<form action="" id="adds_form"  method="post" enctype="multipart/form-data">
	
	<table border="0"  class="displaycontent" width="500" >
	<caption><?php echo $_SESSION['message'];$_SESSION['message']=''; ?></caption>
	<tr>
		<th colspan="2">Add/ Edit Product Here</th>
	<tr>
	<tr>
		<td class="col">Category</td>
		<td>
		<select  name="category" onchange="document.getElementById('adds_form').submit();">
		<?php 
		foreach($category as $cat){
			if($cat['id'] == $row['category']){$selected= 'selected="selected"';}
			else $selected = '';
		echo '<option '.$selected.' value="'.$cat['id'].'">'.$cat['category'].'</option>';
		}
		?>		
		</select>
		</td>
	</tr>
		<tr>

		<td class="col">Sub Category</td>

		<td>
		<select name="sub_category" onchange="document.getElementById('adds_form').submit();">
		<?php 
		foreach($subcategory as $subcat){
			if($subcat['id'] == $row['sub_category']){$selected= 'selected="selected"';}
			else $selected = '';
		echo '<option '.$selected.' value="'.$subcat['id'].'">'.$subcat['name'].'</option>';
		}
		?>		
		</select>
		</td>

	</tr>
	<tr>
		<td class="col">Title :</td>
		<td><input class="required" style="width:270px;" type="text" name="title" value="<?php echo $row['title'];?>" /></td>
	</tr>
	<tr>
		<td class="col">Discription:</td>
		<td><textarea cols="35" class="required" name="discription" rows="4"><?php echo $row['description'];?></textarea></td>
	</tr>	
	<tr>
		<td class="col">Bid Start:</td>
		<td>
			Rs.<input type="text" name="bid_start" id="bid_start" onkeypress="return numbers(event);" class="required" value="<?php echo $row['start_amt']; ?>" size="10"/>
		</td>
	</tr>
                     <?php
			$end_date = time();
			$date = date('d-m-Y',$end_date);
			?>
			<input type="hidden" name="bid_end_date" class="required" id="bid_end_date"  value="<?php echo $date; ?>" size="10"/>
	<tr>
		<td colspan="2">
			<?php if($row['upload1']!='' && $row['upload1']!= '1'){ ?>
			<img src="upload/<?php echo $row['id'].'/'.$row['upload1'];?>" id="img1" height="100" width="100" >
			<input type="hidden" value="" name="temp1" id="temp1" />
			<a href="" onclick="remove('1');return false;" id="rem1">Remove</a>
			<?php } 
			if($row['upload2']!='' && $row['upload2']!= '1'){ ?>
			<img src="upload/<?php echo $row['id'].'/'.$row['upload2'];?>" id="img2" height="100" width="100">
			<input type="hidden" value="" name="temp2" id="temp2" />
			<a href="" onclick="remove('2');return false;" id="rem2">Remove</a>
			<?php }
			 if($row['upload3']!='' && $row['upload3']!= '1'){ ?>
			<img src="upload/<?php echo $row['id'].'/'.$row['upload3'];?>" id="img3" height="100" width="100">
			<input type="hidden" value="" name="temp3" id="temp3" />
			<a href="" onclick="remove('3');return false;" id="rem3">Remove</a>
			<?php }
			 if($row['upload4']!='' && $row['upload4']!= '1'){ ?>
			<img src="upload/<?php echo $row['id'].'/'.$row['upload4'];?>" id="img4" height="100" width="100">
			<input type="hidden" value="" name="temp4" id="temp4" />
			<a href="" onclick="remove('4');return false;" id="rem4">Remove</a>
			<?php } ?>
		</td>
	</tr>	
	<tr>
		<td>&nbsp;</td>
		<td>
			<?php if($row['id']!=''){?>
			<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
			<input type="submit" name="update" value="Update" />
			<?php }else  {?>		
			<input type="submit" name="addpost" value="Submit" />
			<?php } ?>
		     	<input type="reset"  value="Reset" />
			
		</td>
	</tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	</table>
	</form>

</div>
</div>
<?php include_once("common/footer.php");?>
