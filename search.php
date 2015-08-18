<?php
include_once("inc/incfiles/header1.php");
if (!$user) {

header("location:index.php");
exit();
}
?>
<div class="leftnav">
<div class="wrap">

<?php
 $query = strip_tags($_GET['q']);
 

$get = mysql_query("SELECT * FROM users WHERE first_name LIKE '%$query%' OR username LIKE '%$query%' ");
$row = mysql_fetch_assoc($get);
//value taking
$fname = $row['first_name'];
$username = $row['username'];
$img = $row['imagelocation'];
$num = mysql_num_rows($get);

if($row!=0) {


echo'
<div class="rightnav">';
echo "<h2> Your Results for <i>$query:</i> </h2> <br> ";
echo "<img src='$img' height='80' width='80'> <br>";
echo "<a href='profile.php?u=$username'>".$username."($fname) </a>";
exit();

}
else {
echo " <h2> No such results found as <i> $query </i> plz try agian </h2>";

}
 
?>