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
		$data = $this->model->readMessages();
		$this->view->generate('posts_view.php', 'template_view.php', [
			'posts' => $data
		]);
	}

	function action_read()
	{
		$data = $this->model->readMessages();

		echo $data;
	}

}
