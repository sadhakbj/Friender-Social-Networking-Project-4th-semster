<?php
include_once("inc/incfiles/header1.php");
if ($user) {

}
else {
header("location:index.php");
}
?>
<h2> Welcome <?phpecho $user ?> to your Messages :
<hr></h2> <br>

<div class="well" style="margin-left:140px;  width: 900px;" >



<?php
if( isset($_GET['id']) && is_numeric($_GET['id'])){

  $getmsg = mysql_query("SELECT * FROM pvt_messages WHERE id='{$_GET['id']}'") or die("cant get the message");
  $row = mysql_fetch_assoc($getmsg);
  
  $id = $row['id'];
  $user_from = $row['user_from'];
  $user_to = $row['user_to'];
  $msg_title = $row['msg_title'];
  $msg_body = $row['msg_body'];
  $date = $row['date'];
  $opened = $row['opened'];
 
 
  if($user != "$user_to") {
  
  die ("you have got no authority to view this page");
  
  }
  else {
  if($opened=="yes") {
  ?>
  <b> <span style=' color:#0084c6;'> Sender: </b> <i> &nbsp&nbsp <span style=' color:#666;'> <?php echo $user_from ?></i> &nbsp&nbsp on <i> &nbsp&nbsp <b> <span style=' color:#666;'><?php echo $date ?> </i> <b/> <div class style='float: right; margin-right: 130px; '> 
   <a title='Delete This Message' onClick="return confirm('Are You Sure to Delete this message ?' ) " href='delete_message.php?id=<?php echo $row['id'] ?> '> <i class='icon-trash icon-black'> </i> </a> </div>  <br><br>  <hr> <br> 
  <?php
  echo "<b> <span style=' color:#0084c6;'> Title: </span> &nbsp&nbsp <span style=' color:#666;'> $msg_title <br> <br> <hr> <br>";
  echo "<b> <span style=' color:#0084c6;'>Message:  </b> <br> <br> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </b>";
   echo nl2br($msg_body);
  echo "<br> <br> <br> <br> <br> <hr> <br> <br> <br>";
  
  echo"<form action='#' method='POST'> <textarea cols='80' rows='10' name='msg_body' > </textarea>  </p> <br>
	<button class='btn btn-warning' name='reply'> <i class='icon-envelope icon-white'></i> Reply Message </button>
	";
  

  
  
   
  }
  else {
  ?>
  <b> <span style=' color:#0084c6;'> Sender: </b> <i> &nbsp&nbsp <span style=' color:#666;'> <?php echo $user_from ?></i> &nbsp&nbsp on <i> &nbsp&nbsp <b> <span style=' color:#666;'><?php echo $date ?> </i> <b/> <div class style='float: right; margin-right: 130px; '> 
 <a title='Mark As Read' href='mark_as_read.php?id=<?php echo $row['id'] ?>'> <i class='icon-ok icon-black'> </i> </a>  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <a title='Delete This Message' onClick="return confirm('Are You Sure  to delete this message?' ) " href='delete_message.php?id=<?php echo $row['id'] ?> '> <i class='icon-trash icon-black'> </i> </a> </div>  <br><br>  <hr> <br> 
 
  <?php
  echo "<b> <span style=' color:#0084c6;'> Title: </span> &nbsp&nbsp <span style=' color:#666;'> $msg_title <br> <br> <hr> <br>";
  echo "<b> <span style=' color:#0084c6;'>Message:  </b> <br> <br> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </b>";
   echo nl2br($msg_body);
  echo "<br> <br> <br> <br> <br> <hr> <br> <br> <br>";
  
   echo"<form action='#' method='POST'> <textarea cols='80' rows='10' name='msg_body' > </textarea>  </p> <br>
	<button class='btn btn-warning' name='reply'> <i class='icon-envelope icon-white'></i> Reply Message </button>
	";
  
  }
  }
}  
?>
<?php
if(isset($_POST['reply'])) 
{
		$title = "Re [$msg_title]";
	    $msg_body = htmlentities(@$_POST['msg_body']);
		$date = date("Y-m-d");
		$opened = "no";
		$user_to= $user_from;
		
		
		if($msg_body==" "){
			 
			 ?>
			 <script type="text/javascript">
			 window.alert("Please type something to send message!")
			</script>
			 <?php
		}
		
		else {
		
		$send = mysql_query("INSERT INTO pvt_messages VALUES('','$user','$user_to','$title','$msg_body','$date','$opened')");
		echo "message has been sent";
	
	
			
			echo '	
		<script type="text/javascript">
			 window.alert("Your message has been sent ")
			</script>
			';
			
			
	}


}
else {

	// do nothing if reply botton not pressed

}


?>