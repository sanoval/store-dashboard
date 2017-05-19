<?php

class App 
{

	protected $controller = '';
	protected $method 	  = 'index';
	protected $params 	  = array();


	public function __construct()
	{   
		$url = $this->parseUrl();

		if(file_exists('../app/controllers/'.$url[0].'.php'))
		{
			$this->controller = $url[0];
			unset($url[0]);
		}
		else
		{
			die('Controller <b>'.$url[0].'</b> not found!');
		}

		require_once '../app/controllers/'.$this->controller.'.php';

		$this->controller = new $this->controller;

		if(isset($url[1]))
		{
			if(method_exists($this->controller, $url[1]))
			{
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		$this->params = $url ? array_values($url) : array();

		call_user_func_array(array($this->controller, $this->method), $this->params);
	}

	public function parseUrl()
	{
		if(isset($_GET['url']))
		{
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
		else
		{
			return $url = explode('/', filter_var(rtrim('home/index', '/'), FILTER_SANITIZE_URL));
		}
	}
}