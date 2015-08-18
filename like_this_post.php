<?php
include_once("inc/incfiles/header1.php");
if (!$user){
	header("location:index.php");
	exit();
	}

?>

<?php 

if( isset($_GET['id']) && is_numeric($_GET['id']) ){

//check if the post that we are going to like exists
$check_id = mysql_query("SELECT id FROM news WHERE id={$_GET['id']}");
$count = mysql_num_rows($check_id);
if($count!=0) { //if we got the post

$post_id = $_GET['id'];
echo $user;
//now we will insert values in likes
$insert = mysql_query("INSERT INTO `likes`(`id`, `post_id`, `user`) VALUES ('','$post_id','$user')") or die("Cant do this");
header("location: news_detail.php?id=$post_id");
exit();


}
else {
echo "not got";
}


}
else {
echo "This thing is invalid";
}


?>



