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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/handle_like.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<title>Model Posts</title>
</head>
<body>
	<div class="container">
		<?php
			$posts = getPosts();
			if(count($posts) == 0){
				echo 'Desculpe, mais não foram encontrados posts no banco de dados';
			}else{
				foreach($posts as $data){
		?>
		<div class="post">
			<div class="content"><?php echo $data['content']?></div>
			<span class="num-likes" id="post-link<?php echo $data['post_id']?>"><?php echo $data['likes']?></span>
			<hr>
			<div class="interaction-components">
				<a href="" class="like" onclick='handle_like(<?php echo $data['post_id']?>)'>Curtir</a>
				<a href="" class="coment">Comentar</a>
			</div>
		</div>
			<?php
				}
			}?>
	</div>
</body>
