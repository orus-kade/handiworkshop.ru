<?php 
class CartController{
	public function actionAddAjax($id){
		echo Cart::addProduct($id);
		return true;
	}
	public function actionIndex(){
		$productsInCart = false;

		$productsInCart = Cart::getProducts();
		if ($productsInCart){
			$productsIds = array_keys($productsInCart);
			$products = Product::getProductsById($productsIds);
			$totalPrice = Cart::getTotalPrice($products);
		}

		require_once (ROOT.'/views/cart/index.php');
		return true;
	}
	public function actionDelete($id){
		Cart::deleteProduct($id);
		header("Location: /cart");
	}
	public function actionDeleteAll(){
		$productsInCart = Cart::clear();		
		header("Location: /cart");
	}
	public function actionCheckout(){
		if (isset($_SESSION['products'])){
			$_SESSION['checkout'] = true;
			if (User::isGuest()){
				header("Location: /user/login/");
			}
			else{
				$result = false;
				unset($_SESSION['checkout']);	
				$userId = User::checkLogged();	
				$user = User::getUserById($userId);	
				$userName = $user['name'];
				$userPhone = $user['ph_number'];
				$productsInCart = Cart::getProducts();
				$productsIds = array_keys($productsInCart);
				$products = Product::getProductsById($productsIds);
				$totalPrice = Cart::getTotalPrice($products);
				$totalCount = Cart::getTotalCount();
				if (isset($_POST['submit'])){
					$userName = $_POST['name'];
					$userPhone = $_POST['phone'];
					$result = Order::save($userName, $userPhone, $userId, $productsInCart);
					if($result){
						Cart::clear();
					}					
				}	
				require_once (ROOT.'/views/cart/checkout.php');
				return true;
			}
		}
		else{
			header("Location: /cart/");
		}
	}
}
?>