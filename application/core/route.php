<?php
namespace Posts\Core;
/**
 * Класс-маршрутизатор для определения запрашиваемой страницы.
 * создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
 */
use Posts\Controllers\Controller_posts;
class Route
{

	static function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';

		$request = explode('?', $_SERVER['REQUEST_URI']);
		$request = $request[0];
		$routes = explode('/', $request);

		// получаем имя контроллера
		if ( !empty($routes[1]) )
			$controller_name = $routes[1];
		
		// получаем имя экшена
		if ( !empty($routes[2]) )
			$action_name = $routes[2];

		// добавляем префиксы
		$controller_name = '\Posts\Controllers\Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		if( !class_exists($controller_name) )
			Route::ErrorPage404();

		$controller = new $controller_name;
		$action = $action_name;
		
		if( !method_exists($controller, $action) )
			Route::ErrorPage404();

		$controller->$action();
	}

	static function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
    
}
