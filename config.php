<?php
	session_start();
	mysql_connect('localhost','root','') or die("connection not establized");
	mysql_select_db('shop') or die("No database selected");
	$configVars = array();
	error_reporting(0);
	$configVars['my_email'] = 'testmailalert20@gmail.com';
	$configVars['user_name'] = 'testmailalert20@gmail.com';
	$configVars['password'] = 'qwghdvduxumxjidk';


//print_r($_SESSION);exit;
	$keyword ='';
	if(!isset($_SESSION['cat_id']) || $_SESSION['cat_id']!='')
		{$_SESSION['cat_id'] = '';}
	if(!isset($_SESSION['sub_id']) || $_SESSION['sub_id']='')
		{$_SESSION['sub_id']='';}
	if(!isset($_SESSION['message']))
		{$_SESSION['message']='';}
	if(!isset($_SESSION['login_type']))
		{$_SESSION['login_type']='';}
 

	function isLoggedIn(){
		if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']!=''){
			return true;
		}
		else{
			return false;
		}
	}
	function isUserLoggedIn(){
		if(isLoggedIn()){
			return  true;
		}
		else{
			$_SESSION['message'] ='<span class="fail">Please Login Again To Continue</span>';
			header("Location:login.php");
			exit;
		}
	}
	function isAdminLoggedIn(){
		if(isLoggedIn()){
			if(isset($_SESSION['login_type']) && $_SESSION['login_type']=='A'){
				return true;
			}
			else{
				header("Location:unauthorised.php");
				exit;
			}
		}
		else{
			$_SESSION['message'] ='Please Login Again';
			header("Location:login.php");
			exit;
		}
	}
	function sendMail($param){
		  $message = '
			<html>
			  <body bgcolor="#DCEEFC">
			    <center>
				'.$param['message'].'
				Thanks
  			    </center>
			  </body>
			</html>';
	   sendOrderMail($message);
	}

	function sendblockMail($msg){
		global $configVars;
		include_once('phpmailer/class.smtp.php');
		include_once('phpmailer/class.pop3.php');
		include_once('email.class.inc.php');
		$html .= 'Dear ,<br />';
		$html .= $msg;
		$email = new Email();
		$email->set_from($configVars['my_email']);
		$email->set_from_name('Order History');		
		$email->set_subject('Your Credit card Blocked Temporarily');
		$email->set_message('For wrong transactions Your Credit card has been Blocked Temporarily!! </br> Please contact your bank administrator for re activation!!');		
		$email->add_to($_SESSION['user_email1'],$_SESSION['logged_user']);
		$sent_flag = $email->send();

		session_destroy();
	header('Location:index.php');
	exit;

	}


	function sendOrderMail($msg){
		global $configVars;
		include_once('phpmailer/class.smtp.php');
		include_once('phpmailer/class.pop3.php');
		include_once('email.class.inc.php');
		$html .= 'Dear '.$_SESSION['logged_user'].',<br />';
		$html .= $msg;
		$email = new Email();
		$email->set_from($configVars['my_email']);
		$email->set_from_name('Order History');		
		$email->set_subject('Confirmation Mail');
		$email->set_message(html_entity_decode($html));
		$email->add_to($configVars['my_email'],'shop now');
		$email->add_to($_SESSION['user_email'],$_SESSION['logged_user']);
		$sent_flag = $email->send();
	}
	function sms($check_id)
	{
		//SELECT b.phone FROM tab_orders a,tab_user b where a.user_id=b.id
	$query ="SELECT b.phone FROM tab_orders a,tab_user b where a.user_id=b.id";
		$result = mysql_query($query) or die(mysql_error());
	
		while($row=mysql_fetch_assoc($result)){
			$url='http://gateway.vinuxnetwork.com/pushsms.php?username=demo&api_password=51c20z0vm0ea0y5bv&sender=test&to=8056700297&message=hi&priority=4'; 

file($url);

		}
	}


	function setOrderEncrypted($check_id){
		$query ="SELECT * FROM `tab_orders` where check_id=".$check_id;
		$result = mysql_query($query) or die(mysql_error());
		$html = '<table border="1" cellspacing="0" cellpadding="5"> ';
		$html .= '<tr><th>S.no</th><th>Title</th><th>Description</th><th>Quanity</th><th>Price</th>';
		$i = 1;
		$total = 0;
		while($row=mysql_fetch_assoc($result)){
			$html .= '<tr><td>'.$i++.'</td>';
			$html .= '<td>'.$row['title'].'</td>';
			$html .= '<td>'.$row['description'].'</td>';
			$html .= '<td>'.$row['quanity'].'</td>';	
			$html .= '<td>'.$row['price'].'</td></tr>';
			$total += $row['price'];
		}
		$html .= '</table>';
		$html .= '<h2>Total: '.$total.'</h2>';	 	 
		$html = $html;
		$html .= "<br /><br /><br /><br />Copy and Paste view.php to view order";
           
		sendOrderMail($html);
                header('location:cart.php');
	}
	function setOrderEncrypted1($check_id){
		$query ="SELECT * FROM `tab_orders` where check_id=".$check_id;
		$result = mysql_query($query) or die(mysql_error());
		$html = '<table border="1" cellspacing="0" cellpadding="5"> ';
		$html .= '<tr><th>S.no</th><th>Title</th><th>Description</th><th>Quanity</th><th>Price</th>';
		$i = 1;
		$total = 0;
		while($row=mysql_fetch_assoc($result)){
			$html .= '<tr><td>'.$i++.'</td>';
			$html .= '<td>'.$row['title'].'</td>';
			$html .= '<td>'.$row['description'].'</td>';
			$html .= '<td>'.$row['quanity'].'</td>';	
			$html .= '<td>'.$row['price'].'</td></tr>';
			$total += $row['price'];
		}
		$html .= '</table>';
		$html .= '<h2>Total: '.$total.'</h2>';	 	 
		$html = base64_encode($html);
		$html .= "<br /><br /><br /><br />Copy and Paste view.php to view order";
           
		sendOrderMail($html);
	}
function setOrderEncrypted2($check_id){
		
		$html .= "Your card has been blocked For thw wrong Transaction!! </br>";
		$html .= "Please Contact admin!!";
		$html = $html;
		

		sendOrderMail($html);
                session_start();

	session_destroy();
	header('Location:index.php');
	exit;
               
	}
?>
