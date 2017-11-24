<?php 
class AdminCategoryController extends AdminBase{
	public static function actionIndex(){
        self::checkAdmin();
        $categories = Category::getCategoriesCountProducts();
        require_once(ROOT . '/views/admin_category/index.php');
        return true;
    }
    public static function actionCreate(){
        self::checkAdmin();
        if (isset($_POST['submit'])) {
            $newCategory['title'] = $_POST['title'];
            if (isset($_POST['visible']) && $_POST['visible'] == 'on'){
                $newCategory['visible'] = 1;
            }
            else {
                $newCategory['visible'] = 0;
            }   
            Category::newCategory($newCategory);         
            header("Location: /admin/category");
        }
        require_once(ROOT.'/views/admin_category/create.php');
        return true;
    }
    public static function actionDelete($id){
        self::checkAdmin();
        Category::deleteCategoryById($id);
        header("Location: /admin/category");
    }
    public static function actionEdit($id){
        self::checkAdmin();
        $category = Category::getCategoryById($id);
        if (isset($_POST['submit'])) {
            $category['title'] = $_POST['title'];
            if (isset($_POST['visible']) && $_POST['visible'] == 'on'){
                $category['visible'] = 1;
            }
            else {
                $category['visible'] = 0;
            }
            Category::editCategoryById($id, $category);
            header("Location: /admin/category");
        }
        require_once(ROOT.'/views/admin_category/edit.php');
        return true;
    }
    public static function actionProducts($id){
        self::checkAdmin();
        $_SESSION['categoryId'] = $id;
        $products = Product::getAllProductsInCategory($id);
        require_once(ROOT.'/views/admin_product/index.php');
        return true;
    }
}
?>