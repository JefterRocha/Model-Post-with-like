const handleLike = (post_id) => {
	const likeHolder = document.querySelector('#post-link' + post_id)
	const btnLike = document.querySelector('#like-click'+post_id)
	if (!likeHolder.classList.contains('clicked')) {
		likeHolder.textContent = parseInt(likeHolder.textContent) + 1
		likeHolder.classList.add('clicked')
		btnLike.textContent = 'Descurtir'
	} else {
		likeHolder.textContent = parseInt(likeHolder.textContent) - 1
		likeHolder.classList.remove('clicked')
		btnLike.textContent = 'Curtir'
	}

	fetch('init/handle_like.php?post_id=' + post_id)
		.then(response => response.text())
		.then(response => {
			response ? getLikeState(post_id) : alert("Error while trying to like a post")
		})
}

const getLikeState = (post_id) => {
	fetch('init/get_like.php?post_id=' + post_id)
		.then(response => response.text())
		.then(response => {
			document.querySelector('#post-link' + post_id).textContent = response
		})
}