<?php 
require_once("inc/scripts/mysql_connect.inc.php");
 session_start();
if (isset($_SESSION["user_login"]))
{
$user = $_SESSION["user_login"];
}
else{
$user = "";
}
 

?>
<html>
<head>
<link rel="stylesheet" href="css/main.css" type="text/css">
<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css" type="text/css">
<title> friender.com - A new Social Networking Site by Nepalese students ... </title>
</head>
<?php 
$get_image = mysql_query("SELECT imagelocation FROM users WHERE username='$user'");
$row = mysql_fetch_assoc($get_image);
$img = $row['imagelocation'];

?>

<div class="headerMenu">
    <div id="wrapper">
			<div class="logo">
			<a class ="logo" href="home.php">  friender </a>
			</div>
			<div class="search_box">
			    <form method="GET" action="search.php" id="Search" size="35" />
				<input name="q" type="text" size="30" placeholder="Search">
				<button class="btn btn-primary" name="search"> <i class="icon-search icon-white"></i></button>
				</form>
			</div>	
			</div>
			
			<div id="menu">
			<font color="black"> <b> Namaskar! &nbsp&nbsp </font>
						
			<?php 

			echo " <a href='$user'> $user </a> ";
			?>
			<?php
			$check = mysql_query("SELECT * FROM friendsys WHERE user2='$user' AND 2says='0'");
			$get = mysql_fetch_assoc($check);
			$count = mysql_num_rows($check);
			
			if($count!=0) {
			 echo "<a href='friend_requests.php'> <i class='icon-user icon-black'> </i> Requests ($count)</a>";
			
			}
			else {
			 echo '<a href="friend_requests.php"> <i class="icon-user icon-black"> </i> Requests </a>';
			}
			
			?>
		
			<?php
			$getmsgno = mysql_query("SELECT * FROM pvt_messages WHERE user_to='$user' AND opened='no'");
			$num = mysql_num_rows($getmsgno);
			
			echo "<a href='my_messages.php'> <i class='icon-envelope icon-black'> </i> Inbox ($num) </a>";
			
			?>
			
			
			<a href="account_settings.php"> <i class="icon-cog icon-black"> </i>Settings</a>
			<a href="logout.php"><i class="icon-off icon-black"> </i> Log Out </a>
			</b>

</div>
</div> <br/> <br/> </div> <div class="mainbody"> <br> <br> <br> <br> <br>