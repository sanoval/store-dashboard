<?php
define('base_url', 'http://'.$_SERVER['SERVER_ADDR'].'/store-dashboard/public/');
spl_autoload_register(function($class)
{
	require_once "core/{$class}.php";
});