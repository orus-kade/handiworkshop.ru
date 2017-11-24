<?php
class AdminController extends AdminBase{
	public static function actionIndex(){
		self::checkAdmin();
		require_once(ROOT.'/views/admin/index.php');
		return true;
	}
}
?>