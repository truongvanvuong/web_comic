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
	class category
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function all_category(){
			
		}
		public function insert_category($catName){

			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			
			if(empty($catName)){
				$alert = "<span class='error'>Danh mục không được để trống</span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Thêm danh mục thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Thêm danh mục thất bại</span>";
					return $alert;
				}
			}
		}
		public function show_category(){
			$query = "SELECT * FROM tbl_category order by catId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_category($catName,$id){

			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($catName)){
				$alert = "<span class='error'>Danh mục không được để trống</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_category SET catName = '$catName' WHERE catId = '$id'";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Cập nhật danh mục thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Cập nhật danh mục thất bại</span>";
					return $alert;
				}
			}

		}
		public function del_category($id){
			$query = "DELETE FROM tbl_category where catId = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='error'>Xóa danh mục thành công bại</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Xóa danh mục thất bại</span>";
				return $alert;
			}
			
		}
		public function getcatbyId($id){
			$query = "SELECT * FROM tbl_category where catId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_category_fontend(){
			$query = "SELECT * FROM tbl_category order by catId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_product_by_cat($id){
			$query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 

			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 

			INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId WHERE tbl_product.catId='$id' order by catId desc LIMIT 8";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_name_by_cat($id){
			$query = "SELECT tbl_product.*,tbl_category.catName,tbl_category.catId FROM tbl_product,tbl_category WHERE tbl_product.catId=tbl_category.catId AND tbl_product.catId ='$id' LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		


	}
?>
</body>
</html>