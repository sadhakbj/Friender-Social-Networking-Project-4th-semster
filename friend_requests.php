
<?php
 include_once ("inc/incfiles/header1.php");
if (!$user){
	header("location:index.php");
	exit();
	}   //if no user send to index page
 ?>
 <div class="leftnav">
<div class="wrap">
<div class="well" style="width: 600px;">
<?php

$friendrequests = mysql_query("SELECT * FROM friendsys WHERE user2='$user' AND 2says='0' "); //user means session logged in person 
$numrows = mysql_num_rows($friendrequests);
if($numrows==0) {
echo "no friend requests";
}
else {
     while($row = mysql_fetch_assoc($friendrequests)) {
	 
	 $id = $row['id'];
	 $user1 = $row['user1'];
	 $user2 = $row['user2'];
	 
	 echo "$user1 wants to be ur friend <br>  <hr>";
	 
	 
	 
	 
	 


?>

<?php
if (isset($_POST['accept'.$user1])) {
 
 $addfriend = mysql_query("UPDATE friendsys SET 2says='1' WHERE user1='$user1' AND user2='$user'");
 echo "Now u r friends";
 header("Location: friend_requests.php");
 exit();
 

}
else {

}

  ?>
  
  <?php
  if (isset($_POST['ignore'.("$user1")])) {
 
		$remove = mysql_query("DELETE FROM friendsys WHERE user1='$user1' AND user2='$user'");
		header("location: friend_requests.php");
		exit();
  
  }
  
  ?>


<form action="#" method="POST">
<button class="btn btn-large" name="accept<?php echo $user1; ?>"> <i class="icon-user icon-black"></i> Accept </button> &nbsp&nbsp
<button class="btn btn-danger" name="ignore<?php echo $user1; ?>"> <i class="icon-trash icon-black"></i> Ignore <?php echo $user1; ?> </button>



</form>

<?php
}
}

?>