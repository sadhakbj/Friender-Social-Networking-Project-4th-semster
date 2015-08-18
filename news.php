<?php 
include_once("inc/incfiles/header1.php");

if ($user) {

}
else {
die("<h2> You Must be logged in to check this page!");
}
?> 


<?php

   $check = mysql_query("SELECT username,first_name FROM users WHERE username='$user'");
			if(mysql_num_rows($check)==1) {
	
		$get = mysql_fetch_assoc($check);
		$username = @$get['username'];
	$firstname = @$get['first_name'];
	echo $user;
	echo $username;
	
   if ((isset($_POST['post'])))   //if post bottom has been pressed
		{
		// get the data

		
		$post = htmlentities($_POST['post']);
		
		
		//check for existance
		
	   
	
		if($post) 
		{
		
												 $postedby =$user;	
												 $date = date("Y-m-d");
												 $postedto = $username;
												 
												  
						
							// insert data
							$insert = mysql_query("INSERT INTO news VALUES('id','$postedby' ,'$postedto','$post','$date')") or die(mysql_error());
							Header("Location: profile.php?u=");
							exit;
         		
		}
		else echo "Please fill out the title and body ";

		}
		}
   
   

?>