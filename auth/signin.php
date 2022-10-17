<?php
include '..\csvutil.php';
if(!isset($_SESSION['logged']))$_SESSION['logged']=false;
// if the user is alreay signed in, redirect them to the members_page.php page
if($_SESSION['logged'])echo'<script>windows.location.href="../members_page.php"</script>';
// use the following guidelines to create the function in auth.php
//instead of using "die", return a message that can be printed in the HTML page



if(count($_POST)>0){
	// 1. check if email and password have been submitted
	if(!isset($_POST['email'])){
		reload('No email');
	}else
	if(!isset($_POST['password'])){
		reload('No password');
	}else{
		$email = $_POST['email'];
		$password = $_POST["password"];
		signin($email,$password);


		

	}

	// 8. check if the password is correct
	// 9. store session information
	// 10. redirect the user to the members_page.php page
	
	/*
	echo 'check email+password';
	if(true){
		$_SESSION['logged']=true;
		
	}else $_SESSION['logged']=false;
	*/
}

// improve the form
?>
<h1>Sign in</h1>
<form id = 'form1' class = 'form1' method="POST">
	<input type="email" name="email" />
	<input type="password" name="password" />
	
	<input type="submit" value="submit" />
</form>
