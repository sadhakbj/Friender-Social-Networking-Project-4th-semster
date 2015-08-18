<?php
include_once("inc/incfiles/header1.php");
if (!$user){
	header("location:index.php");
	exit();
	}

?>

<?php 

if( isset($_GET['id']) && is_numeric($_GET['id']) ){

	$row = mysql_query("SELECT * FROM comments WHERE id={$_GET['id']}");
	
	
	if(mysql_num_rows($row)==1){

		$rows = mysql_fetch_assoc($row);
		
		$postedby = $rows['posted_by'];
		$postedto = $rows['posted_to'];
		$parent_id = $rows['post_id'];
		

		if($postedby||$postedto=="$user")
		{
			echo "you can delete";
			
			mysql_query("DELETE FROM comments WHERE id ='{$_GET['id']}'") or die("Cannot delete post: ".mysql_error());
			header("Location: news_detail.php?id=$parent_id");
			exit;
		}

	}
	else{
		
		header("Location: news_detail.php?id=$parent_id");
		exit;
	}
}
	?>