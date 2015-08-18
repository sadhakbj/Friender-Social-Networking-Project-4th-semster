<?php 
require_once("inc/incfiles/header.inc.php");
if(!$_SESSION) {
// do nothing
}
else{
echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/friender/home.php\">";


}
?>

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
				
				header("Location: login_attempt.php?1000000000log_in_again_0005");
				exit();
				}

	 }
   
   
   
   ?>


				<table class="homepageTable">
					<tr>    
							<td width="60%" valign="top">
							<h2> Already a member ?  Log in Below</h2>
							 <div class="well" style="min-height: 200px; width:400px; margin-left: 40px; padding-top: 40px; margin-top: 30px; border-radius: 8px;">
							
							<form action="index.php" method="POST" name="form">
							<input type="text" name="user_login" size="25" id="user_login" placeholder="Username"> <br> 
							<input type="password" name="password_login" size="25" id="password_login" placeholder="Password"> <br>
							<br>&nbsp&nbsp&nbsp&nbsp&nbsp		&nbsp&nbsp&nbsp&nbsp&nbsp		&nbsp&nbsp&nbsp&nbsp&nbsp		
							<button  type="submit" class='btn btn-primary' name='submit'> <i class="icon-user icon-white"> </i> Get inside Friender </button>
							<br><br>
							<h2 style='font-size: 13px;'>
							Be With Your Friends Forever <br> <hr> <br>
							Add New Friends <br> <hr> <br>
							Share Your Feelings <br> 
							</div>
								
							</form>
							 </td>
							 <td width="40%" valign="top">
							 <h2> Sign Up ..... Below..... for free <br> <br> </h2>
							 <div class="well" style="margin-right: 200px; width: 440px;border-radius: 8px;padding-top: 40px; height: 360px; border: 2px solid #e3e3e3; ">
							 <?php 
$reg = @$_POST['reg'];
// declare variables
$fn = ""; //first name
$ln = ""; //last name
$un = ""; //username
$em = ""; //email
$em2 = ""; //email2
$pswd = ""; //password
$pswd2 = ""; //password2

$u_check = ""; // check if username already taken
//registration form
  $fn = strip_tags(@$_POST['fname']);
  $ln = strip_tags(@$_POST['lname']);
  $un = strip_tags(@$_POST['username']);
  $em = strip_tags(@$_POST['email']);
  $em2 = strip_tags( @$_POST['email2']);
  $pswd = strip_tags(@$_POST['password']);
  $pswd2 = strip_tags(@$_POST['password2']);
   $date = date("Y-m-d");
  
  if($reg) {
     if($em==$em2) {
    //checking if username already taken 
	  $u_check = mysql_query("SELECT username FROM users WHERE username='$un'");
	  $check = mysql_num_rows($u_check);
		//checking email if already taken
	 $e_check = mysql_query("SELECT email from users WHERE email='$em' ");
	  //count the number
	  $email_check = mysql_num_rows($e_check);
	  
	  if ($check ==0) {
		  if($email_check == 0) {	
		//check if everything is given 
		if($fn&&$ln&&$un&&$em&&$em2&&$pswd&&$pswd2) {
					 //checking if passwords match
					if($pswd==$pswd2) {
					         //checking if maximum length is got
							if ((strlen($un)>25||strlen($fn)<5||strlen($fn)>25)||strlen($un)<5) {
									echo "<script type='text/javascript'>
				window.alert(' Username must be between 5 to 30 characters')
				</script>";
												}
							else {
							  if (strlen($pswd)>30||strlen($pswd)<5){
							  		echo "<script type='text/javascript'>
				window.alert('Your password must be between 5 to 30 characters.')
				</script>";
							  						  
								}  
								else{
									//encrypts password
									$pswd = md5($pswd);
									$pswd2 = md5($pswd2);
									$img = "img/one.jpg";
									$query = mysql_query("INSERT INTO users VALUES ('','$un','$fn','$ln','$em','$pswd','$date','0','Write Something About You ! ','$img')");
									?>
										 <script type='text/javascript'>
				window.alert(' Registration sucessfull . Please Log in Below .')
				</script>
									<?php
								}
								 }
							
									}
				
			      else { 		echo "<script type='text/javascript'>
				window.alert(' Your passwords dont match.')
				</script>";
				  }
				  }				
					else {
						echo "<script type='text/javascript'>
				window.alert(' Please fill in all the fields to complete registration')
				</script>";
							}
							}
				else {
				echo "<script type='text/javascript'>
				window.alert(' E-mail  $em already taken. Choose another  e-address')
				</script>";
				}
				}
				else {
				
				echo "<script type='text/javascript'>
				window.alert(' Username $un already taken. Choose another username')
				</script>";
				}
				}
				else{
				echo "<script type='text/javascript'>
				window.alert('Your emails dont match')
				</script>";
				}
				}
				
				
?>
<script>
function validateForm()
{
var x=document.forms["myForm"]["email"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Please Provide a valid e-mail address");
  return false;
  }
  else {
  
  return true;
  }
}
</script>
							 
				 
							<form action="#" method="post" onsubmit="return validateForm();" name="myForm">
							 <input style="margin-left: 40px;" type="text" size="25" name="fname" placeholder="First Name" value="<?php echo $fn; ?>" >
							 <input style="margin-left: 40px;"type="text" size="25" name="lname" placeholder="Last Name" value="<?php echo $ln; ?>">
							 <input style="margin-left: 40px;" type="text" size="25" name="username" placeholder="Username" value="<?php echo $un; ?>">
							 <input style="margin-left: 40px;"type="text" size="25" name="email" placeholder="Your Email" value="<?php echo $em; ?>">
							 <input style="margin-left: 40px;"type="text" size="25" name="email2" placeholder="Re Enter Email" value="<?php echo $em2; ?>">
							 <input style="margin-left: 40px;"type="password" size="25" name="password" placeholder="Choose Password">
							 <input style="margin-left: 40px;"type="password" size="25" name="password2" placeholder="Repeat Password">
							 <br> <br>&nbsp&nbsp&nbsp&nbsp&nbsp		&nbsp&nbsp&nbsp&nbsp&nbsp		&nbsp&nbsp&nbsp&nbsp&nbsp			
								
								<input type="submit" name="reg"  botton class="btn btn-warning" value="Get New Account !">
							     
							  </form>
								</td>
							 
							 </tr>

							 
</body>

</html>