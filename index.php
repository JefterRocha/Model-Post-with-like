<?php
	session_start();
	$_SESSION['user_id'] = 1;
	include_once "functions/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="js/handle_like.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<title>Model Posts</title>
</head>
<body>
	<div class="container">
		<?php
			$posts = getPosts();
			if(count($posts) == 0){
		?>
			<div class="warning-content">
				<div class="warning">Não foram escontrado post em sua timeline</div>
			</div>
		<?php
			}else{
				foreach($posts as $post){
		?>
		<div class="post">
			<div class="content"><?php echo $post['content']?></div>
			<span class="num-likes <?php echo $post['user_liked']? 'clicked': ''?>" id="post-link<?php echo $post['post_id']?>"><?php echo $post['likes']?></span>
			<hr>
			<div class="interaction-components">
				<div href="" id='like-click<?php echo $post['post_id']?>' class="like" onclick='handleLike(<?php echo $post['post_id']?>)'>
					<?php echo $post['user_liked']? 'Descurtir' : 'Curtir'?>
				</div>
				<div href="" class="coment">Comentar</div>
			</div>
		</div>
		<?php
				}
			}
		?>
	</div>
</body>