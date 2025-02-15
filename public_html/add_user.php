<?php
session_start();
$set = isset($_SESSION["username"]) && isset($_SESSION["status"]);
if(!$set){
	unset($_SESSION["username"]);
	unset($_SESSION["status"]);
	header("Location: index.html?error=timed_out");
	session_destroy();
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/add_MC.css">
	<title>Add MC</title>
</head>
<style>
  .dropdown-menu{
    width:350px !important;
    height: 40px !important;
    opacity: 0.5;
    font-family: "Poppins",sans-serif;
    font-weight: 100;
    font-size: 12px;
    line-height: 30px;
  }
</style>
<body>
	<div class="container">  
  <form id="contact" action="" method="post">
    <h3>Add a New User</h3>
    <fieldset>
      <input placeholder="Username" type="text" name="username"  tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Password" type="password" name="password"  tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
  <?php
  	if($_SERVER["REQUEST_METHOD"] == "POST"){
  		require_once('./utilities/db_connection.php');
    	$query = "INSERT INTO users(username,password,salt,status) VALUES ('".$_POST["username"]."','".$_POST["password"]."','123',1);";
    	$check = getResult($query);
    	if($check){
    		header("Location:add_user_conf.php");
    	}
    }
  ?>
</div>
</body>
</html>