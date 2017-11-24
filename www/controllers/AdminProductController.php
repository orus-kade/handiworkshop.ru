<?php 
class AdminProductController extends AdminBase{
	public static function actionIndex(){
		self::checkAdmin();
        unset($_SESSION['categoryId']);
		$products = Product::getAllProducts();
		require_once(ROOT.'/views/admin_product/index.php');
		return true;
	}
	public static function actionCreate(){
		self::checkAdmin();
		$categories = Category::getCategoriesList();
		if (isset($_POST['submit'])) {
            $newProduct['title'] = $_POST['title'];
            $newProduct['price'] = $_POST['price'];
            $newProduct['category_id'] = $_POST['category_id'];
            $newProduct['description'] = $_POST['description'];
            $newProduct['is_new'] = $_POST['is_new'];
            if (isset($_POST['visible']) && $_POST['visible'] == 'on'){
                $newProduct['visible'] = 1;
            }
            else {
                $newProduct['visible'] = 0;
            }
            $id = Product::newProduct($newProduct);
            if ($id) {
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                	move_uploaded_file($_FILES["image"]["tmp_name"], ROOT. "/images/products/product$id.jpg");
                }
            }
            header("Location: /admin/product");
        }

		require_once(ROOT.'/views/admin_product/create.php');
		return true;
	}
	public static function actionDelete($id){
		self::checkAdmin();
		Product::deleteProductById($id);
        if (isset($_SESSION['categoryId'])){            
            $s = "Location: /admin/category/products/".$_SESSION['categoryId'];          
            header($s);  
            return true;          
        }
		header("Location: /admin/product");
	}
	public static function actionEdit($id){
		self::checkAdmin();
		$categories = Category::getCategoriesList();
		$product = Product::getProductById($id);
		if (isset($_POST['submit'])) {
            $product['title'] = $_POST['title'];
            $product['price'] = $_POST['price'];
            $product['category'] = $_POST['category_id'];
            $product['description'] = $_POST['description'];
            $product['is_new'] = $_POST['is_new'];
            if (isset($_POST['visible']) && $_POST['visible'] == 'on'){
                $product['visible'] = 1;
            }
            else {
                $product['visible'] = 0;
            }
            if (Product::editProductById($id, $product)) {
            	if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                	move_uploaded_file($_FILES["image"]["tmp_name"], ROOT. "/images/products/product$id.jpg");
                }
            }
            header("Location: /admin/product");
        }
        require_once(ROOT.'/views/admin_product/edit.php');
		return true;        
	}
}
?>