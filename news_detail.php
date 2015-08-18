<?php 
include_once("inc/incfiles/header1.php");
if (!$user){
	header("location:index.php");
	exit();
	}

?>
<?php 
$idg = $_GET['id'];
$getnews = mysql_query("SELECT * FROM news WHERE id='$idg'");
$row = mysql_fetch_assoc($getnews);
$count = mysql_num_rows($getnews);
if($count!=0) {
    
	
$id = $row['id'];
$postedby = @$row['postedby'];
$postedto = @$row['postedto'];
$post = @$row['post'];
$date =$row['DATE'];
						
						//for photo use this
					$res = mysql_query("SELECT imagelocation FROM users WHERE username='$postedby'");
					$img = mysql_fetch_assoc($res);
									$img = $img['imagelocation'];
									
									
				?>			
					 
				<div class="posts" style="margin-left: 250px; width: 700px;">


				<table class="ProfilePosts1" width="500px" border="0" style="margin: 10px 0; border-top: 1px solid #999; margin-bottom: 10px; border-bottom: 1px solid #FFF;">
					<tr>
					
						<td width="55px" rowspan="2"><a href="profile.php?u=<?php  echo $postedby ?>"><img src="<?php  echo $img; ?>" width="50px" height="80px" /> </td> 
						<td><b><?php  echo "<a title='$postedby' href=\"$postedby\">$postedby</a>";
							if($postedto != $postedby) {
							echo "&nbsp writes on"; echo"<a href='$postedto'> $postedto </a>"; echo "'s wall";
							}
							else {
							echo " posted on his wall";
							}
						
						?></b><span style="margin-left: 10px; color: #666;
						font-size: 9pt;"><?php  echo $date; ?></span>
						
						 <a title='Delete This Post' onClick="return confirm('Are You Sure  to delete this post by <?php  echo "$postedby ?" ;  ?> ' ) " 
						 href='delete_posts.php?id=<?php  echo $row['id'] ?> '> <?php  if($postedby == "$user"||$postedto =="$user") { echo "&nbsp&nbsp <i class='icon-trash icon-black'> </i> </a>  </div> ";}
								
								else {
								
								echo "</a>";
								
								}
												
							?>
							</td>
					</tr>
					<tr>
						<td><?php  echo nl2br($post)."<hr>"?>  
							
							</table>
							<?php  //Comments ko number taken
							
							$get = mysql_query("SELECT * FROM comments WHERE post_id = $idg ORDER by id DESC");
							$count = mysql_num_rows($get)
							
							?>
							<?php  //get no likes for a post
							$getlikes = mysql_query("SELECT * FROM likes WHERE post_id = $idg ");
							$countlike = mysql_num_rows($getlikes);//this function counts the no
							
							?>
						 <button  class='btn btn-' title='See Comments below' > <?php   echo $count; ?> Comments </a> </button> &nbsp 
						
						
						<?php //like starts here
						$checklike = mysql_query("SELECT * FROM likes WHERE post_id = $idg AND user='$user'");
						$count = mysql_num_rows($checklike);
						if($count == 0) 
						{

						echo "<a href='like_this_post.php?id=$idg' title='Like This Post'> 
						<button class='btn btn-info' ><i class='icon-thumbs-up icon-black'></i> Like  </button> </a>"; 
						
						

						}
						else {
						echo "<a href='unlike_this_post.php?id=$idg' title='Unike This Post'> 
						<button  class='btn btn-success' ><i class='icon-thumbs-down icon-black'> </i> Unlike </button> </a>"; 
						
						}
						
						?>
						
						 <button  class='btn btn-warning' > <?php  echo $countlike  ?>
						  Likes This  </a> </button><br> <br> 
						<form action="#" method="POST">
						<textarea name="comment" rows="3" cols="35"></textarea><br />				
						<input type="submit" value="Add comment" name="submit" onclick="reloadPage()"/>
						</form>
						<hr>
						<h3>Recent Comments:</h3>
					<?php 
							
							$all_res = mysql_query("SELECT * FROM comments WHERE post_id = $idg ORDER by id DESC");
							
								while( $row = mysql_fetch_assoc($all_res)){
								$id = $row['id'];
								$body = $row['body'];
								$posted_by = $row['posted_by'];
								$date1 = $row['DATE'];
								
								
								
								$res = mysql_query("SELECT imagelocation FROM users WHERE username='$posted_by'");
								$img = mysql_fetch_assoc($res);
								$img = $img['imagelocation'];
								?>
								<table width="500px" border="0" style="margin: 10px 0; border-top: 1px solid #999; border-bottom: 1px solid #FFF;">
					<tr>
						<td width="55px" rowspan="2"><img src="<?php  echo $img; ?>" width="50px" />
						<td><b><?php  echo "<a href=\"$posted_by\">$posted_by</a>";  
												?> </b><span style="margin-left: 10px; color: #666; font-size: 9pt;"><?php  echo $date1; ?></span>
							<a title='Delete The Comment' onClick="return confirm('Are You Sure  to delete this post by <?php  echo "$postedby ?" ;  ?> ' ) " 
						 href='delete_comments.php?id=<?php  echo $row['id'] ?> '> <?php  if($postedby == "$user"||$postedto =="$user") { echo "&nbsp&nbsp <i class='icon-trash icon-black'> </i> </a>  </div> ";}
								
								else {
								
								echo "</a>";
								
								}
									?>
									
						</td>
					</tr>
					<tr>
						<td><?php  echo htmlentities($body); ?></td>
					</tr>
				</table>
			<?php 
			}
			}
			
	
	
	

		
		else {
		
		echo "<h2> <center> Sorry, the news doesn't exist. Click <a href='javascript: history.back()'>here</a> to go back";
		
		
		}
		
		?>
		
		




										<?php 
										
									
			if(@isset($_POST['submit'])) {
					$body = $_POST['comment'];
					$postedby = $user;
					$main_id = $idg;
					$postedto; //the person whose main post we are commenting
					$dated = date("d M Y \a\\t h:ia"); //this will enter date along with time
					
					
					
					
				
				if($body !==""){
				
				$qry = "INSERT INTO comments VALUES('','$main_id', '$body', '$postedby', '$postedto','$dated')";
				
				mysql_query($qry) or die("Cant insert comment. ". mysql_error());
				echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/friender/news_detail.php?id=$main_id\">"; //this helps in refreshing the page
				exit();
				
				
				?>
				
			<?php 

				}
				
				
				else {
				
				?>
				<script type="text/javascript">
				window.alert("You must type something before you can create any post");
				</script>
				<?php 
				}
			 


			}
						
										





			?>