<?php
 include_once("config/config.php");  
 isUserLoggedIn();
 if(isset($_POST['submit']))
	 {
	
	$query = "select * from tab_user where id='".$_SESSION['loggedIn']."' and email_id='".$_POST['first_name']."'  and ansone='".$_POST['ans1']."'   and anstwo='".$_POST['ans2']."'  and ansthree='".$_POST['ans3']."'";
	$result = mysql_query($query);
	
	if($row=mysql_fetch_assoc($result))
		 {
	$query = "INSERT INTO `tab_checkout` (`user_id`, `first_name`, `last_name`, `address`, `city`, `state`, `country`, `mobile`, `phone`,";
	$query .= " `status`) VALUES ('".$_SESSION['loggedIn']."', '". $row['first_name']."', '".$row['last_name']."', '".$row['address']."',";
	$query .= "'".$row['city']."', '".$row['state']."', '".$row['country']."', '".$row['mobile']."', '".$row['phone']."', '0')";
	if(mysql_query($query))
		$check_id = mysql_insert_id();
		$query = "INSERT INTO `tab_orders` (`check_id`, `user_id`, `category`, `sub_category`, `title`, `description`, `created_at`, `quanity`, `price`, `status`) select '".$check_id."', '".$_SESSION['loggedIn']."', p.category, p.sub_category, p.title, p.description, '".time()."',cart.quanity,p.start_amt,'0' from  `tab_cart` cart left join  `tab_adds` p on cart.pro_id = p.id where cart.user_id=".$_SESSION['loggedIn'];
	mysql_query($query) or die(mysql_error());
		$query = "delete  from `tab_cart`  where user_id=".$_SESSION['loggedIn'];
	
		mysql_query($query) or die(mysql_error());
		$_SESSION['message']='<span class="succuess">You are successfully. You will get products Shortly</span>';
		setOrderEncrypted($check_id);

	}
         
	else 
		{
		$url='http://gateway.vinuxnetwork.com/pushsms.php?username=demo&api_password=51c20z0vm0ea0y5bv&sender=test&to=8056700297&message=hi&priority=4'; 

file($url);
 $query1="update tab_user set status='1' where id='".$_SESSION['loggedIn']."'";


	mysql_query($query1) or die(mysql_error());

      if(mysql_query($query))
		$check_id = mysql_insert_id();
		$query = "INSERT INTO `tab_orders` (`check_id`, `user_id`, `category`, `sub_category`, `title`, `description`, `created_at`, `quanity`, `price`, `status`) select '".$check_id."', '".$_SESSION['loggedIn']."', p.category, p.sub_category, p.title, p.description, '".time()."',cart.quanity,p.start_amt,'0' from  `tab_cart` cart left join  `tab_adds` p on cart.pro_id = p.id where cart.user_id=".$_SESSION['loggedIn'];
	mysql_query($query) or die(mysql_error());
		$query = "delete  from `tab_cart`  where user_id=".$_SESSION['loggedIn'];

		mysql_query($query) or die(mysql_error());
		  
		$_SESSION['message']='<span class="succuess">You are successfully. You will get products Shortly</span>';
		
             
                setOrderEncrypted2($check_id);
			
		
	}
         }
 
	 

include_once("common/header.php"); 
include_once("common/left_navi.php");

?>
<script type="text/javascript">	
  $(document).ready(function(){
    $("#checkout_form").validate();
	$('#shownew').hide()
  });
</script>

<div id="right_navi">

<h1>ADDRESS</h1>
   <?php
	$query = "select * from tab_user where id=".$_SESSION['loggedIn'];
	$result = mysql_query($query);
	$row=mysql_fetch_assoc($result);

	
	//echo  $row['first_name'].''.$row['last_name'].',<br />';
      //  echo  $row['address'].',<br />';
      //  echo  $row['city'].',<br />';
      //  echo   $row['state'].',<br />';
       // echo $row['country'].',<br />';
       // echo  $row['mobile'].',<br />';
    	//echo $row['phone'] .',<br />';
      //  echo $row['email_id'].',<br />';
	
	?>
	

	<br />
	<form action="" name="checkout_form"  id="checkout_form"  method="post">
	
	<table border="0" cellspacing="0"  class="displaycontent"  width="500" >
	<tr>
		<th colspan="2">Security Questions</th>
	<tr>
	<tr>
		<td class="col">Email:</td>
		<td><input type="text" name="first_name" class="required" value="" /></td>
	</tr>

	<tr>
		<td class="col">Security Question 1:</td>
		<td><select name="q1" >
		<option value="Enter the pet name">Enter the pet name</option>
		</select></td>
	</tr>
<tr>
		<td class="col">Ans:</td>
		<td><input type="text" name="ans1" class="required" value="" /></td>
	</tr>
	<tr>
		<td class="col">Security Question 2:</td>
		<td><select name="q1" >
		<option value="Enter the pet name">Enter the first Pone Number</option>
		</select></td>
	</tr>
<tr>
		<td class="col">Ans:</td>
		<td><input type="text" name="ans2" class="required" value="" /></td>
	</tr>
	<tr>
		<td class="col">Security Question 3:</td>
		<td><select name="q1" >
		<option value="Enter the pet name">Enter the first teacher name</option>
		</select></td>
	</tr>
<tr>
		<td class="col">Ans:</td>
		<td><input type="text" name="ans3" class="required" value="" /></td>
	</tr>
	
		<td>&nbsp;</td>
		<td >
			<input type="submit" name="submit" value="Continue to Proceed" />
		     	<input type="Reset"  value="Reset" />
		</td>
	</tr>

	</table>
	</form>

</div>
</div>
<?php 
include_once("common/footer.php");

?>
