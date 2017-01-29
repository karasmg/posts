<script>
			$(document).ready(function () {

				load_posts();
				//Показать блок формы-комментирования
				$('body').on('click', '.post_comment', function (e) {
					var current_post_id = $(this).closest('.post').find('.post_id').val();
					load_posts(current_post_id);
					$(this).closest('.this-node').find('.message').val('');
					$(this).closest('.this-node').children('.comment-form').toggle();
					e.preventDefault();
				});


				$('body').on('submit', '.comment-form-tmp', function (e) {
					$('.comment-form-tmp').hide();
				});

				$('body').on('submit', '.comment-form', function (e) {
					return false;
				});

				$('body').on('click', '.post_show_comments', function (e) {
					var current_post_id = $(this).closest('.post').find('.post_id').val();
					load_posts(current_post_id);
				//	$(this).closest('.post').children('.post').toggle();
					e.preventDefault();
				});

				$('body').on('click', '.comment-form .btn', function () {
					var post = $(this).closest('.comment-form').serialize();
					var obj = $(this);
					$.ajax({
						type: 'POST',
						cache: false,
						url: '/posts/addpost',
						data: post,
						success: function (data) {
							render_result(obj, data);
						}
					});
				});
			});

	var load_posts = function(parent_id=0){
		var post;
		$.ajax({
			type: 'GET',
			cache: false,
			dataType: 'json',
			url: '/posts/readposts?p_parent_id='+parent_id,
			data: post,
			success: function (data) {
				var response = data;

				if ($.inArray(response.code, [0, 1, 2, 3]) ) {

					switch (response.code) {
						case 0:
							console.log(response.data);
							break;
						case 1:
							alert(response.data);
							break;
						case 2:
							try {
								var posts = JSON.parse(response.data);
							} catch (e) {
								alert('Ошибка связи с сервером');
								return;
							}

							for(var i=0; i<posts.length; i++) {
								var parent_post = $('input[value="'+parent_id+'"]').closest('.post');
								if( parent_post.find('input[value="'+posts[i]["p_id"]+'"]').length > 0 ){
									console.log('edit');
									var new_post = $('input[value="'+posts[i]["p_id"]+'"]').closest('.post');
								} else {
									if(parent_id == 0) {
										console.log('before');
										var new_post = $('<div class="post">').insertAfter(parent_post.find('.comment-form').first());
									}
									else {
										console.log('after');
										var new_post = $('<div class="post">').appendTo(parent_post);
									}
								}
								new_post.loadTemplate("#template", {
									post: posts[i]["p_text"]
								});
								new_post.find('.post_id').val(posts[i]["p_id"]);
								new_post.show();
							}
							break;

					}
				}
			}
		});
	}

	/*
	*
	* @obj -
	* @data -
	* @return -
	*/
	var render_result = function(obj, data) {//obj - объект jquery, не null, не undefined
		try {
			var response = JSON.parse(data);
		} catch (e) {
			alert('Сообщение не удалось отправить на сервер');
			return;
		}

		if ($.inArray(response.code, [1, 2, 3]) ) {
			console.log('код = '+response.code);
			switch (response.code) {
				case 0:
					console.log(response.data);
					break;
				case 1:
					alert(response.data);
					location.reload();
					break;
				case 2:
					var new_post = $('<div class="post">').appendTo(obj.closest('.post'));
					new_post.loadTemplate("#template", {
						post: obj.closest('.comment-form').find('.message').val()
					});
					new_post.find('.post_id').val(response.data);
					new_post.show();
					break;
			}
		}
	}
</script>
<script type="text/html" id="template">
	<div class="this-node">
		<p class="post_text" data-content="post"></p>
		<p><a href="#"><span class="post_show_comments">Показать комментарии</span> </a> / <a href="#"><span class="post_comment">Ответить</span></a></p>
		<form class="comment-form comment-form-tmp">
			<input type="hidden" name="post_id" class="post_id">
			<input class="message" type="text" autofocus name="message">
			<button type="submit" class="btn">Отправить</button>
		</form>
	</div>
</script>
<div class="section">
	<div class="container">
		<div class="row">

<?php
if( !isset($_SESSION['email']) ){
	$this->generate('login_view.php', null, $data);
} else {
	$this->generate('input_view.php');
}

?>
		</div>
	</div>
</div>