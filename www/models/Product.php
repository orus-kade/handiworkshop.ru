<?php
class Product{
	public static function getLatestProducts($count, $page){
		$count = intval($count);
		$offset = ($page-1)*$count;
		$db = Db::getConnection();
		$productsList = array();
		$query = "SELECT id, title, price, is_new FROM products WHERE visible = 1 ORDER BY id DESC LIMIT ".$count." OFFSET " . $offset;
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$i = 0;
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$productsList[$i]['id']=$row['id'];
			$productsList[$i]['title']=$row['title'];
			$productsList[$i]['price']=$row['price'];
			$productsList[$i]['is_new']=$row['is_new'];
			$i++;
		}
		return $productsList;
	}

	public static function getProductsByCategory($categoryId, $page, $count){
		$db = Db::getConnection();
		$productsList = array();
		$offset = ($page-1)*$count;
		$query = "SELECT id, title, price, is_new FROM products WHERE visible = 1 AND category = ". $categoryId." ORDER BY id DESC LIMIT ".$count." OFFSET " . $offset;
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$i = 0;
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$productsList[$i]['id']=$row['id'];
			$productsList[$i]['title']=$row['title'];
			$productsList[$i]['price']=$row['price'];
			$productsList[$i]['is_new']=$row['is_new'];
			$i++;
		}
		return $productsList;
	}

	public static function getProductById($productId){
		$db = Db::getConnection();
		$productsList = array();
		$query = "SELECT * FROM products WHERE id =".$productId;
		$result= mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$product['id']=$row['id'];
			$product['title']=$row['title'];
			$product['price']=$row['price'];
			$product['is_new']=$row['is_new'];
			$product['description']=$row['description'];
			$product['category']=$row['category'];
			$product['visible']=$row['visible'];
		return $product ;
	}

	public static function getTotalProductsInCategory($categoryId){
		$db = Db::getConnection();
		$query = "SELECT count(id) AS count FROM products WHERE visible = 1 AND category = ". $categoryId;
		$result= mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$count = mysqli_fetch_array($result, MYSQLI_ASSOC)['count'];
		return $count;
	}	

	public static function getCountProductsInCategory($categoryId){
		$db = Db::getConnection();
		$query = "SELECT count(id) AS count FROM products WHERE  category = ". $categoryId;
		$result= mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$count = mysqli_fetch_array($result, MYSQLI_ASSOC)['count'];
		return $count;
	}

	public static function getTotalProducts(){
		$db = Db::getConnection();
		$query = "SELECT count(id) AS count FROM products WHERE visible = 1";
		$result= mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$count = mysqli_fetch_array($result, MYSQLI_ASSOC)['count'];
		return $count;
	}
	public static function getProductsById($productsIds){
		$products = array();
		$db = Db::getConnection();
		$ids = implode(',', $productsIds);
		$query = "SELECT * FROM products WHERE id IN ($ids)";
		$result= mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$i = 0;
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$products[$i]['id']=$row['id'];
			$products[$i]['title']=$row['title'];
			$products[$i]['price']=$row['price'];

			$i++;
		}
		return $products;
	}	
	public static function getAllProducts(){
		$products = array();
		$db = Db::getConnection();
		$query = "SELECT id, title, price, visible FROM products";
		$result= mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$i = 0;
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$products[$i]['id']=$row['id'];
			$products[$i]['title']=$row['title'];
			$products[$i]['price']=$row['price'];
			$products[$i]['visible']=$row['visible'];
			$products[$i]['count']=self::countOrdersOfProductById($products[$i]['id']);
			$i++;
		}
		return $products;
	}
	public static function getAllProductsInCategory($categoryId){
		$products = array();
		$db = Db::getConnection();
		$query = "SELECT id, title, price, visible FROM products WHERE category = $categoryId";
		$result= mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$i = 0;
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$products[$i]['id']=$row['id'];
			$products[$i]['title']=$row['title'];
			$products[$i]['price']=$row['price'];
			$products[$i]['visible']=$row['visible'];
			$products[$i]['count']=self::countOrdersOfProductById($products[$i]['id']);
			$i++;
		}
		return $products;
	}
	public static function newProduct($newProduct){
		$db = Db::getConnection();
		$id = false;
		$query = "INSERT INTO products (title, price, description, category, is_new, visible) VALUES ('{$newProduct['title']}', {$newProduct['price']}, '{$newProduct['description']}', {$newProduct['category_id']}, {$newProduct['is_new']}, {$newProduct['visible']} )";
		$result= mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		if ($result){
			$query = "SELECT id FROM products WHERE id=LAST_INSERT_ID()";
			$result= mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
			$result = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$id = $result['id'];
		}
		return $id;
	}
	public static function deleteProductById($id){
		$db = Db::getConnection();
		$query = "DELETE FROM products WHERE id = '$id'";
		$result= mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$filename = ROOT.'/images/products/product'.$id.'.jpg';
		if (file_exists($filename)){
			unlink($filename);
		} 
		return $result;

	}
	public static function editProductById($id, $product){
		$db = Db::getConnection();
		$query = "UPDATE products SET title = '{$product['title']}', price = {$product['price']}, category = {$product['category']}, description = '{$product['description']}', is_new = {$product['is_new']}, visible = {$product['visible']}  WHERE id = $id";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		return $result;
	}
	public static function countOrdersOfProductById($id){
		$db = Db::getConnection();
		$query = "SELECT count FROM orders_products WHERE product_id = $id";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$totalCount = 0;
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$totalCount+=$row['count'];
		}
		return $totalCount;
	}
}

?>
