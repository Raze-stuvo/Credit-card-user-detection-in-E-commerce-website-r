<?php
 include_once("config/config.php");  
 if(isset($_POST['fogotpass'])){
	$query ="select * from  tab_user where email_id='".$_POST['email_id']."'  and status='0'";
	$result = mysql_query($query);
	if(mysql_num_rows($result)){
		$row = mysql_fetch_assoc($result);
		if($row['status']=='0'){
			$param['to']=$row['email_id'];
			$param['subject']=$row['Forgot Password'];
			$param['message']='Your password Send successfully';
			sendMail($param);
			$_SESSION['message']='<span class="succuess">Your password sent to Email id</span>';
			header('Location:forgotpass.php');
			exit;
		}
		else{
			$_SESSION['message']='<span class="fail">Your account Block by admin. contact Admin</span>';
		}
	}
	else{
		$_SESSION['message']='<span class="fail">Email id does not exist</span>';
	}
	header("location:forgotpass.php");
	exit;
 }


 
 include_once("common/header.php"); 
 include_once("common/left_navi.php");

?>
<script type="text/javascript">	
  $(document).ready(function(){
    $("#forgotpass_form").validate();
  });
</script>
<div id="right_navi">
	<form action="" name="forgotpass_form" id="forgotpass_form"  method="post">
	<br />
	<table border="0"  class="displaycontent" >
	<caption><?php echo $_SESSION['message'];$_SESSION['message']=''; ?></caption>
	<tr>
		<th colspan="2">Forgot Password</th>
	<tr>
	<tr>
		<td class="col">Email:</td>
		<td><input type="text" name="email_id" value=""  style="width:250px;" class="required email"/></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td >
			<input type="submit" name="fogotpass" value="Get My Password" />
		     	<input type="Reset"  value="Reset" />
			
		</td>
	</tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr>
		<td><a href="register.php">Create New Account</a></td>
		<td style="text-align:right;"><a href="login.php">Login</a></td>
	</tr>
	</table>
	</form>

</div>
</div>
<?php include_once("common/footer.php")?>
