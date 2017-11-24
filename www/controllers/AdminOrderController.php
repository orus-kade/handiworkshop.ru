<?php 
class AdminOrderController extends AdminBase{
	public static function actionIndex(){
        self::checkAdmin();   
        unset($_SESSION['userId']);     
        $orders = Order::getOrders();
        require_once(ROOT . '/views/admin_order/index.php');
        return true;
    }
    public static function actionDelete($id){
        self::checkAdmin();
        Order::deleteOrderById($id);
        $orders = Order::getOrders();
        if (isset($_SESSION['userId'])){
            $s = "Location: /admin/user/orders/".$_SESSION['userId'];
            header($s);
            return true;
        }
        header("Location: /admin/order");
    }
    public static function actionDeleteProduct($id){
        self::checkAdmin();
        $orderId = Order::getIdByProduct($id);
        Order::deleteProduct($id);
        $s = "Location: /admin/order/view/".$orderId;
        header($s);
    }
    public static function actionView($id){
        self::checkAdmin();
        $order = Order::getOrderById($id);
        require_once(ROOT . '/views/admin_order/view.php');
        return true;

    }
    public static function actionEdit($id){
        self::checkAdmin();
        $orderId = Order::getIdByProduct($id);
        if (isset($_POST['submit'])) {
            $count = $_POST['count'];
            Order::editOrderProduct($id, $count);            
            $s = "Location: /admin/order/view/".$orderId;
            header($s);
        }
    }
    public static function actionEditStatus($id){
        self::checkAdmin();
        if (isset($_POST['submit'])) {
            $status = $_POST['status'];
            Order::editOrderStatus($id, $status);            
            $s = "Location: /admin/order/view/".$id;
            header($s);
        }
    }
}
?>