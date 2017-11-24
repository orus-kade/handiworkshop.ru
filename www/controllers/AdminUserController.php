<?php 

class AdminUserController extends AdminBase{
	public static function actionIndex(){
        self::checkAdmin();
        $users = User::getUsers();
        require_once(ROOT . '/views/admin_user/index.php');
        return true;
    }
    public static function actionDelete($id){
        self::checkAdmin();
        User::deleteUserById($id);
        header("Location: /admin/user");
    }
    public static function actionEdit($id){
        self::checkAdmin();
        $user = User::getUserById($id);
        if (isset($_POST['submit'])) {
            $user['name'] = $_POST['name'];
            $user['email'] = $_POST['email'];
            $user['ph_number'] = $_POST['ph_number'];
            if (isset($_POST['admin'])) {
            	$user['admin'] = 1;
            }
            else{
            	$user['admin'] = 0;
            }
            User::editUserById($id, $user);
            header("Location: /admin/user");
        }
        require_once(ROOT.'/views/admin_user/edit.php');
        return true;
    }
    public static function actionOrders($id){
    	self::checkAdmin();
        $_SESSION['userId'] = $id;
        $orders = Order::getOrdersUser($id);
    	require_once(ROOT . '/views/admin_order/index.php');
        return true;
    }

}
?>