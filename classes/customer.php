<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		.error1,
		.success1,
		.error2{
            text-align: center;
			display: block;
			margin: 10px;
			font-size:2rem;
		}
	</style>
</head>
<body>
<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class customer
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_binhluan(){
			$product_id = $_POST['product_id_binhluan'];
			$tenbinhluan = $_POST['tennguoibinhluan'];
			$email = $_POST['email_bl'];
			$binhluan = $_POST['binhluan'];
			if($tenbinhluan=='' || $binhluan=='' || $email==''){
				$alert = "<span class='error'>Không để trống các trường</span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_binhluan(tenbinhluan, email_bl,binhluan,product_id) VALUES('$tenbinhluan','$email','$binhluan','$product_id')";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Bình luận đã gửi</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Bình luận không thành công</span>";
						return $alert;
				}
			}
		}
		public function del_comment($id){
			$query = "DELETE FROM tbl_binhluan where binhluan_id = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xóa bình luận thành công</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Xóa bình luận không thành công</span>";
				return $alert;
			}
		}
		public function show_comment(){
			$query = "SELECT * FROM tbl_binhluan order by binhluan_id desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function insert_customers($data){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$country = mysqli_real_escape_string($this->db->link, $data['country']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			$password = mysqli_real_escape_string($this->db->link, md5($data['password']));
			if($name=="" ||  $email=="" || $address=="" || $country=="" || $phone =="" || $password ==""){
				$alert = "<span class='error2'>Các thông tin không được để trống</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if($result_check){
					$alert = "<span class='error1'>Email đã có người dùng! mời dùng email khác</span>";
					return $alert;
				}else{
					$query = "INSERT INTO tbl_customer(name,email,address,country,phone,password) VALUES('$name','$email','$address','$country','$phone','$password')";
					$result = $this->db->insert($query);
					if($result){
						
						echo "<script>alert('Đăng ký thành công')</script>";
						
					}else{
						$alert = "<span class='error1'>Đăng ký thất bại</span>";
						return $alert;
					}
				}
			}
		}
		public function login_customers($data){
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$password = mysqli_real_escape_string($this->db->link, md5($data['password']));
			if($email=='' || $password==''){
				$alert = "<span class='error'>Tài Khoản và mật khẩu không được để trống</span>";
				return $alert;
			}else{
				$check_login = "SELECT * FROM tbl_customer WHERE email='$email' AND password='$password'";
				$result_check = $this->db->select($check_login);
				if($result_check){
					$value = $result_check->fetch_assoc();
					Session::set('customer_login',true);
					Session::set('customer_id',$value['id']);
					Session::set('customer_name',$value['name']);
				    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
					$alert = "<span class='success'>Đăng nhập thành công công</span>";
					return $alert;
				}else{
					
				    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
				    echo "<script>alert('Tài hoặc mật khẩu không đúng')</script>";
					
				}
			}
		}
		public function show_customers($id){
			$query = "SELECT * FROM tbl_customer WHERE id='$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_customers($data, $id){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$country = mysqli_real_escape_string($this->db->link, $data['country']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			
			if($name=="" || $country=="" || $email=="" || $address=="" || $phone ==""){
				$alert = "<span class='error'>Các thông tin không được để trống</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_customer SET name='$name',country='$country',email='$email',address='$address',phone='$phone' WHERE id ='$id'";
				$result = $this->db->insert($query);
				if($result){
						$alert = "<span class='success'>Cập nhật thông tin khách hàng thành công</span>";
						return $alert;
				}else{
						$alert = "<span class='error'>Cập nhật thông tin khách hàng thất bại</span>";
						return $alert;
				}
				
			}
		}
		
		


	}
?>
</body>
</html>