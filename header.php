<?php ob_start();
?>
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='utf-8'>
<title>Credit Card Fraud Dectection</title>
<link rel="icon" href="/img/lightgreen_dayDown.GIF" />
	<link href="css/style.css" media="all" rel="stylesheet" type="text/css" >
	<script type="text/javascript" src="javascript/jquery-latest.js"></script>
	<script type="text/javascript" src="javascript/jquery.validate.js"></script>
	<script type="text/javascript" src="javascript/validate.js" ></script>


</head>
<body>
<div id="container">
	<div id="wrapper">
		<div id="header">
		<h2><a href="index.php"  style="color:#438100;font-weight:bold;background:url('images/shopping_cart.png') no-repeat;padding:10px 0px 0px 65px;">Credit Card <br>&nbsp;&nbsp;&nbsp;Fraud Detection</a></h2>
			<div class="formcontainer">
			<form action="adds_list.php" method="post">
			<select class="search_input  txt_btn" name="cat_id"  style="background:#FFFFFF;">
			<?php
				$query = "select * from category where status=0";
				$result = mysql_query($query) or die(mysql_error());
				while($row = mysql_fetch_assoc($result)){
					$category_list[$row['id']] = $row;
					if($row['id']== $_SESSION['cat_id']){$selected = 'selected="selected"';}else{$selected = '';}
					echo '<option '. $selected.' value="'.$row['id'].'">'.$row['category'].'</option>';
				}
			?>
			</select>
			<input type="text" name="keyword" class="search_input  txt_btn" value="<?php echo $keyword; ?>" />	
			<input type="submit" value="Submit"  class="search_input  sub_btn"/>
			</form>
			</div>
		<?php if(isLoggedIn()){?>
		<ul class="navigation">		
			<li><a href="index.php">Home</a></li>
			<li><a href="adds_list.php">Products</a></li>
			<li><a href="bid_history.php">Wish List</a></li>
			<li><a href="cart.php">My cart</a></li>
			<li><a href="myaccount.php">My Account</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		<?php }else{
 		?>
		<ul class="navigation">		
			<li><a href="index.php">Home</a></li>
			<li><a href="adds_list.php">Products</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="login.php">Login</a></li>
			<li><a href="contactus.php">Contact us</a></li>
		</ul>

		<?php } ?>
		
		
		<span style="float:right;margin:15px 30px 0 0;font-size:18px;display:block;width:300px;text-align:right;color:#438100;font-weight:bold;">
		Welcome <?php if($_SESSION['logged_user']!='')echo $_SESSION['logged_user'];else echo 'Guest';?>
		</span>
</div>
			
		
<?php
	$query ="SELECT c.id as cat_id, c.category, s.id AS subid, s.name FROM category c LEFT JOIN sub_category s ON c.id = s.category_id";
	$result = mysql_query($query);
	while($row=mysql_fetch_assoc($result)){
		$global_cat_id =$row['cat_id'];
		$global_category[] = $global_cat_id; 
		$global_data[$global_cat_id][] = $row; 
	}
?>
<nav id="topNav">
<ul>
<?php

foreach($global_data as $k=>$d){
?>

<li><a class="cat_heading" href="adds_list.php?cat_id=<?php echo $k; ?>" > <?php echo $global_data[$k][0]['category'];?></a>
<ul> 
	<?php foreach($global_data[$k] as $list){ ?>
    <li><a href="adds_list.php?sub_id=<?php echo $list['subid'];?>"><?php echo $list['name'];?></a></li>
<?php } ?>
</ul>
</li>

<?php } ?>
</ul>
</nav>



		<div id="content">
