<script>
$(document).ready(function(){

    //Показать блок формы-комментирования
    $('body').on('click', '.post_comment' ,function(){
        $(this).closest('.this-node').children('.comment-form').toggle();
    });

    $('body').on('click', '.post_show_comments', function(){
        $(this).closest('.post').children('.post').toggle();
    });

    $('body').on('click', '.comment-form button',function(){
        var new_post = $('<div class="post">').appendTo((this).closest('.post'));
        new_post.loadTemplate("#template", {
            post: $(this).closest('.comment-form').children('input').val()
        });
        new_post.show();
    });


});
</script>
<script type="text/html" id="template">
        <div class="this-node">
            <p class="post_text" data-content="post">Сам текст сообщения</p>
            <p><a href="#"><span class="post_show_comments">Показать комментарии</span> </a> / <a href="#"><span class="post_comment">Ответить</span></a></p>
            <div class="comment-form">
                <input type="text">
                <button>Отправить</button>
            </div>
        </div>
</script>

<div class="post">
    <div class="this-node">
            <p class="post_text">Сам текст сообщения</p>
            <p><a href="#"><span class="post_show_comments">Показать комментарии</span> </a> / <a href="#"><span class="post_comment">Ответить</span></a></p>
        <div class="comment-form">
            <input type="text">
            <button>Отправить</button>
        </div>
    </div>
</div>
