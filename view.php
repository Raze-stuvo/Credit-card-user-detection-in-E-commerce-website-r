<?php
 include_once("config/config.php");
 isUserLoggedIn();

$msg22 = '';
$que = '';
if(isset($_POST['encrypted']) && $_POST['encrypted']!=''){
	$msg22 =  base64_decode($_POST['encrypted']);
	$que = $_POST['encrypted'];

}


 include_once("common/header.php");
 include_once("common/left_navi.php");

?>
<div id="right_navi">
<br /> 
<?php echo  $msg22; ?>
<br /><br /><br /><br />
<form action="" method="post">
<textarea name="encrypted" id="encrypted" cols="70" rows="10"><?php echo $que; ?></textarea>
<div style="clear:both;"><br /></div>
<input type="submit" value="view order" name="submit" />
</form>
</div>
<?php include_once("common/footer.php");?>
