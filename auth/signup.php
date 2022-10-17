<?php
include("authutils.php");
include('..\csvutil.php');
// if the user is alreay signed in, redirect them to the members_page.php page
if(!isset($_SESSION['logged'])){
    $_SESSION['logged']= false;
}
if($_SESSION['logged']==true){
    redirect("You are already logged on", '..\members_page.php');
}
// use the following guidelines to create the function in auth.php
// instead of using "die", return a message that can be printed in the HTML page
if(count($_POST)>0){
	// check if the fields are empty
	if(!isset($_POST['email'])) reload('please enter your email');
	if(!isset($_POST['password'])) reload('please enter your email');
	$email = $_POST['email'];
	$password = $_POST["password"];
	signup($email,$password);
	// show them a success message and redirect them to the sign in page
	redirect('Successfully created user','./signin.php');
}

// improve the form
?>
<h1>Sign up</h1>
<form method="POST">
	<input type="email" name="email" />
	<input type="password" name="password" />
	
	<input type="submit" value="submit" />
</form>
