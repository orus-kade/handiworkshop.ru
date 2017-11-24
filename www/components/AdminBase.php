<?php
abstract class AdminBase{
	public static function checkAdmin(){
		$userId = User::checkLogged();
		$user = User::getUserById($userId);
		if ($user['admin']){
			return true;
		}
		die("Доступ запрещен");
	}
}
?>