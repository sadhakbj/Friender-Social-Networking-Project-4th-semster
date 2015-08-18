<?php 
require_once("inc/incfiles/header.inc.php");
if(!$_SESSION) {
// do nothing
}
else{
echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/friender/home.php\">";


}
?>
<center>
<h2>
Something is wrong ! <p>
Please Check Your username and password again and try again  

<br> <br> <br> <hr> <br>
<form action="#" method="POST">
<input type="text" name="user_login" placeholder="Username"><br>
<input type="password" name="password_login" placeholder="Password"><br>
<input type="submit" name="login" value="login">

<br>
<hr>

  <?php 
  
   // log in 
   if(isset($_POST["user_login"])&&isset($_POST["password_login"])) {

	
	  $user_login = $_POST["user_login"];
	  $password_login = $_POST["password_login"];
	  $md5password_login = md5($password_login);
		$sql = mysql_query("SELECT id FROM users WHERE username='$user_login' AND password='$md5password_login' LIMIT 1");
		
		// check the existence 
		$userCount = mysql_num_rows($sql); //counting number of rows
 		if ($userCount == 1) {
		
		while($row=mysql_fetch_assoc($sql)) {
				$id = $row["id"];		
				
		}
		$_SESSION["id"] = $id;
		$_SESSION["user_login"] = $user_login;
		$_SESSION["password_login"] = $password_login;
		header("location: home.php");
		exit();	
				}
				else{
				
				
				
				  		echo "<script type='text/javascript'>
				window.alert('Please Check username and Password')
				</script>";
				
				
				
				}

	 }
   
   
   
   ?>