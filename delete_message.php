<?php
include_once("inc/incfiles/header1.php");
if ($user) {

}
else {
header("location:index.php");
}
?>


<?php
if( isset($_GET['id']) && is_numeric($_GET['id'])){

  $getmsg = mysql_query("SELECT * FROM pvt_messages WHERE id='{$_GET['id']}'") or die("cant get the message");
  $row = mysql_fetch_assoc($getmsg);
  
  $id = $row['id'];
  $sender = $row['user_from'];
  $receiver = $row['user_to'];
  
   if($receiver=="$user") {
   
   $delete = mysql_query("DELETE FROM pvt_messages WHERE id='{$_GET['id']}' AND user_to='$user' ");
   header("location: my_messages.php");
   exit();
   
   
   }
   else {
   //if receiver is not you then you cant delete the message you will be sent back to message page
   header ("location: my_messages.php");
   exit();
   
   }
  
  
  }
  else {
  
  header("Location:my_messages.php?id={$_GET['id']}");
  
  }
  

?>