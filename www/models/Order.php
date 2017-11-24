<?php
class Order{
	public static function save($userName, $userPhone, $userId, $productsInCart){
		$db = Db::getConnection();
		$query = "UPDATE users SET name = '$userName', ph_number = '$userPhone' WHERE id = '$userId'";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));

		$query = "INSERT INTO orders (user_id) VALUES ('$userId')";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));

		$query = "SELECT LAST_INSERT_ID() as last FROM orders";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$orderId = mysqli_fetch_array($result, MYSQLI_ASSOC)['last'];

		foreach ($productsInCart as $product => $quantity) {
			$query = "INSERT INTO orders_products (order_id, product_id, count) VALUES ('$orderId', '$product', '$quantity')";
			$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		}
		return $result;
	}
	public static function getOrders(){
		$db = Db::getConnection();
		$orders = array();
		$query = "SELECT orders.id, user_id, time, name, ph_number, status  FROM orders JOIN  users ON orders.user_id = users.id";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$i = 0;
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$orders[$i]['time'] = $row['time'];
			$orders[$i]['user_id'] = $row['user_id'];
			$orders[$i]['name'] = $row['name'];
			$orders[$i]['ph_number'] = $row['ph_number'];
			$orders[$i]['id'] = $row['id'];
			$orders[$i]['status'] = $row['status'];
			$orders[$i]['totalPrice'] = self::totalPriceOrder($orders[$i]['id']);
			$i++;
		}
		return $orders;
	}
	public static function getOrdersUser($userId){
		$db = Db::getConnection();
		$orders = array();
		$query = "SELECT orders.id, user_id, time, name, ph_number, status  FROM orders JOIN  users ON orders.user_id = users.id WHERE user_id = $userId";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$i = 0;
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$orders[$i]['time'] = $row['time'];
			$orders[$i]['user_id'] = $row['user_id'];
			$orders[$i]['name'] = $row['name'];
			$orders[$i]['ph_number'] = $row['ph_number'];
			$orders[$i]['id'] = $row['id'];
			$orders[$i]['status'] = $row['status'];
			$orders[$i]['totalPrice'] = self::totalPriceOrder($orders[$i]['id']);
			$i++;
		}
		return $orders;
	}
	public static function getTextStatus($status){
		switch ($status) {
			case '1':
				return "Новый заказ";
				break;
			case '2':
				return "Выполняется";
				break;
			case '3':
				return "Готов к доставке";
				break;
			case '4':
				return "Выполнен";
				break;
		}
	}
	public static function deleteOrderById($id){
		$db = Db::getConnection();
		$query = "DELETE FROM orders_products WHERE order_id = $id";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$query = "DELETE FROM orders WHERE id = $id";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		return $result;
	} 
	public static function gerOrdersByUserId($userId){
		$db = Db::getConnection();
		$orders = array();
		$query = "SELECT id, time, status  FROM orders WHERE user_id = $userId";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$i = 0;
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$orders[$i]['id'] = $row['id'];
			$orders[$i]['time'] = $row['time'];
			$orders[$i]['status'] = $row['status'];
			$orders[$i]['productsCount'] = self::countProductsInOrder($orders[$i]['id']);
			$orders[$i]['products'] = self::productsInOrder($orders[$i]['id']);
			$orders[$i]['totalPrice'] = self::totalPriceOrder($orders[$i]['id']);
			$i++;
		}
		return $orders;
	}
	public static function countProductsInOrder($orderId){
		$db = Db::getConnection();
		$query = "SELECT count(*) as count FROM orders_products WHERE order_id = $orderId";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		return mysqli_fetch_array($result, MYSQLI_ASSOC)['count'];

	}
	public static function productsInOrder($orderId){
		$db = Db::getConnection();
		$query = "SELECT orders_products.id, product_id, count, title, price FROM orders_products JOIN products ON orders_products.product_id = products.id WHERE order_id = $orderId";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$i = 0;
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$products[$i]['id'] = $row['id'];
			$products[$i]['product_id'] = $row['product_id'];
			$products[$i]['count'] = $row['count'];
			$products[$i]['title'] = $row['title'];
			$products[$i]['price'] = $row['price'];
			$products[$i]['totalPrice'] = $products[$i]['price']*$products[$i]['count'];
			$i++;
		}
		return $products;
	}
	public static function totalPriceOrder($orderId){
		$db = Db::getConnection();
		$query = "SELECT count, price FROM orders_products JOIN products ON orders_products.product_id = products.id WHERE order_id = $orderId";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$total = 0;
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$total += $row['price']*$row['count'];
		}
		return $total;

	}
	public static function editOrderProduct($id, $count){
		$db = Db::getConnection();
		$query = "UPDATE orders_products SET count = $count WHERE id = $id";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		return $result;
	}
	public static function countOrdersByUserId($id){
		$db = Db::getConnection();
		$query = "SELECT count(*) as count FROM orders WHERE user_id = $id";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		return mysqli_fetch_array($result, MYSQLI_ASSOC)['count'];
	}
	public static function getOrderById($id){
		$db = Db::getConnection();
		$order = array();
		$query = "SELECT orders.id, time, status, user_id, name, ph_number, email  FROM orders JOIN users ON orders.user_id = users.id WHERE orders.id = $id";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$i = 0;
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$order['id'] = $row['id'];
			$order['time'] = $row['time'];
			$order['status'] = $row['status'];
			$order['user_id'] = $row['user_id'];
			$order['name'] = $row['name'];
			$order['email'] = $row['email'];
			$order['ph_number'] = $row['ph_number'];			
			$order['productsCount'] = self::countProductsInOrder($order['id']);
			$order['products'] = self::productsInOrder($order['id']);
			$order['totalPrice'] = self::totalPriceOrder($order['id']);
			$i++;		
		return $order;
	}
	public static function editOrderStatus($id, $status){
		$db = Db::getConnection();
		$query = "UPDATE orders SET status = $status WHERE id = $id";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		return $result;
	}
	public static function getIdByProduct($id){
		$db = Db::getConnection();
		$query = "SELECT order_id FROM orders_products WHERE id = $id";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		return mysqli_fetch_array($result, MYSQLI_ASSOC)['order_id'];
	}
	public static function deleteProduct($id){
		$db = Db::getConnection();
		$query = "DELETE FROM orders_products WHERE id = $id";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		return $result;
	}
}
?>
