<?php
include_once("inc/incfiles/header1.php");
if (!$user){
	header("location:index.php");
	exit();
	}

?>


<?php
if( !isset($_GET['id']) && !isset($_GET['u']) )
{
	die(" <br> you have not given valid id or username");
}
$getid = @$_GET['id'];
$getuser = @$_GET['u'];



$query =mysql_query("SELECT * FROM users WHERE id='$getid' OR username='$getuser'");
$numrows=mysql_num_rows($query);
 if ($numrows ==1) {
      
	  $row=mysql_fetch_assoc($query);
	  $id = $row['id'];	  
	  $username=$row['username'];
      $image=$row['imagelocation'];
	  
	  

  
 }
 else {
 echo "<h2> <center> User is not available </h2> ";
 exit();
 
 }

?>


<?php 
 
 $about_query = mysql_query("SELECT * FROM users WHERE username='$username' ");
  $get_result = mysql_fetch_assoc($about_query);
  $about_the_user = $get_result['bio'];
  $imglocation = @$get_result['imagelocation'];
  $fname = $get_result['first_name'];
  $lname = $get_result['last_name'];
  $email = $get_result['email'];
  
//Posting on the wall code goes here
  $post = htmlentities(@$_POST['post']); //btn-large (write on wall bhanera naam deko cha )
  if ($post != " ") {
  if($post) {
  $postedby =$user;	
  $dated = date("d M Y \a\\t h:ia"); //this will enter date along with time
  $postedto = $username;
  
  
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
 
<?php 

if(isset($_POST['message'])) {
 header("Location: send_msg.php?u=$username");
 exit();

}


if (isset($_POST['addfriend'])) {
		
			$friend_request = $_POST['addfriend'];
			 $user1 = $user;
			$user2 = $username;
			
			$check = mysql_query("SELECT * FROM friendsys WHERE user1='$user' AND user2='$username'");
			$count = mysql_num_rows($check);
			
			if ($count!=0) {		
			    		echo "<script type='text/javascript'>
				window.alert('Already Sent Request to $user2')
				</script>";
			
			}
			
			
			
			else {
			$create_request = mysql_query("INSERT INTO friendsys VALUES ('','$user1','$user2','1','0')");
			echo "<script type='text/javascript'>
				window.alert('Request to $user2 , waiting for approval ')
				</script>";	
			
			}
			}
			else {
			
			// do nothing
			}



?>







<div class="leftnav">
<font color="#598498">
<?php  echo "<img  src='$imglocation' height='250' width='200' border='2' title='$fname' > "; ?>
<br/>
</font>
<div id="textHeader"> <?php echo "<h2> <font-size='8'>$fname $lname ($username)" ; ?> </div>



<?php
  

if ($username != $user) {
$friendrequests = mysql_query("SELECT * FROM friendsys WHERE user2='$user'&&user1='$username' OR user1='$user'&&user2='$username'");
						$numrows = mysql_num_rows($friendrequests);
						$row1 = mysql_fetch_assoc($friendrequests);
						  
						  $onesays = $row1['1says'];
						  $twosays = $row1['2says'];
						  $user1 = $row1['user1'];
						  $user2 = $row1['user2'];
    
 if($onesays=='1'&& $twosays=='0'&& $user1==$user) {
      
	  echo "<h2> <font size='2'> <center> Request sent </h2>";
	  echo '<form action="#" method="POST">  
  
  <button class="btn btn-danger" name="removerequest"  style=" margin-top:5px; width: 100%;"> <i class="icon-user icon-black"></i> Cancel  Request </button>
  <button class="btn btn-block" name="message"> <i class="icon-envelope icon-black"></i> Send Message</button>
  </form> <br><hr>';
 
		}
		else {
		   if($onesays=='1' && $twosays=='1') {
		   
		   echo '<form action="#" method="POST">  
               
			  <button class="btn btn-danger" name="removefriend"  style=" margin-top:5px; width: 100%;"> <i class="icon-user icon-black"></i> Remove Friend</button>
			  <button class="btn btn-block" name="message"> <i class="icon-envelope icon-black"></i> Send Message</button>
			  </form> <br><hr>';
					   
		   }
		   else{
		    if($onesays=='1'&& $twosays=='0'&& $user1!=$user) {
      
					  echo "<h2> <font size='2'> <center> Respond request </h2>";
					  echo '<form action="#" method="POST">  
				  <button class="btn btn-warning" name="respond" style="width:100%;"> <i class="icon-user icon-black"></i>  Respond </button>
				  <button class="btn btn-block" name="message"> <i class="icon-envelope icon-black"></i> Send Message</button>
				  </form> <br><hr>';
 
		}
		   
		   
			 else {
						 
						 echo '<form action="#" method="POST">  
			  <button class="btn btn-warning" name="addfriend" style="width:100%;"> <i class="icon-user icon-black"></i>  Add As Friend</button>
			  <button class="btn btn-block" name="message"> <i class="icon-envelope icon-black"></i> Send Message</button>
			  </form> <hr>';
			 
			 }
		   
		   }
		
		}
		
  



?>


<?php //to respond send to friend request page

if(isset($_POST['respond'])) {

 
 header("location: friend_requests.php?10000000000000000");
exit();


}
 




?>



<?php //this will remove request if u have sent and is not accepted

if(isset($_POST['removerequest'])) {

 echo "now deleting";
 
 $delete = mysql_query("DELETE FROM friendsys WHERE (user1='$user'OR user1='$username') AND (user2='$username' OR user2='$user') ");
 header("location: profile.php?u=$username");
exit();


}
 

}



?>

<?php //if this botton pressed

if(isset($_POST['removefriend'])) {

 echo "now deleting";
 
 $delete = mysql_query("DELETE FROM friendsys WHERE (user1='$user'OR user1='$username') AND (user2='$username' OR user2='$user') ");
 header("location: profile.php?u=$username");
 exit();
 

}



?>


<div id="profileLeftSideContent">  

<?php
if($username=="$user") {

 
  echo "  <div style='float: right; margin-left: 60px;'> <a href='account_settings.php' title='Edit About You' >  <i class='icon-pencil icon-black'></i>  </a> </div>  </font> <br> <h2> <font-size='10'>$about_the_user";
  
  }
  else {
  
  echo "<br> $about_the_user";
  
  
  
  }
?>
</div>
 
 
<?php 

$friendcheck = mysql_query("SELECT * FROM friendsys WHERE (user1='$username' OR user2='$username') AND 1says='1' AND 2says='1' LIMIT 10");
$num = mysql_num_rows($friendcheck);

echo"<div id='textHeader'>  $username 's  Friends ($num)"; 
echo "<a href='see_all_friends.php?u=$username' title='See all friends'> 
						<button  class='btn-mini btn btn-info' >  </i> See All </button> </a>"; 
echo " </div>
<div id='profileLeftSideContent'> ";
    
while($row = mysql_fetch_assoc($friendcheck)) {
   
   $user1 = $row['user1'];
   $user2 = $row['user2'];
    
    if( $row['user1'] != $username) {
	
	$getphoto = mysql_query("SELECT imagelocation FROM users WHERE username='$user1'");
	$row1 = mysql_fetch_assoc($getphoto);
	  $img1 = $row1['imagelocation'];
       echo "<a href='$user1'> <img src='$img1' title='$user1' height='50' width='50' style='margin-right: 5px; margin-bottom: 5px; border: 1px solid blue;' > </a>";
	   		
    }
   
    else {
       // do nothing
    }
	if ( $row['user2'] != $username ) {
	$getphoto = mysql_query("SELECT imagelocation FROM users WHERE username='$user2'");
	$row1 = mysql_fetch_assoc($getphoto);
	  $img2 = $row1['imagelocation'];
       	    echo "<a href='$user2'> <img src='$img2' title='$user2' height='50' width='50' style='margin-right: 5px; margin-bottom: 5px;border: 1px solid blue;' > </a>";
	}
	else {
	 // do nothing
	
	}
}
 
 
  


?>

</div>

<?php
echo"<div id='textHeader'>    Photo Albums </div>
<div id='profileLeftSideContent'> ";
echo "<a href='view_albums.php?u=$username' title='View all albums'> 
						<button  class='btn btn-info' >   </i> View all albums  </button> </a>"; 
?>
</div>
</div>
<div class="rightnav">
<div class="postForm"> 

<!- form for posting !>
<form action="#" method="post">
<textarea id="post" name="post" rows="5" cols="90" > </textarea>
&nbsp&nbsp<button name="Post" class="btn btn-large" style="margin-bottom: 60px;"> <i class="icon-comment icon-black"></i> Write on Wall </button>
</form>
 </div> 
 
<div class="ProfilePosts"> 
<div class="posts">


<?php 
$getnews = mysql_query("SELECT * FROM news WHERE postedto='$username' OR postedby='$username' ORDER BY id DESC") or die(mysql_error());  
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
						echo "&nbsp on"; echo"<a href='$postedto'> $postedto </a>"; echo "writes";
						}
						else {
						// do nothing
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
<!- this ends the wrapper div ie upto the posts division !>

Here we will add somethings

