<?php


class CatalogController
{

    public function actionIndex($page=1)
    {
        $count = 9;
        $categories = array();
        $categories = Category::getCategoriesList();
        $products = false;
        $products = Product::getLatestProducts($count, $page);
        $total = Product::getTotalProducts();
        $pagination = new Pagination($total, $page, $count, 'page');
        require_once(ROOT . '/views/catalog/index.php');
        return true;
    }

    public function actionCategory($categoryId, $page=1){
        $count = 9;
        $categories = array();
        $categories = Category::getCategoriesList();
        $products = array();
        $products = Product::getProductsByCategory($categoryId, $page, $count);
        $total = Product::getTotalProductsInCategory($categoryId);
        $pagination = new Pagination($total, $page, $count, 'page');
        require_once(ROOT . '/views/catalog/category.php');
        return true;

    }
}
?>


