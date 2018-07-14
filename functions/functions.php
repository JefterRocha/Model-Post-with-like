<?php
	function conn(){
		$conn = new mysqli('localhost', 'root', '', 'social_media_db');
		if (mysqli_connect_errno()) {
			printf('Connect failed: ', mysqli_connect_error());
			exit();
		}
		return $conn;
	}

	function getPosts(){
		$datas = array();
		$mysqli = conn();
		if($posts = $mysqli->query("SELECT post_id, content, likes FROM posts")){
			while($row = $posts->fetch_object()){
				$datas[] = array(
					'post_id' => $row->post_id,
					'content' => $row->content,
					'likes' => $row->likes
				);
			}
			$posts->close();	
			return $datas;		
		}
		$mysqli->close();
	}
	
	function checkClicked($post_id, $user_id){
		$mysqli = conn();
		$post_id = (int)$post_id;
		$user_id = (int)$user_id;
		if($check = $mysqli->query("SELECT like_id FROM likes WHERE user_id = $user_id AND post_id = $post_id")){
			return $check->num_rows >= 1 ? true : false;
			$check->close();
		}
		$mysqli->close();
	}
	
	
	function addLike($post_id, $user_id){
		$mysqli = conn();
		$post_id = (int)$post_id;
		$user_id = (int)$user_id;
		if($update_likes = $mysqli->query("UPDATE posts SET likes = likes+1 WHERE post_id = $post_id")){
			$insert_like = $mysqli->query("INSERT INTO likes (user_id, post_id) VALUES ($user_id, $post_id)");
			if($insert_like){
				return true;
				$update_likes->close();
				
			}else{
				return false;
				$update_likes->close();
				
			}
		}
		$mysqli->close();
	}

	function removeLike($post_id, $user_id){
		$mysqli = conn();
		$post_id = (int)$post_id;
		$user_id = (int)$user_id;
		if($update_likes = $mysqli->query("UPDATE posts SET likes = likes-1 WHERE post_id = $post_id")){
			$delete_like = $mysqli->query("DELETE FROM likes WHERE user_id = $user_id AND post_id = $post_id");
			if($delete_like){
				return true;
				$update_likes->close();
				
			}else{
				return false;
				$update_likes->close();
				
			}
		}
		$mysqli->close();
	}
	
	function getLikes($post_id){
		$mysqli = conn();
		$post_id = (int)$post_id;
		$select_num_likes = $mysqli->query("SELECT likes FROM posts WHERE post_id = '$post_id'");
		$fetch_likes = $select_num_likes->fetch_object();
		return $fetch_likes->likes;
		$select_num_likes->close();
		$mysqli->close();
	}
?>