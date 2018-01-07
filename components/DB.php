<?php

/**
* 
*/
class DB
{
	/**
	* метод подключения к бд
	* @return onject
	*/
	public static function getConnection()
	{
		$params = include(ROOT.'/config/db_params.php');

		$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";

		return new PDO($dsn, $params['user'], $params['password']);
	}
}