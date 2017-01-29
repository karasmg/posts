<?php
namespace Posts\Controllers;

use Posts\Core\Controller;
use Posts\Core\View;
use Posts\Models\Model_Posts;

class Controller_Posts extends Controller
{

	function __construct()
	{
		$this->model = new Model_Posts();
		$this->view = new View();
	}
	
	function action_index()
	{
		$view = new View();
		$user = new Controller_User();
		$url = $user->action_login();

		$view->generate('posts_view.php', 'template_view.php', [
			'loginUrl' => $url,
		]);
	}

	function action_addpost()
	{
		$result = [
			'code' => 0,
			'data' => 'Неизвестная ошибка'
		];

		if( !isset($_SESSION['user_id']) ){
			$result['data'] = 'Необходимо авторизоваться';
			$result['code'] = 1;
			$this->output($result);
		}

		if ( !isset ($_REQUEST['message']) || !isset($_REQUEST['post_id']) ) {
			$result['data'] = 'Неверно переданы параметры';
			$result['code'] = 0;
			$this->output($result);
		}

		$post = [
			'p_text' => htmlspecialchars($_REQUEST['message'], ENT_QUOTES),
			'p_parent_id' => (int)$_REQUEST['post_id'],
		];
		$posts = new Model_Posts();
		$id = $posts->addPost($post);

		if( empty($id) ){
			$result['data'] = 'Не удалось сохранить сообщение';
			$result['code'] = 1;
			$this->output($result);
		}
		$this->output([
				'code' => 2,
				'data' => $id
		]);
	}

	function action_readposts()
	{
		$result = [
				'code' => 0,
				'data' => 'Неизвестная ошибка'
		];

		if(!isset ($_REQUEST['p_parent_id'])){
			$this->output([
					'code' => 0,
					'data' => 'Переданы не верные данные'
			]);
		}

		$model = new Model_Posts();
		$posts = $model->readPosts((int)$_REQUEST['p_parent_id']);


		$this->output([
				'code' => 2,
				'data' => $posts
		]);
	}


		private function output($rezult){
		echo json_encode($rezult);
		exit(0);
	}

	function action_read()
	{
		$data = $this->model->readMessages();

		echo $data;
	}

}
