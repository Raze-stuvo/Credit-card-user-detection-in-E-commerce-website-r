<?php
 include_once("config/config.php");  
 if(isset($_POST['register'])){
	$query = "INSERT INTO `tab_user` (`first_name`, `last_name`, `email_id`, `password`, `address`, `city`, `state`, `country`,`cardno`,`pinno`,`creditlimit`, `queone`, `ansone`, `quetwo`, `anstwo`, `quethree`, `ansthree`,`mobile`, `phone`, `status`)"; 		
	$query .= " VALUES ('".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['email_id']."', '".$_POST['password']."', '";
	$query .=  $_POST['address']."', '".$_POST['city']."', '".$_POST['state']."', '".$_POST['country']."','".$_POST['cardno']."','".$_POST['pinno']."',".$_POST['limit'].",'".$_POST['a']."','".$_POST['ans1']."','".$_POST['b']."','".$_POST['ans2']."','".$_POST['c']."','".$_POST['ans3']."','";
	$query .= $_POST['mobile']."', '".$_POST['phone']."', '0')";
//	echo $query;exit;
	if(mysql_query($query)){
		$_SESSION['message']='<span class="succuess">You are successfully Registered</span>';
	}
	else{
		$_SESSION['message']='<span class="fail">Some errors occurs</span>';
	}
	header("location:register.php");
	exit;
 }
 include_once("common/header.php"); 
 include_once("common/left_navi.php");

?>
<script type="text/javascript">	
  $(document).ready(function(){ 
    $("#register_form").validate();
  });
</script>
<div id="right_navi">
	<br />
	<form action="" name="register_form"  id="register_form"  method="post">
	
	<table border="0" cellspacing="0"  class="displaycontent"  width="500">
	<caption><?php echo $_SESSION['message'];$_SESSION['message']=''; ?></caption>
	<tr>
		<th colspan="2">Register</th>
	<tr>
	<tr>
		<td class="col">First Name:</td>
		<td><input type="text" name="first_name" class="required" value="" /></td>
	</tr>

	<tr>
		<td class="col">Last Name:</td>
		<td><input type="text" name="last_name" value="" class="required" /></td>
	</tr>
	<tr>
		<td class="col">Email:</td>
		<td><input type="text" name="email_id" value="" class="required email"  /></td>
	</tr>
	<tr>
		<td class="col">Password:</td>
		<td><input type="password" name="password" value="" class="required" /></td>
	</tr>
	<tr>
		<td class="col">Retype Password:</td>
		<td><input type="password" name="repassword" value="" class="required" /></td>
	</tr>
	<tr>
		<td class="col">Address:</td>
		<td><input type="text" name="address" value="" class="required"  /></td>
	</tr>
	<tr>
		<td class="col">City</td>
		<td><input type="text" name="city" value="" class="required" /></td>
	</tr>
	<tr>
		<td class="col"  >state :</td>
		<td><input type="text" class="required" name="state" value="" /></td>
	</tr>
	<tr>
		<td class="col"  >Country:</td>
		<td><input type="text" class="required" name="country" value="" /></td>
	</tr>
	<tr>
		<td class="col"  >Credit Card Number:</td>
		<td><input type="text" class="required" name="cardno" value="" /></td>
	</tr>
	<tr>
		<td class="col"  >PIN:</td>
		<td><input type="text" class="required" name="pinno" value="" /></td>
	</tr>
	<tr>
		<td class="col"  >Credit Limit:</td>
		<td><input type="text" class="required" name="limit" value="" /></td>
	</tr>
	<tr>
	<td class="col">Security Question 1:</td>
<td><select name="a">
<option value="Enter the pet name"> Enter the pet name</option>
</select></td>
<tr>
		<td class="col"  >Ans1:</td>
		<td><input type="text" class="required" name="ans1" value="" /></td>
	</tr>
	<tr>
	<td class="col">Security Question 2:</td>
<td><select name="b">
<option value="Enter first phone name"> Enter first phone name</option>
</select></td>
<tr>
		<td class="col"  >Ans2:</td>
		<td><input type="text" class="required" name="ans2" value="" /></td>
	</tr>
	<tr>
	<td class="col">Security Question 3:</td>
<td><select name="c">
<option value="Enter the teacher name"> Enter the teacher name</option>
</select></td>
<tr>
		<td class="col"  >Ans3:</td>
		<td><input type="text" class="required" name="ans3" value="" /></td>
	</tr>
	<tr>
		<td class="col"  >Mobile:</td>
		<td><input type="text" class="required" onkeypress="return numbers(event);" name="mobile" value="" /></td>
	</tr>
	<tr>
		<td class="col">Phone:</td>
		<td><input type="text" class="" onkeypress="return numbers(event);" name="phone" value="" /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td >
			<input type="submit" name="register" value="Register" />
		     	<input type="Reset"  value="Reset" />
		</td>
	</tr>
	
	</table>
	</form>

</div>
</div>
<?php include_once("common/footer.php");?>
