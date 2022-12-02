<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		.error{
			animation: hien ease-in 0.9s;
			display: flex;
			margin-right: 58px;
			font-weight: 500;
			font-size: 1.4rem;
			justify-content: center;
		}

		@keyframes hien {
			from{
				opacity: 0;
			}
			to{
				opacity: 1;
			}
    
}
	</style>
</head>
<body>
<?php
	$filepath = realpath(dirname(__FILE__));
	include ($filepath.'/../lib/session.php');
	Session::checkLogin();
	include_once($filepath.'/../lib/database.php');
	include_once($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class adminlogin
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function login_admin($adminUser,$adminPass){
			$adminUser = $this->fm->validation($adminUser);
			$adminPass = $this->fm->validation($adminPass);

			$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
			$adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

			if(empty($adminUser) || empty($adminPass)){
				$alert = "<span class='error'>Tài khoản người dùng và mật khẩu không khớp</span>";
				return $alert;
			}else{
				$query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass'";
				$result = $this->db->select($query);

				if($result != false){

					$value = $result->fetch_assoc();

					Session::set('adminlogin', true);

					Session::set('adminId', $value['adminId']);
					Session::set('adminUser', $value['adminUser']);
					Session::set('adminName', $value['adminName']);
					header('Location:index.php');

				}else{
					$alert = "<span class='error'>Tài khoản người dùng và mật khẩu không khớp</span>";
					return $alert;
				}
			}
		}


	}
?>
</body>
</html>