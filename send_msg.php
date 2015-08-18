<?php
include_once("inc/incfiles/header1.php");
if (!$user){
	header("location:index.php");
	exit();
	}

?>



<?php
 if(@isset($_GET['u'])) {
	//check user exists
	$username = mysql_real_escape_string($_GET['u']);
	if (ctype_alnum($username)) {
	//check if user exists
	$check = mysql_query("SELECT username FROM users WHERE username='$username'");
	if(mysql_num_rows($check)==1) {
	
	$get = mysql_fetch_assoc($check);
	$username = $get['username'];
	
	//checking if we arenot sending to ourseves
	
	if($username !=$user) {
	
	if(isset($_POST['submit'])) {
		
		$msg_title = htmlentities(@$_POST['title']);
	    $msg_body = htmlentities(@$_POST['msg_body']);
		$date = date("Y-m-d");
		$opened = "no"; //initially we declared that message is not opened
		
	if($msg_body) {
	
	 if($msg_body==" "){
			 ?>
			 <script type="text/javascript">
			 window.alert("Please type something to send message!")
			</script>
			 
			 
			 <?php
			 
			 
			 
		}
		
		else {

		if($msg_title=="") {
		 $msg_title = "No title";
		}
		else {
		$msg_title = $msg_title;
		}
		
		$send = mysql_query("INSERT INTO pvt_messages VALUES('','$user','$username','$msg_title','$msg_body','$date','$opened')");
		echo "message has been sent";
	}
	
	
	}
else {
echo "You must fill all the fields";

   }	
	
	
	
	}
	echo " <div class='well'>
	<form action='send_msg.php?u=$username' method='POST'>
	<h2> Compose Message:  ($username) </h2>
	<input type='text' name='title' size='30' placeholder='Enter the title of the message'> &nbsp&nbsp *Do enter length more than 50 <br/ > <br> 
	<textarea cols='80' rows='10' name='msg_body' > </textarea>  </p> <br>
	<button class='btn btn-warning' name='submit'> <i class='icon-envelope icon-white'></i> Send Message</button>
	";
	
	}
	else {
	
	header("location: $username");
	
	}
	
	
	
		}
		}
		}
		

?>