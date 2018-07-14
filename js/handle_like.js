function handle_like(post_id) {

	$.post('init/handle_like.php', {
		post_id: post_id
	}, function (datas) {
		if (datas == 'sucess') {
			get_like(post_id);

		} else {
			alert("Error while trying to like a post");
		}
	});
}

function get_like(post_id) {
	$.post('init/get_like.php', {
		post_id: post_id
	}, function (value) {
		$('#post-link' + post_id).text(value);
	});
}