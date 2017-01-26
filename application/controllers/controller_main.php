<?php
namespace Posts\Controllers;

use Posts\Core\Controller;

class Controller_Main extends Controller
{

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
}