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

<body background="img/bg.JPG">

<div class="headerMenu">
    <div id="wrapper">
			<div class="logo">
			<a class ="logo" href="index.php?check_login_or_not_0000010090"> friender </a>
				</div>
			
			<div id="menu">
			
			
</div>
</div> <br/> <br/> <br>
</div> <div class="mainbody"> <br> <br> <br> <br> <br>
