<?php
class CabinetController{
	public static function actionIndex(){
		$userId = User::checkLogged();
		$user=User::getUserById($userId);
		require_once(ROOT.'/views/cabinet/index.php');
		return true;
	}

	public static function actionEdit(){
		$userId = User::checkLogged();
		$user=User::getUserById($userId);
		$name = $user['name'];
		$password = "";
		$ph_number = $user['ph_number'];
		$result = false;
		if (isset($_POST['submit'])){
			if ($_POST['name']!="")
				$name = $_POST['name'];
			if ($_POST['newPassword']!="")
				$password = $_POST['newPassword'];
			if ($_POST['phone']!="")
				$ph_number = $_POST['phone'];
			$result = User::edit($userId, $name, $ph_number, $password);
		}
		require_once (ROOT.'/views/cabinet/edit.php');
		return true;
	}
}
?>