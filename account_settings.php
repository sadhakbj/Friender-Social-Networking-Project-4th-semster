<?php 
include_once("inc/incfiles/header1.php");
if ($user) {

}
else {
header("location:index.php");
}
?>

<?php 
$senddata = @$_POST['senddata'];
$old_password = strip_tags(@$_POST['oldpassword']);
$new_password = strip_tags(@$_POST['newpassword']);
$repeat_password = strip_tags(@$_POST['newpassword2']);

if($senddata) {

if($old_password&&$new_password&&$repeat_password) {

$password_query = mysql_query("SELECT * FROM users WHERE username='$user'");
while($row = mysql_fetch_assoc($password_query)) {
 $db_password = $row['password'];
 
 if($db_password==md5($old_password)) {
     //check if the new passwords match 
	 
	  if($new_password == $repeat_password) {  
	   
	    if (strlen($new_password) < 4 || strlen($new_password) > 20) {
		 echo "Length Of Password Must be between 5 to 20";
		
		}
		else {
	  
	  
	  //update the password 
	  $new_password_md5 = md5($new_password);
	  
	  
	  $password_update_query = mysql_query("UPDATE users SET password='$new_password_md5' WHERE username='$user'"); 
	  echo "Password has been updated ";
	  
	  
	  
	  
	  
	  }
	  }
	  
	  else {
	  echo " Your New Passwords Do Not Match";
	  
	  }
   
   
 }
 else {
 echo "old password did not match";
 
 }

}

}
else {
echo "Please fill everything ";
}


}
else {
echo " ";
}

// First Name , Last Name and about the user 
$get_info = mysql_query("SELECT first_name, last_name, bio FROM users WHERE username='$user'");
$get_row = mysql_fetch_assoc($get_info);
$db_first_name = $get_row['first_name'];
$db_last_name = $get_row['last_name'];
$db_bio = $get_row['bio'];


$senddata1 = @$_POST['senddata1'];

//submit users types
if ($senddata1) {
		
		$first_name = strip_tags(@$_POST['fname']);
		$last_name = strip_tags(@$_POST['lname']);
		$bio = strip_tags(@$_POST['aboutyou']);
		
		
		if(strlen($first_name) <3) {
		 echo "name is too short";
		}
		else 
		if (strlen($last_name) <3) {
		echo "last name is must be greater than 3 characters <br>";
		}
		else {
		 //submit the form to database 
		 $info_submit_query = mysql_query("UPDATE users SET first_name='$first_name', last_name='$last_name', bio='$bio' WHERE username='$user'");
		 echo "information updated";
		 header("location: profile.php?u=$user");
		 exit();
		 
		 
		
		}	
		
		
		

	

}
else {

 // do nothing 

}


?>


<div class="leftnav">
<div class="wrap">

<h2> 
Edit Your Account Settings just below </h2> 
<hr /> <br>
<div class="well" style="margin-left: 40px; width: 400px;">
<p> UPLOAD YOUR PROFILE IMAGE: </P>
<?php
	$getphoto = mysql_query("SELECT imagelocation FROM users WHERE username='$user'");
	$get = mysql_fetch_assoc($getphoto);
	$img = $row['imagelocation'];
	echo "<img src='$img' width='120' height='100'>";
	?>

<form action='upload.php' method='POST' enctype='multipart/form-data'><br>
<input type='file' name='myfile'><button class='btn btn-warning' name='submit'> <i class='icon-camera icon-white'></i> Change Your Image </button>
</form>

 
</div>
<div class="well" style="margin-left: 40px; width: 400px;">
<p> <b> CHANGE YOUR OLD PASSWORD </b></p> 
<form action="#" method="POST">
 <input type="password" name="oldpassword" id="oldpassword" size="30" placeholder="Your Old Password"> <br/>
 <input type="password" name="newpassword" id="newpassword" size="30" placeholder="Your New Password"> <br/>
 <input type="password" name="newpassword2" id="newpassword2" size="30" placeholder="Repeat New Password"> <br/>
 <input class="btn-primary" type="submit" name="senddata" id="senddata" value="Update Password">
  
 </div>
 
 <hr> <br>
 <div class="well" style="margin-left: 40px; width: 400px;">
 <p> <b> UPDATE YOUR PROFILE INFO </b></p> 
 
 <input type="text" name="fname" id="fname" size="30" placeholder="First Name" value=" <?php echo "$db_first_name"; ?> " > <br />
 <input type="text" name="lname" id="lname" size="30" placeholder="Last Name" value= " <?php echo $db_last_name; ?>" > <br /> <br> 
 About You: <br> <br><textarea name="aboutyou" id="aboutyou" cols="60" rows="7"> <?php echo $db_bio; ?> </textarea>
  <br>

 <input class="btn-primary" type="submit" name="senddata1" id="senddata1" value="Update Information">
 </form>
 </div>
 </div>