<?php 
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
$username = $_GET['u'];
echo "<h2> Here View $username's albums </h2>";
$get_album = mysql_query("SELECT * FROM albums WHERE uploader='$username'");
$count = mysql_num_rows($get_album);
  
  if($count!=0) {
  
   while($row = mysql_fetch_assoc($get_album)) {
  
  $name = $row['album_title'];
  $uploader = $row['uploader'];
  
  $geticon = mysql_query("SELECT * FROM photos WHERE album_name='$name' ORDER BY id DESC LIMIT 1");
  $rows = mysql_fetch_assoc($geticon);
  $loca = $rows['location'];
  
  echo "


  <td> 
    <div class='well'>
  <div class='albums'>
 
  <a href='view_photo.php?name=$name'>
  <img src='$loca' height='180' width='170'><br><br>
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
  echo 	"<div class='well' style='margin-left: 100px; width: 500px;  '>";
 
 
 if($username == "$user") {
    echo "You have no albums.    Create a new album below <br><br>  ";
	
    echo '<form action="#" method="POST">';
	echo'<input type="text" name="name" placeholder="Name of Your album"> <br>';
   echo'<input type="text" name ="desc" placeholder="Description"> <br>';
   echo'<input type="submit" name="submit" value="Create a new album" class="btn-warning">
  </form>';
  }
  else {
  echo "$username has no albums";
  }
  ?>
  
  
  
  
  
  <?php
  if(isset($_POST['submit'])) {
  
   
   $album_name = $_POST['name'];
   $desc = $_POST['desc'];
     $date = date("Y-m-d");
  
   
   if($album_name&&$desc) {
   
   $insert = mysql_query("INSERT INTO albums VALUES ('','$album_name','$desc','$user','$date')") or die("Cant create a album");
   header("location: view_photo.php?name=$album_name");
   
   }
   else {
   echo "<h2> you must give name first to create a new album man";
   
   }
   
  }
  }
  

?>

<?php
if($username=="$user") {
echo '<form action="#" method="POST">';
	echo'<input type="text" name="name" placeholder="Name of Your album"> ';
   echo'<input type="text" name ="desc" placeholder="Description"> ';
   echo'<input type="submit" name="submit1" value="Create a new album" class="btn-warning">
  </form> <br> <br>  <hr> <br>';


}
else {


}

?>

<?php
  if(isset($_POST['submit1'])) {
  
   
   $album_name = $_POST['name'];
   $desc = $_POST['desc'];
     $date = date("Y-m-d");
  
   
   if($album_name&&$desc) {
   
   $insert = mysql_query("INSERT INTO albums VALUES ('','$album_name','$desc','$user','$date')") or die("Cant create a album");
   header("location: view_photo.php?name=$album_name");
   
   }
   else {
   echo"
   <script type='text/javascript'>
				window.alert(' You must give name of album and description')
				</script>";
   }
   
  }
  
  

?>
