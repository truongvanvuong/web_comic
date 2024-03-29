<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		.error,
		.success{
			margin-top: 10px;
			display: flex;
			justify-content:center;
			font-size: 1.6rem;
			text-align: center;
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
	class brand
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insert_brand($brandName){

			$brandName = $this->fm->validation($brandName);
			$brandName = mysqli_real_escape_string($this->db->link, $brandName);
			
			if(empty($brandName)){
				$alert = "<span class='error'>Nhãn hiệu không được để trống</span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Thêm nhà xuất bản thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Thêm nhà xuất bản thất bại</span>";
					return $alert;
				}
			}
		}
		public function show_brand(){
			$query = "SELECT * FROM tbl_brand order by brandId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_product_by_brand($id){
			$query = "SELECT * FROM tbl_product WHERE brandId='$id' order by brandId desc LIMIT 8";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_name_by_brand($id){
			$query = "SELECT tbl_product.*,tbl_brand.brandName,tbl_brand.brandId FROM tbl_product,tbl_brand WHERE tbl_product.brandId=tbl_brand.brandId AND tbl_brand.brandId ='$id' LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_brand_home(){
			$query = "SELECT * FROM tbl_brand order by brandId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function getbrandbyId($id){
			$query = "SELECT * FROM tbl_brand where brandId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function update_brand($brandName,$id){

			$brandName = $this->fm->validation($brandName);
			$brandName = mysqli_real_escape_string($this->db->link, $brandName);
			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($brandName)){
				$alert = "<span class='error'>Nhãn hiệu không được để trống</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_brand SET brandName = '$brandName' WHERE brandId = '$id'";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Cập nhật nhà xuất bản thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Cập nhật nhà xuất bản thất bại</span>";
					return $alert;
				}
			}

		}
		public function del_brand($id){
			$query = "DELETE FROM tbl_brand where brandId = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xóa nhà xuất bản thành công</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Xóa nhà xuất bản thất bại</span>";
				return $alert;
			}
			
		}
		


	}
?>
</body>
</html>