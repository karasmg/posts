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
		$posts = new Model_Posts();
		$view = new View();
		$data = $posts->readMessages();
		$user = new Controller_User();
		$url = $user->action_login();

		$view->generate('posts_view.php', 'template_view.php', [
			'posts' => $data,
			'loginUrl' => $url,
		]);
	}

	function action_addpost()
	{
		$result = [
			'code' => 0,
			'data' => ''
		];

		if(!isset($_SESSION['user_id'])){
			$result['data'] = 'Необходимо авторизоваться';
			return false;
		}

		if ( !isset ($_REQUEST['message']) || !isset($_REQUEST['post_id']) ) {
			$result['data'] = 'Неверно переданы параметры';
			$result['code'] = 1;
			return false;
		}

		$post = [
			'message' => $_REQUEST['message'],
			'post_id' => $_REQUEST['post_id'],
		];

		$posts = new Model_Posts($post);
		$posts->addPost();


	}


	}

	function action_read()
	{
		$data = $this->model->readMessages();

		echo $data;
	}

}
