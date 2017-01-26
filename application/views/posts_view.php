<script>
	var init_posts = <?=$data['posts'].';';?>
			$(document).ready(function(){

				//Показать блок формы-комментирования
				$('body').on('click', '.post_comment', function(e){
					$(this).closest('.this-node').children('.comment-form').toggle();
					e.preventDefault();
				});

				$('body').on('click', '.post_show_comments', function(e){
					$(this).closest('.post').children('.post').toggle();
					e.preventDefault();
				});


				$('body').on('click', '.comment-form button', function(){
					var post = $('.comment-form').serialize();
					var post_id;
					$.ajax({
						type: 'POST',
						cache: false,
						url: '/posts/addpost',
						data: post,
						success: function (data) {
							alert(data);
							//post_id = data.post_id;
						}
					});
						var new_post = $('<div class="post" data-postid = "'+post_id+'">').appendTo($(this).closest('.post'));
						new_post.loadTemplate("#template", {
							post: $(this).closest('.comment-form').find('.message').val()
						});
						new_post.show();
					});

			});
</script>
<script type="text/html" id="template">
	<div class="this-node">
		<p class="post_text" data-content="post">Сам текст сообщения</p>
		<p><a href="#"><span class="post_show_comments">Показать комментарии</span> </a> / <a href="#"><span class="post_comment">Ответить</span></a></p>
		<form class="comment-form">
			<input type="hidden" name="post_id">
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
