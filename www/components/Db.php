<?php

class Db
{

		public static function getConnection()
		{
			$paramsPath = ROOT . '/config/db_params.php';
			$params = include($paramsPath);


			$db = mysqli_connect($host, $user, $password, $database)  or die("Ошибка " . mysqli_error($link));


			/*$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
			$db = new PDO($dsn, $params['user'], $params['password']);
			*/
			return $db;
		}
}