<?php 
include_once("inc/incfiles/header1.php");
if ($user) {

}
else {
die("<h2> You Must be logged in to check this page!");
}
?> 
<?php


if(isset($_POST['submit'])) {
		$errors =array();
		$allowed_ext = array('jpg','jpeg','png','gif','JPG','JPEG');
		

				$file_name = $_FILES['myfile']['name'];
				
				$extension=explode('.',$file_name);
				$file_ext=strtolower(end($extension));
				
				$file_size = $_FILES['myfile']['size'];
				$file_tmp = $_FILES['myfile']['tmp_name'];
				
				if(in_array($file_ext, $allowed_ext) ===false) {
				
				$errors[]='Extension not allowed. Plz Select Proper Image';
				
				
				}
				if ($file_size > 20009712)
					{
				$errors[] = 'File size is too big ';
				
					}	
					
					
					$namecheck =mysql_query("SELECT imagelocation from users where imagelocation='profilepic/$user/$file_name'");
				    $count = mysql_num_rows($namecheck);
				
				if($count!=0)
				
						{
						
						$query1= mysql_query("UPDATE users SET imagelocation='profilepic/$user/$file_name' WHERE username='$user'");
						header("location: profile.php?u=$user");
						}
						else {
					
				if (empty($errors)) {
				
					$loc = mkdir("profilepic/$user/");				
					$location = "profilepic/$user/$file_name";
					if(move_uploaded_file($file_tmp ,$location))
			
				{
				
				header("location: profile.php?u=$user");
				
				
				}	
							$query= mysql_query("UPDATE users SET imagelocation='$location' WHERE username='$user'");
					  echo "file uploaded";
					  header("location: profile.php?u=$user");
					  exit();
					}
					else
					{
					foreach ($errors as $error)
					 
						echo  $error , '<br/>';
					
					}
					
				
				
}
	}
?>
