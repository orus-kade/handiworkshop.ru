<?php 
class Cart{
	public static function addProduct($id){
		//товары хранятся в массиве. Ключ - id товара, значение - количество товара
		$productsInCart = array();
		if (isset($_SESSION['products'])){
			$productsInCart = $_SESSION['products'];
		}
		if (array_key_exists($id, $productsInCart)){
			$productsInCart[$id]++;
		}
		else {
			$productsInCart[$id]=1;
		}
		$_SESSION['products'] = $productsInCart;
		return self::countItems();
		}
	public static function countItems(){
		if (isset($_SESSION['products'])){
			$count = 0;
			foreach ($_SESSION['products'] as $id => $quantity) {
				$count += $quantity;
			}
			return $count;
		}
		else{
			return 0;
		}
	}
	public static function getProducts(){
		if (isset($_SESSION['products'])){
			return $_SESSION['products'];
		}
		return false;
	}
	public static function getTotalPrice($products){
		$productsInCart = self::getProducts();
		$total = 0;
		if ($productsInCart){
			foreach ($products as $product) {
				$total += $product['price'] * $productsInCart[$product['id']];
			}
		}
		return $total;

	}
	public static function getTotalCount(){
		$total = 0;
		if (isset($_SESSION['products'])){			
			foreach ($_SESSION['products'] as $id => $quantity) {
                $total = $total + $quantity;
			}
		}
		return $total;
	}
	public static function deleteProduct($id){
		$productsInCart = self::getProducts();
		$productsInCart[$id]--;
		if ($productsInCart[$id]<=0){
			unset($productsInCart[$id]);
		}
		$_SESSION['products'] = $productsInCart;
	}

	public static function clear(){
		if (isset($_SESSION['products'])){
			unset($_SESSION['products']);
		}
	}
}
?>