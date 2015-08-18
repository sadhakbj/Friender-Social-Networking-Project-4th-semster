<?php
include_once("inc/incfiles/header1.php");
if (!$user){
	header("location:index.php");
	exit();
	}
?>
<div class="leftnav">
<div class="wrap">
<h2> &nbsp&nbsp &nbsp My Unread Messages </h2> </p>
<?php
$get_message = mysql_query("SELECT * FROM pvt_messages WHERE user_to='$user' AND opened='no' ");
$count = mysql_num_rows($get_message);
$numrows = mysql_num_rows($get_message);
if($numrows!=0) {
while ($get = mysql_fetch_assoc($get_message)) {
		$id = $get['id'];
		$user_from = $get['user_from'];
		$user_to = $get['user_to'];
		$msg_title = $get['msg_title'];
		$msg_body = $get['msg_body'];
		$date = $get['date'];
		$opened = $get['opened'];
		
		if(strlen($msg_title) > 50 ){
		  $msg_body = substr($msg_body,0,50)."..."; //if length of message if >150 decrease message upto 150 and add ...
		  
		
		}
		else {
		$msg_title = $msg_title;
		}
		
		
		
		if(strlen($msg_body) > 60 ){
		  $msg_body = substr($msg_body,0,50)."..."; //if length of message if >150 decrease message upto 150 and add ...
		 
		echo " <span style='margin-left:40px;'>
		 <br><span float:left; style='margin-left:20px; padding-right: 10px; color:#666;'>  $user_from </span> 
		 <a style='text-decoration:none; 'href='message_detail.php?id=$id'><span style='padding-left: 10px; margin-left: 40px;'> <b>  $msg_title </span>
		 <span style='margin-left: 20px; color:#666;'>- $msg_body </a> </span>
		<span style='float:right; margin-right: 80px;'> $date </span> <br> <br><hr></b>
		" ;
		
		}
		else {
		$msg_body = $msg_body;
		
		echo " <span style='margin-left:40px;'>
		 <br><span float:left; style='margin-left:20px; padding-right: 10px; color:#666;'>  $user_from </span> 
		 <a style='text-decoration:none; 'href='message_detail.php?id=$id'><span style='padding-left: 10px; margin-left: 40px;'> <b>  $msg_title </span>
		 <span style='margin-left: 20px; color:#666;'>- $msg_body </a> </span>
		<span style='float:right; margin-right: 80px;'> $date </span> <br> <br><hr></b>
		" ;
		
		}	
}

}
else {

echo "<hr> <br> <center> No New Messages For You !!! <br> <br> </center><hr>";

}
?>
<br> <br>
<h2> &nbsp&nbsp &nbsp My Read Messages </h2> </p>
<?php
$get_message = mysql_query("SELECT * FROM pvt_messages WHERE user_to='$user' AND opened='yes' ");
$count = mysql_num_rows($get_message);
$numrows_read = mysql_num_rows($get_message);
if($numrows_read!=0) {


while ($get = mysql_fetch_assoc($get_message)) {
		$id = $get['id'];
		$user_from = $get['user_from'];
		$user_to = $get['user_to'];
		$msg_title = $get['msg_title'];
		$msg_body = $get['msg_body'];
		$date = $get['date'];
		$opened = $get['opened'];
		
		if(strlen($msg_title) > 50 ){
		  $msg_body = substr($msg_body,0,50)."..."; //if length of message if >150 decrease message upto 150 and add ...
		  
		
		}
		else {
		$msg_body = $msg_body;
		}
		
		if(strlen($msg_body) > 55 ){
		  $msg_body = substr($msg_body,0,55)."..."; //if length of message if >150 decrease message upto 150 and add ...
		echo " <span style='margin-left:40px;'>
		 <br><span float:left; style='margin-left:20px; padding-right: 10px; color:#666;'>  $user_from </span> 
		 <a style='text-decoration:none; 'href='message_detail.php?id=$id'><span style='margin-left: 40px;'> <b>  $msg_title </span>
		 <span style='margin-left: 20px; color:#666;'>- $msg_body </a> </span>
		<span style='float:right; margin-right: 80px;'> $date </span> <br> <br><hr></b>
		" ;
		
		}
		else {
		$msg_body = $msg_body;
		 
		 
		echo " <span style='margin-left:40px;'>
		 <br><span float:left; style='margin-left:20px; padding-right: 10px; color:#666;'>  $user_from </span> 
		 <a style='text-decoration:none; 'href='message_detail.php?id=$id'><span style='margin-left: 40px;'> <b>  $msg_title </span>
		 <span style='margin-left: 20px; color:#666;'>- $msg_body </a> </span>
		<span style='float:right; margin-right: 80px;'> $date </span> <br> <br><hr></b>
		" ;
		 
		
		}	
}

}
else {

echo "You Havenot Read Any Messages yet";

}
?>