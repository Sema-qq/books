<?php

/**
* 
*/
class Router
{
	/**
	* массив с маршрутами
	* @var array
	*/
	private $routes;

	public function __construct()
	{
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = include($routesPath);
	}

	/**
	* Получаем строку запроса
	* @return string
	*/
	private function getUri()
	{
		if (!empty($_SERVER['REQUEST_URI'])) {
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	public function run()
	{
		#получить строку запроса
		$uri = !empty($this->getUri()) ? $this->getUri() : '/'; 
		#проверить наличие такого запроса в routes.php
		foreach ($this->routes as $uriPattern => $path) {
			#провеяем на совпадение в маршрутах
			if (preg_match("~$uriPattern~", $uri)) {
				#получаем внутренний путь из внешнего согласно правилу
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
				//разбиваем в массив
				$segments = explode('/', $internalRoute);
				//получаем имя контроллера
				$controllerName = ucfirst(array_shift($segments).'Controller');
				//получаем имя экшена
				$actionName = 'action'.ucfirst(array_shift($segments));
				//остальное это параметры
				$parameters = $segments;
				#подключить файл класс-контроллера
				$controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
				if (file_exists($controllerFile)) {
					include_once($controllerFile);
					#создать объект вызвать метод (т.е. экшен)
					$controllerObject = new $controllerName;					
				}
				$result = call_user_func_array([$controllerObject, $actionName], $parameters);
				if ($result != null) {
					break;
				}				
			}
		}
	}
}