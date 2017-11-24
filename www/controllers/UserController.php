<?php
class UserController{
	public static function actionRegister(){
		$name = '';
		$email = '';
		$password = '';
		$error = false;
		$result = false;
		if (isset($_POST['submit'])){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			if (User::checkEmailExists($email)){
				$error = 'Такой email уже используется!';
			}
			if ($error == false){
				$result = User::register($name, $email, $password);
			}
		}
		require_once (ROOT.'/views/user/register.php');
		return true;
	}
	public static function actionLogin(){
		$email = '';
		$password = '';
		$error = false;
		if (isset($_POST['submit'])){
			$email = $_POST['email'];
			$password = $_POST['password'];
			$userId = User::checkUserData($email, $password);
			if (!$userId){
				$error = 'Неправильный email или пароль!';
			}
			else {
				User::authorization($userId);
				if (isset($_SESSION['checkout'])){
					header("Location: /cart/checkout/");
				}
				else{
					header("Location: /cabinet/");
				}				
			}		
		}
		require_once (ROOT.'/views/user/login.php');
		return true;
	}
	public static function actionLogout(){
		unset($_SESSION['user']);
		header("Location: /");		
	}
	public static function actionOrders(){
		$userId = User::checkLogged();
		$user=User::getUserById($userId);
		$orders = Order::gerOrdersByUserId($userId);
		require_once (ROOT.'/views/user/orders.php');
		return true;
	}
}
?>