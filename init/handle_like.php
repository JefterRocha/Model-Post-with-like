<?php
	session_start();
	include_once "../functions/functions.php";
	$post_id = (int)$_GET['post_id'];
	$user_id = (int)$_SESSION['user_id'];
	
	if(!checkClicked($post_id, $user_id)){
		if(addLike($post_id, $user_id)){
			echo '1';
			
		}else{
			echo '0';
		}
	}else{
		if (removeLike($post_id, $user_id)){
			echo '1';
		}else{
			echo '0';
		}
	}
?>