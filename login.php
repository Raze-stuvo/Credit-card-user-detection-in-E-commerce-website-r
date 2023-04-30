<?php
 include_once("config/config.php");  
 if(isset($_POST['login'])){
	 $query ="select * from  tab_user where email_id='".$_POST['email_id']."'  and	password ='".$_POST['password']."'";
	$result = mysql_query($query);
	if(mysql_num_rows($result)){
		$row = mysql_fetch_assoc($result);
		if($row['status']=='0'){
			$_SESSION['loggedIn'] = $row['id'];
			$_SESSION['user_email'] = $row['email_id'];
			$_SESSION['logged_user'] = $row['first_name'].''.$row['last_name'];
			if($row['id']==1){
				$_SESSION['login_type'] = 'A';
			}else{			
				$_SESSION['login_type'] = 'U';
			}
			header('Location:index.php');
			exit;
		}
		else{
			$_SESSION['message']='<span class="fail">Your account Block by admin. contact Admin</span>';

		}
	}
	else{
                   if(isset($_SESSION['views']))
        $_SESSION['views']=$_SESSION['views']+1;
        else 
        $_SESSION['views']=1;
        $_SESSION['message']= "Views=". $_SESSION['views'];
        if($_SESSION['views']>=3)
        {
     
         
           $query1="update tab_user set status=1 where email_id='".$_POST['email_id']."'";
                mysql_query($query1) or die(mysql_error());
                 $_SESSION['message']='<span class="fail">card blocked</span>';
            // session_destroy();
        }
             
              
	}
	header("location:login.php");
	exit;
 }



 include_once("common/header.php"); 
 include_once("common/left_navi.php");

?>
<script type="text/javascript">	
  $(document).ready(function(){
    $("#login_form").validate();
  });
</script>
<div id="right_navi">
	<form action="" name="login_form" id="login_form"  method="post">
	<br />
	<table border="0"  class="displaycontent" >
	<caption><?php echo $_SESSION['message'];$_SESSION['message']=''; ?></caption>
	<tr>
		<th colspan="2">Login</th>
	<tr>
	<tr>
		<td class="col">Email:</td>
		<td><input type="text" name="email_id" value="" class="required email"/></td>
	</tr>
	<tr>
		<td  class="col">Password:</td>
		<td><input type="password" name="password" value="" class="required"/></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td >
			<input type="submit" name="login" value="Login" />
		     	<input type="Reset"  value="Reset" />
			
		</td>
	</tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr>
		<td><a href="register.php">Create New Account</a></td>
		
	</tr>
	</table>
	</form>

</div>
</div>
<?php include_once("common/footer.php")?>
