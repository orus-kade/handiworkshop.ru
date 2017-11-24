<?php

class SiteController{

	public function actionIndex(){
		$products = array();
		$products = Product::getLatestProducts(6, 1);		
		require_once(ROOT.'/views/site/index.php');
		return true;
	}
	public function actionAbout(){
		require_once(ROOT.'/views/site/about.php');
		return true;
	}
	public function actionContacts(){
		require_once(ROOT.'/views/site/contacts.php');
		return true;
	}
}

?>