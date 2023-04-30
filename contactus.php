<?php
 include_once("config/config.php");  
 if(isset($_POST['submit'])){
	$query .= "INSERT INTO `contact_use` (`first_name`, `last_name`, `email_id`, `subject`, `comments`, `mobile`, `status`) VALUES ('".$_POST['first_name']."',";
        $query .= " '".$_POST['last_name']."', '".$_POST['email_id']."', '".$_POST['subject']."', '".$_POST['comments']."', '".$_POST['mobile']."', '0')";
	if(mysql_query($query)){
		$param['to']=$_POST['email_id'];
		$param['subject']=$_POST['subject'];
		$param['message']=' Thanks for your intersts. Shortly we will response<br /> This is auto generated message. ';
		sendMail($param);
		$_SESSION['message']='<span class="succuess">Record inserted successfully</span>';
	}else{
		$_SESSION['message']='<span class="fail">Record Not inserted</span>';
	}
	header("location:contactus.php");
	exit;
}
	$first_name = '';
	$last_name = '';
	$email = '';
	$mobile = '';
	if(isLoggedIn()){
		$query ="select * from  tab_user where id='".$_SESSION['loggedIn']."'";
		$result = mysql_query($query);
		if(mysql_num_rows($result)){
			$row = mysql_fetch_assoc($result);
				$first_name = $row['first_name'];
				$last_name = $row['last_name'];
				$email = $row['email_id'];
				$mobile = $row['mobile']; 
		}
		
	}

 include_once("common/header.php"); 
 include_once("common/left_navi.php");

?>
<script type="text/javascript">	
  $(document).ready(function(){
    $("#contact_form").validate();
  });
</script>
<div id="right_navi">
	<br />
	<form action="" name="contact_form" id="contact_form"  method="post">
	
	<table border="0"  class="displaycontent" width="400">
	<caption><?php echo $_SESSION['message'];$_SESSION['message']=''; ?></caption>
	<tr>
		<th colspan="2">Contact Us</th>
	<tr>
	<tr>
		<td class="col">First Name:</td>
		<td><input type="text" name="first_name" value="<?php echo $first_name;?>" class="required" /></td>
	</tr>
	<tr>
		<td class="col">Last Name :</td>
		<td><input type="text" name="last_name" value="<?php echo $last_name;?>" class="required" /></td>
	</tr>
	<tr>
		<td class="col">Email-id:</td>
		<td><input type="text" name="email_id" value="<?php echo $email;?>" class="email required"/></td>
	</tr>
	<tr>
		<td class="col">Subject:</td>
		<td><input type="text" name="subject" value="" class="required" /></td>
	</tr>
	<tr>
		<td class="col">Comments</td>
		<td><textarea cols="25" name="comments" rows="4" class="required"></textarea></td>
	</tr>
	<tr>
		<td class="col">Mobile</td>
		<td><input type="text" name="mobile" onkeypress="return numbers(event);" value="<?php echo $mobile;?>" class="required" /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td >
			<input type="submit" name="submit" value="Submit" />
		     	<input type="reset"  value="Reset" />
			
		</td>
	</tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	</table>
	</form>

</div>
</div>
<?php include_once("common/footer.php");?>
