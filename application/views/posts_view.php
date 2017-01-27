<script>
	var init_posts = <?=$data['posts'].';';?>
			$(document).ready(function () {

				//Показать блок формы-комментирования
				$('body').on('click', '.post_comment', function (e) {
					$(this).closest('.this-node').children('.comment-form').toggle();
					e.preventDefault();
				});

				$('body').on('click', '.post_show_comments', function (e) {
					$(this).closest('.post').children('.post').toggle();
					e.preventDefault();
				});


				$('body').on('click', '.comment-form button', function () {
					var post = $(this).closest('.comment-form').serialize();
					var obj = $(this);
					$.ajax({
						type: 'POST',
						cache: false,
						url: '/posts/addpost',
						data: post,
						success: function (data) {
							var response =  JSON.parse(data);
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
								default:
									alert(response);
							}
							//post_id = data.post_id;
						}
					});

				});

			});
</script>
<script type="text/html" id="template">
	<div class="this-node">
		<p class="post_text" data-content="post">Сам текст сообщения</p>
		<p><a href="#"><span class="post_show_comments">Показать комментарии</span> </a> / <a href="#"><span class="post_comment">Ответить</span></a></p>
		<form class="comment-form">
			<input type="hidden" name="post_id" class="post_id">
			<input class="message" type="text" name="message">
			<button>Отправить</button>
		</form>
	</div>
</script>
<?php
if( !isset($_SESSION['email']) ){
	$this->generate('login_view.php', null, $data);
} else {
	$this->generate('input_view.php');
}

?>
