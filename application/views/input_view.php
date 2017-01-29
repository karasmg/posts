            <div class="col-md-12 post">
                <p style="float: right"><?=$_SESSION['email']?></p>
                <form class="comment-form form-horizontal" role="form">
                    <input type="hidden" class="post_id" name="post_id" value="0">
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label for="inputText" class="control-label">Текст сообщения</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control message" name="message" id="inputText" placeholder="Сообщение">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button class="btn btn-default">Отправить</button>
                        </div>
                    </div>
                </form>
            </div>