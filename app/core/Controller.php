<?php

class Controller
{
	protected function model($model)
	{
		require_once '../app/models/'.$model.'.php';
		return new $model;
	}

	protected function view($view, $data = array())
	{
		require_once '../app/views/'.$view.'.php';
	}

	protected function controllers($controllerName) {
		require_once '../app/controllers/'.$controllerName.'.php';
	}
}