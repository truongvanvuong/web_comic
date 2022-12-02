<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
	/**
	 * 
	 */
	class product
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function search_product($tukhoa){
			$tukhoa = $this->fm->validation($tukhoa);
			$query = "
			SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 

			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 

			INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId WHERE productName LIKE '%$tukhoa%'";
			$result = $this->db->select($query);
			return $result;

		}
		public function insert_product($data,$files){
			$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
			$author = mysqli_real_escape_string($this->db->link, $data['author']);
			$pianter= mysqli_real_escape_string($this->db->link, $data['painter']);
			$supplier= mysqli_real_escape_string($this->db->link, $data['supplier']);
			$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
			$category = mysqli_real_escape_string($this->db->link, $data['category']);
			$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
			$image = mysqli_real_escape_string($this->db->link, $data['image']);
			$listed_price = mysqli_real_escape_string($this->db->link, $data['listed_price']);
			$price = mysqli_real_escape_string($this->db->link, $data['price']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);
			if($productName=="" || $brand=="" || $category=="" || $product_desc=="" ||$listed_price==""|| $price=="" || $type=="" || $author=="" || $pianter=="" || $supplier==""   ){
				$alert = "<span class='error'>Các trường không được để trống</span>";
				return $alert;
			}else{
				
				$query = "INSERT INTO tbl_product(productName,author,painter,supplier,brandId,catId,product_desc,listed_price,price,type,image) VALUES('$productName','$author','$pianter','$supplier','$brand','$category','$product_desc','$listed_price','$price','$type','$image')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Sách đã được thêm</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Thêm sách thất bại</span>";
					return $alert;
				}
			}
		}
		public function show_slider(){
			$query = "SELECT * FROM tbl_slider where type='1' order by sliderId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_slider_list(){
			$query = "SELECT * FROM tbl_slider order by sliderId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_product(){
			// $query = "

			// SELECT p.*,c.catName, b.brandName

			// FROM tbl_product as p,tbl_category as c, tbl_brand as b where p.catId = c.catId 

			// AND p.brandId = b.brandId 

			// order by p.productId desc";

			$query = "

			SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 

			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 

			INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId 

			order by tbl_product.productId desc";

			// $query = "SELECT * FROM tbl_product order by productId desc";

			$result = $this->db->select($query);
			return $result;
		}
		public function update_type_slider($id,$type){

			$type = mysqli_real_escape_string($this->db->link, $type);
			$query = "UPDATE tbl_slider SET type = '$type' where sliderId='$id'";
			$result = $this->db->update($query);
			return $result;
		}
		public function del_slider($id){
			$query = "DELETE FROM tbl_slider where sliderId = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Đã xóa thanh trượt thành công</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Đã xóa thanh trượt thất bại</span>";
				return $alert;
			}
		}
		public function update_product($data,$files,$id){
		
			$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
			$author = mysqli_real_escape_string($this->db->link, $data['author']);
			$pianter= mysqli_real_escape_string($this->db->link, $data['painter']);
			$supplier= mysqli_real_escape_string($this->db->link, $data['supplier']);
			$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
			$category = mysqli_real_escape_string($this->db->link, $data['category']);
			$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
			$image = mysqli_real_escape_string($this->db->link, $data['image']);
			$listed_price = mysqli_real_escape_string($this->db->link, $data['listed_price']);
			$price = mysqli_real_escape_string($this->db->link, $data['price']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);
			if($productName=="" || $brand=="" || $category=="" || $product_desc=="" ||$listed_price==""|| $price=="" || $type=="" || $author=="" || $pianter=="" || $supplier==""   ){
				$alert = "<span class='error'>Các trường không được để trống</span>";
				return $alert;
			}else{
				if(!empty($image)){
					//Nếu người dùng chọn ảnh
					$query = "UPDATE tbl_product SET
					productName = '$productName',
					brandId = '$brand',
					catId = '$category',
					type = '$type',  
					listed_price ='$listed_price',
					price = '$price', 
					image = '$image',
					product_desc = '$product_desc',
					author ='$author',
					painter = '$pianter',
					supplier ='$supplier'
					WHERE productId = '$id'";
					
				}else{
					//Nếu người dùng không chọn ảnh
					$query = "UPDATE tbl_product SET

					productName = '$productName',
					brandId = '$brand',
					catId = '$category', 
					listed_price ='$listed_price',
					price = '$price', 
					type = '$type', 
					product_desc = '$product_desc',
					author ='$author',
					painter = '$pianter',
					supplier ='$supplier'
					WHERE productId = '$id'";
					
				}
				$result = $this->db->update($query);
					if($result){
						$alert = "<span class='success'>Đã cập nhật sách thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Cập nhật sách thất bại</span>";
						return $alert;
					}
				
			}

		}
		public function del_product($id){
			$query = "DELETE FROM tbl_product where productId = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xóa sách thành công</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Xóa sách thất bại</span>";
				return $alert;
			}
			
		}
		public function del_wlist($proid,$customer_id){
			$query = "DELETE FROM tbl_wishlist where productId = '$proid' AND customer_id='$customer_id'";
			$result = $this->db->delete($query);
			return $result;
		}
		public function getproductbyId($id){
			$query = "SELECT * FROM tbl_product where productId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		//END BACKEND 
		public function getproduct_feathered(){
			// $query = "SELECT * FROM tbl_product where type = '0' order by RAND() LIMIT 8 ";
			$query = "

			SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 

			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 

			INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
			where type = '0' order by RAND() LIMIT 8 ";

			
			$result = $this->db->select($query);
			return $result;
		} 
		
		public function getproduct_new(){
			$sp_tungtrang = 15;
			if(!isset($_GET['trang'])){
				$trang = 1;
			}else{
				$trang = $_GET['trang'];
			}
			$tung_trang = ($trang-1)*$sp_tungtrang;
			// $query = "SELECT * FROM tbl_product order by productId desc LIMIT $tung_trang,$sp_tungtrang";
			$query = "

			SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 

			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 

			INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId 

			order by tbl_product.productId desc LIMIT $tung_trang,$sp_tungtrang";

			$result = $this->db->select($query);
			return $result;
		} 
		public function get_all_product(){
			$query = "SELECT * FROM tbl_product";
			$result = $this->db->select($query);
			return $result;
		} 
		public function get_details($id){
			$query = "

			SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 

			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 

			INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId WHERE tbl_product.productId = '$id'

			";

			$result = $this->db->select($query);
			return $result;
		}
		public function getLastestDell(){
			$query = "SELECT * FROM tbl_product WHERE brandId = '6' order by productId desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		public function getLastestOppo(){
			$query = "SELECT * FROM tbl_product WHERE brandId = '3' order by productId desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		public function getLastestHuawei(){
			$query = "SELECT * FROM tbl_product WHERE brandId = '4' order by productId desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		public function getLastestSamsung(){
			$query = "SELECT * FROM tbl_product WHERE brandId = '2' order by productId desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_compare($customer_id){
			$query = "SELECT * FROM tbl_compare WHERE customer_id = '$customer_id' order by id desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_wishlist($customer_id){
			$query = "SELECT * FROM tbl_wishlist WHERE customer_id = '$customer_id' order by id desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function insertCompare($productid, $customer_id){
			
			$productid = mysqli_real_escape_string($this->db->link, $productid);
			$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
			
			$check_compare = "SELECT * FROM tbl_compare WHERE productId = '$productid' AND customer_id ='$customer_id'";
			$result_check_compare = $this->db->select($check_compare);

			if($result_check_compare){
				$msg = "<span class='error'>Sách đã được thêm vào để so sánh</span>";
				return $msg;
			}else{

			$query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
			$result = $this->db->select($query)->fetch_assoc();
			
			$productName = $result["productName"];
			$price = $result["price"];
			$image = $result["image"];

			
			
			$query_insert = "INSERT INTO tbl_compare(productId,price,image,customer_id,productName) VALUES('$productid','$price','$image','$customer_id','$productName')";
			$insert_compare = $this->db->insert($query_insert);

			if($insert_compare){
						$alert = "<span class='success'>Thêm so sánh thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Thêm so sánh thất bại</span>";
						return $alert;
					}
			}
		}
		public function insertWishlist($productid, $customer_id){
			$productid = mysqli_real_escape_string($this->db->link, $productid);
			$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
			
			$check_wlist = "SELECT * FROM tbl_wishlist WHERE productId = '$productid' AND customer_id ='$customer_id'";
			$result_check_wlist = $this->db->select($check_wlist);

			if($result_check_wlist){
				$msg = "<span class='error'>Sách đã được thêm vào danh sách yêu thích</span>";
				return $msg;
			}else{

			$query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
			$result = $this->db->select($query)->fetch_assoc();
			
			$productName = $result["productName"];
			$price = $result["price"];
			$image = $result["image"];

			
			
			$query_insert = "INSERT INTO tbl_wishlist(productId,price,image,customer_id,productName) VALUES('$productid','$price','$image','$customer_id','$productName')";
			$insert_wlist = $this->db->insert($query_insert);

			if($insert_wlist){
						$alert = "<span class='success'>Thêm sách vào yêu thích thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Thêm sách vào yêu thích thất bại</span>";
						return $alert;
					}
			}
		}
		public function show_product_thap(){
			$query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 

			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 

			INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId 

			order by tbl_product.price desc";
			$result = $this->db->select($query);
			return $result;
		}

		public function show_product_cao(){
			$query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 

			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 

			INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId 

			order by tbl_product.price asc";
			$result = $this->db->select($query);
			return $result;
		}

	}
?>