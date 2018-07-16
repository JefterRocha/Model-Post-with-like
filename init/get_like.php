<?php
	include_once "../functions/functions.php";
	$post_id = (int)$_GET['post_id'];
	$num_likes = getLikes($post_id);
	echo $num_likes;
?>