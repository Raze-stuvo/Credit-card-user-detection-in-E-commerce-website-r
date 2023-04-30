<?php
 include_once("config/config.php"); 
 isAdminLoggedIn();

if(isset($_POST['product_id']) && count($_FILES)>0){
	$upload = 'upload1';
	$image = false;
	    if ((($_FILES[$upload]["type"] == "image/gif") || ($_FILES[$upload]["type"] == "image/jpeg") || 
          ($_FILES[$upload]["type"] == "image/jpg") || 	($_FILES[$upload]["type"] == "image/png")) && ($_FILES[$upload]["size"] < 2000000)) {
			if ($_FILES[$upload]["error"] > 0){
				 $error= $_FILES[$upload]["error"];
		    	}
		 	else{
				if(move_uploaded_file($_FILES[$upload]["tmp_name"], 'upload/'.$_POST['product_id'].'.jpeg')){
					$image =  $_POST['product_id'].'.jpeg';
				}	 
				else{
					$error = 'Some error occurred. Please Try again';
				}
		      		
		    	}
		  }
		  else { 
			$error = "Invalid file format";
		  }
	if($image){
		$query ="update tab_adds set upload1='".$image."' where id='".$_POST['product_id'] ."'";	
		$_SESSION['msg'] = 'Uploaded successfully';
	}
	else{
		$_SESSION['msg'] = $error;
	}
	header("location:upload_image.php?id=".$_POST['product_id']);
	exit;
} 

include_once("common/header.php"); 
include_once("common/left_navi.php");
if(isset($_GET['id']) && $_GET['id']!=''){
	$query = "Select * from tab_adds where id=".$_GET['id'];
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	
}
?>
<div id="right_navi">
	<br />
	<?php 
		if(isset($_SESSION['msg']) && $_SESSION['msg']!=''){
			echo '<h4 style="color:red">'.$_SESSION['msg'].'</h4><br /><br />';
			$_SESSION['msg']= '';
		}
		?>
	<form action="" id="adds_form"  method="post" enctype="multipart/form-data">
		<h2>Product Info:<span style="color:green"><?php echo $row['title']; ?></span></h2>		
		
		<h2>Upload Image:</h2>
		(You can upload .jpeg , .jpg, .png , .gif format upto 2 MB only)<br /><br /><br />
			<input type="file" name="upload1" id="upload1" ><br />
			<input type="hidden" value="<?php echo $_GET['id']; ?>" name="product_id" />
			<input type="submit" name="submit" id="submit" >
		
	</form>
</div>


</div>
</div>
<?php include_once("common/footer.php");?>
