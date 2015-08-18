<?phpphp 
require_once("inc/incfiles/header1.php");

$user = $_SESSION["user_login"];
if(!isset($_SESSION["user_login"])) {
 header("location: index.php?returnhereagain");
 exit();
 }
 else{

 }

?>
<table>
       <tr>
<?php
$get = $_GET['name'];
//check is this album exists
$check = mysql_query("SELECT * FROM albums WHERE album_title='$get' ");
$getp = mysql_fetch_assoc($check);
$uploader = $getp['uploader'];
$count = mysql_num_rows($check);
if($count!=0){

//now check in database photos
$get_ph = mysql_query("SELECT * FROM photos WHERE album_name='$get'");
$countit = mysql_num_rows($get_ph);

if($countit !=0) {

if($uploader == "$user") {
echo" <div class='well'>  Add some more photos to $get:  &nbsp&nbsp 
<a href='view_albums.php?u=$uploader' title='See more albums '> 
						<button  class='btn btn-info' >  </i> See MOre albums  </button> </a>

 <form action='#' method='POST' enctype='multipart/form-data'><br>
<input type='file' name='myfile'><button class='btn btn-warning' name='submit'> <i class='icon-camera icon-white'></i> Upload </button>
</form>";
}
else {


}

while ($row = mysql_fetch_assoc($get_ph)) {


$name = $row['album_name'];
$loc = $row['location'];
$person = $row['uploader'];




 echo "
  <td> 
  <div class='albums'>
  
  <img src='$loc' height='160' width='170'><br><br>
  <b> $name </b>
  </a>
  <center>
  
  </center>
  </div>
  </td>

  ";


}
}
else {
  //if uploader is user then he can add new photos
     
  if($uploader == "$user")
  {
							echo" <div class='well'> <form action='#' method='POST' enctype='multipart/form-data'><br>
<input type='file' name='myfile'><button class='btn btn-warning' name='submit'> <i class='icon-camera icon-white'></i> Upload </button>
</form>";
  
					
					}
					else {
					
					
					echo "<h2>No photos in this album";
					
					}


}

}
else {
echo "this album cant exits";
}

?>


<?phpphp


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
					
					
					$namecheck =mysql_query("SELECT location from photos where location='photos/$user/$file_name'");
				    $count = mysql_num_rows($namecheck);
				
				if($count!=0)
				
						{
						
						echo "photo was already uploaded";
						
						}
						else {
					
				if (empty($errors)) {
				
					$loc = mkdir("photos/$user/");	

						$album_name = $get;
						$uploader = $user;
						$location = "photos/$user/$file_name";
					if(move_uploaded_file($file_tmp ,$location))
			
				{
				
				header("location: view_photo.php?name=$get");
				
				
				}	
				
							$query= mysql_query("INSERT INTO `photos`(`id`, `album_name`, `uploader`, `location`) VALUES ('','$album_name','$uploader','$location')") or die("cant upload");
					  echo "file uploaded";
					  
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

<h2> Photos on this album: 
<a href='view_albums.php?u=<?php echo $uploader; ?>' title='View more albums'> 
						<button  class='btn btn-info' ><i class='icon-thumbs-up icon-black'>   </i> More albums </button> </a>