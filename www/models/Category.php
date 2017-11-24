<?php	
class Category{
	public static function getCategoriesList(){
		$db = Db::getConnection();
		$categoriesList = array();
		$query = "SELECT id, title FROM categories WHERE visible = 1 ORDER BY title";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$i = 0;
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$categoriesList[$i]['id']=$row['id'];
			$categoriesList[$i]['title']=$row['title'];
			$i++;
		}
		return $categoriesList;
	}
	public static function getCategoryById($id){
		$db = Db::getConnection();
		$query = "SELECT title, visible FROM categories WHERE id = $id";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$category['title'] = $row['title'];
		$category['visible'] = $row['visible'];
		return $category;
	}
	public static function getCategoriesCountProducts(){
		$db = Db::getConnection();
		$categoriesList = array();
		$query = "SELECT * FROM categories  ORDER BY title";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$i = 0;
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$categoriesList[$i]['id']=$row['id'];
			$categoriesList[$i]['title']=$row['title'];
			$categoriesList[$i]['visible']=$row['visible'];
			$i++;
		}
		foreach ($categoriesList as $i) {
			$i['count'] = Product::getCountProductsInCategory($i['id']);
			$categories[] = $i;
		}
		return $categories;
	}
	public static function newCategory($newCategory){
		$db = Db::getConnection();
		$id = false;
		$query = "INSERT INTO categories (title, visible) VALUES ('{$newCategory['title']}', {$newCategory['visible']})";
		$result= mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		if ($result){
			$query = "SELECT id FROM products WHERE id=LAST_INSERT_ID()";
			$result= mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
			$result = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$id = $result['id'];
		}
		return $id;
	}
	public static function deleteCategoryById($id){
		$db = Db::getConnection();
		$query = "DELETE FROM categories WHERE id = '$id'";
		$result= mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		return $result;
	}
	public static function editCategoryById($id, $category){
		$db = Db::getConnection();
		$query = "UPDATE categories SET title = '{$category['title']}', visible = {$category['visible']} WHERE id = '$id'";
		$result= mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		return $result;
	}
}
?>