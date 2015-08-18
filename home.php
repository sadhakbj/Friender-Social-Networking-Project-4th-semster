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

<?php
$getphoto = mysql_query("SELECT * FROM users WHERE username='$user'");
	$row1 = mysql_fetch_assoc($getphoto);
	  $img1 = $row1['imagelocation']; 
	  $fname = $row1['first_name'];
	  $lname = $row1['last_name'];
  ?>
  
<?php 
 
 //Posting on the wall code goes here
  $post = htmlentities(@$_POST['post']); //btn-large (write on wall bhanera naam deko cha )
  if ($post != " ") {
  if($post) {
  $postedby =$user;	
  $dated = date("d M Y \a\\t h:ia"); //this will enter date along with time
  $postedto = $user;
  
  echo $dated;
  
   $insert = mysql_query("INSERT INTO news VALUES('id','$postedby','$postedto','$post','$dated')");
  }
  
  
 }
 else {
 ?>
	<script type="text/javascript">
			 window.alert("You must type somthing to create a post ")
			</script>
			
 <?php
 
 }
 
?>


<! Divisions are here please check leftnav , where we show photo and name !>
	<div class='leftnav'> 
	<?php
	echo " <table> <tr> <td> <a style='margin-bottom: 1px solid yellow; 'href='profile.php?u=$user'> <img src='$img1' height='90' width='90' title='Your Profile' > <td> &nbsp&nbsp  <h2> <font size='14'><a href='profile.php?u=$user'> <b> $fname $lname ($user) </a>   </table>";
     echo " <br> <div style='border-bottom: 1px solid  #f5f5f5; width: 240px;'> </div> ";
	?>
	 

	</div>
	

<div class='rightnav'>
<h2 > <font-size="2"> Update Your Status </h2> </font>
  <div class='postform'>   

<form action="#" method="post">
<textarea id="post" name="post" rows="5" cols="90" > </textarea>
&nbsp&nbsp<button name="Post" class="btn btn-large" style="margin-bottom: 60px;"> <i class="icon-comment icon-black"></i> Write on Wall </button>
</form>

 
  
				</div>  <br> 
				<div class='Profileposts'>
				<div class="posts">
				


<?php 

$getnews = mysql_query("SELECT * FROM news WHERE postedto='$user' OR postedby='$user' ORDER BY id DESC") or die(mysql_error());  
while ($row = mysql_fetch_assoc($getnews )) // it fetches the data
{
$id = $row['id'];
$postedby = @$row['postedby'];
$postedto = @$row['postedto'];
$post = @$row['post'];
$date =$row['DATE'];

$res = mysql_query("SELECT imagelocation FROM users WHERE username='$postedby'");
$img = mysql_fetch_assoc($res);
				$img = $img['imagelocation'];
				
				
						
						
				
				
				
				?>
				
				<table class="ProfilePosts1" width="500px" border="0" style="margin: 10px 0; border-top: 1px solid #999; margin-bottom: 10px; border-bottom: 1px solid #FFF;">
					<tr>
					
						<td width="55px" rowspan="2"><a href="profile.php?u=<?php echo $postedby ?>"><img src="<?php echo $img; ?>" width="50px" height="80px" /> </td> 
						<td><b><?php echo "<a title='$postedby' href=\"$postedby\">$postedby</a>"; ?>
						<?php
						if($postedto != $postedby) {
						echo "&nbsp writes "; echo"<a href='$postedto'> $postedto </a>"; echo "'s wall";
						}
						else {
						echo "updates:";
						}
						?>
						</b><span style="margin-left: 10px; color: #666;
						font-size: 9pt;"><?php echo $date; ?></span>
						
						 <a title='Delete This Post' onClick="return confirm('Are You Sure  to delete this post by <?php echo "$postedby ?" ;  ?> ' ) " 
						 href='delete_posts.php?id=<?php echo $row['id'] ?> '> <?php if($postedby == "$user"||$postedto =="$user") { echo "&nbsp&nbsp <i class='icon-trash icon-black'> </i> </a>  </div> ";}
								
								else {
								
								echo "</a>";
								
								}
												
							?>
							
							
 
						</td>
					</tr>
					<tr>
						<td><?php echo nl2br($post)."<hr>"?>  
						
						<?php 
						$getcomment = mysql_query("SELECT * FROM comments WHERE post_id='$id' ");
						$count = mysql_num_rows($getcomment);
						$com = mysql_fetch_assoc($getcomment);
												
						$com1 = $com['body'];
						
						
						?>
											
										<br> <br><a href='news_detail.php?id=<?php echo $id; ?>' title='Click to see and comment like..'> 
						<button  class='btn btn-mini btn-info' >  See more..</button> </a>
	
																
							
							
							
										</div>	</td>
					
					
					</tr>
					
					
				</table>
			<br>
<?php			
				
	}			


?>


				</div>
				</div>



</div>
<div id='ProfileLeftSideContent'>

<?php

$friendrequests = mysql_query("SELECT * FROM friendsys WHERE user2='$user' AND 2says='0' LIMIT 3"); //user means session logged in person 
$numrows = mysql_num_rows($friendrequests);
if($numrows==0) {
?>
<button  class='btn btn-small btn-info'> No Friend requests </button> <br> <hr>
<?php
}
else {

 ?>
	<div class="well" style="width: 200px;">
	   <a href='friend_requests.php?idkja09090909'> <button  class='btn btn-small btn-info'> <?php echo $numrows; ?>     New Friend requests </button> </a>  <br> <br>
	 <?php
     while($row = mysql_fetch_assoc($friendrequests)) {
	 
	 $id = $row['id'];
	 $user1 = $row['user1'];
	 $user2 = $row['user2'];
	
	 
	 
	 echo "<a href='friend_requests.php' title='$user1 wants to be friend'> 
						<button  class='btn btn-warning' > </i> $user1 wants to be friend </button> </a> <br><hr>"; 
	 
	 
	 
	}} 
	 


?>


</div>


