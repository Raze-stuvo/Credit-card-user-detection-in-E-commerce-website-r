<?php
 include_once("config/config.php");  
 isUserLoggedIn();
 if(isset($_POST['submit']))
	{
	$query = "select * from tab_user where id='".$_SESSION['loggedIn']."' and cardno='".$_POST['cardnumber']."' and pinno=".$_POST['pin']."";
//	echo $query;
	$result = mysql_query($query);	
	if($row=mysql_fetch_assoc($result))
	{
		//$query = "select * from tab_user where id='".$_SESSION['loggedIn']."' and cardno='".$_POST['cardnumber']."' and pinno=".$_POST['pin']." and (select avg(price) from tab_orders where user_id='".$_SESSION['loggedIn']."')>=".$_SESSION['totamt']."";
		//echo $query;
		//$result = mysql_query($query);
		//if($row=mysql_fetch_assoc($result))
		//{
			header("Location:checkout.php");
	//	}
	//	else
	//	{
	//		echo "<script>alert('Invalid Card or PIN Number');</script>";
	//	}
	}
	else 
	{
		echo "<script>alert('Invalid Card or PIN Number');</script>";
		$_SESSION['count']=$_SESSION['count']+1;
		$_SESSION['user_email1']=$row['email_id'];
		//sendblockMail('hai');

		if ($_SESSION['count']>=3)
		{
		$query1="update tab_user set status='1' where id='".$_SESSION['loggedIn']."'";
		mysql_query($query1) or die(mysql_error());

		  if(mysql_query($query))
			$check_id = mysql_insert_id();		
			$query = "delete  from `tab_cart` where user_id=".$_SESSION['loggedIn'];
			mysql_query($query) or die(mysql_error());
			setOrderEncrypted2($check_id);
			
		}
		
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

<h1>Payment</h1>
   <?php
	$query = "select * from tab_user where id=".$_SESSION['loggedIn'];
	$result = mysql_query($query);
	$row=mysql_fetch_assoc($result);
	
	?>
	

	<br />
	<form action="" name="checkout_form"  id="checkout_form"  method="post">
	
	<table border="0" cellspacing="0"  class="displaycontent"  width="500" >
	<tr>
		<th colspan="2">Payment  : Total Amount <?php echo $_SESSION["totamt"]; ?></th>
	<tr>
	<tr>
		<td class="col">Card Number:</td>
		<td><input type="text" name="cardnumber" class="required" value="" /></td>
	</tr>

	
<tr>
		<td class="col">PIN Number:</td>
		<td><input type="text" name="pin" class="required" value="" /></td>
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
