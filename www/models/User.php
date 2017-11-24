<?php
class User{
	public static function register($name, $email, $password){
		$db = Db::getConnection();
		$password = password_hash($password, PASSWORD_DEFAULT);
		$query = "INSERT INTO users (email, name, password) VALUES  ('$email', '$name', '$password')";
		$result = mysqli_query($db, $query) or die("Ошибка 222" . mysqli_error($db));
		return $result;
	}
	public static function checkEmailExists($email){
		$db = Db::getConnection();
		$query = "SELECT count(*) AS count FROM `users` WHERE email = '$email' ";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$count = mysqli_fetch_array($result, MYSQLI_ASSOC)['count'];
		return $count;
	}

	public static function checkUserData($email, $password){
		$db = Db::getConnection();
		$query = "SELECT id, email, password FROM `users` WHERE email = '$email' ";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		if ($row){
			if(!password_verify($password, $row['password'])){
				return false;
			}
			else return $row['id'];
		}
		else {
			return false;
		}

	}
	public static function authorization($userId){
		$_SESSION['user'] = $userId;
		$_SESSION['admin'] = self::getUserById($userId)['admin'];
	}

	public static function checkLogged(){
		if (isset($_SESSION['user'])){
			return $_SESSION['user'];
		}
		header("Location: /user/login/");
	}

	public static function isGuest(){
		if (isset($_SESSION['user'])){
			return false;
		}
		return true;
	}

	public static function isAdmin(){
		if (isset($_SESSION['admin']) && $_SESSION['admin']==1){
			return true;
		}
		return false;
	}

	public static function getUserById($userId){
		$db = Db::getConnection();
		$query = "SELECT * FROM users WHERE id = '$userId' ";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		return mysqli_fetch_array($result, MYSQLI_ASSOC);
	}

	public static function edit($userId, $name, $phone, $password){
		$db = Db::getConnection();
		if ($password!=""){
			$password = password_hash($password, PASSWORD_DEFAULT);
			$query = "UPDATE users SET name = '$name', ph_number = '$phone', password = '$password' WHERE id = $userId";
		}
		else{
			$query = "UPDATE users SET name = '$name', ph_number = '$phone' WHERE id = $userId";
		}
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		return $result;
	}

	public static function getUsers(){
		$db = Db::getConnection();
		$query = "SELECT * FROM users";
		$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		$i = 0;
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$users[$i]['id']=$row['id'];
			$users[$i]['name']=$row['name'];
			$users[$i]['email']=$row['email'];
			$users[$i]['ph_number']=$row['ph_number'];
			$users[$i]['admin']=$row['admin'];
			$users[$i]['count']=Order::countOrdersByUserId($users[$i]['id']);
			$i++;
		}
		return $users;
	}
	public static function deleteUserById($id){
		$db = Db::getConnection();
		$query = "DELETE FROM users WHERE id = '$id'";
		$result= mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		return $result;
	}

	public static function editUserById($id, $user){
		$db = Db::getConnection();
		$query = "UPDATE users SET name = '{$user['name']}', email = '{$user['email']}', ph_number = '{$user['ph_number']}', admin = {$user['admin']} WHERE id = '$id'";
		$result= mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));
		return $result;
	}

}
?>