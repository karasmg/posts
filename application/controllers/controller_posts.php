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

	function action_read()
	{
		$data = $this->model->readMessages();

		echo $data;
	}

}
