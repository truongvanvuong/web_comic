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
			font-size: 1.5rem;
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
	/**
	 * 
	 */
	class cart
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function add_to_cart($quantity, $id){

			$quantity = $this->fm->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$id = mysqli_real_escape_string($this->db->link, $id);
			$sId = session_id();
			$check_cart = "SELECT * FROM tbl_cart WHERE productId = '$id' AND sId ='$sId'";
			$result_check_cart = $this->db->select($check_cart);
			if($result_check_cart){
				$msg = "<span class='error'>Sản phẩm đã được thêm vào</span>";
				return $msg;
			}else{

				$query = "SELECT * FROM tbl_product WHERE productId = '$id'";
				$result = $this->db->select($query)->fetch_assoc();
				
				$image = $result["image"];
				$price = $result["price"];
				$productName = $result["productName"];

				$query_insert = "INSERT INTO tbl_cart(productId,quantity,sId,image,price,productName) VALUES('$id','$quantity','$sId','$image','$price','$productName')";
				$insert_cart = $this->db->insert($query_insert);
				if($insert_cart){
					$msg = "<span class='error'>Thêm sản phẩm thành công</span>";
					return $msg;
					
				}
			}
			
		}
		


		public function get_product_cart(){
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_quantity_cart($quantity, $cartId){
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$cartId = mysqli_real_escape_string($this->db->link, $cartId);
			$query = "UPDATE tbl_cart SET
					quantity = '$quantity'

					WHERE cartId = '$cartId'";
			$result = $this->db->update($query);
			if($result){
				$msg = "<span class='error'>Số lượng đơn hàng đã đươc cập nhật</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Số lượng sản phẩm được cập nhật không thành công</span>";
				return $msg;
			}
		
		}
		public function del_product_cart($cartid){
			$cartid = mysqli_real_escape_string($this->db->link, $cartid);
			$query = "DELETE FROM tbl_cart WHERE cartId = '$cartid'";
			$result = $this->db->delete($query);
			if($result){
				$msg = "<span class='error'>Xóa sản phẩm thành công</span>";
				return $msg;
			
			}
		}

		public function check_cart(){
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}
		public function check_order($customer_id){
			$sId = session_id();
			$query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function del_all_data_cart(){
			$sId = session_id();
			$query = "DELETE FROM tbl_cart WHERE sId = '$sId'";
			$result = $this->db->delete($query);
			

		}
		public function del_compare($customer_id){
			$sId = session_id();
			$query = "DELETE FROM tbl_compare WHERE customer_id = '$customer_id'";
			$result = $this->db->delete($query);
			return $result;
		}
		public function insertOrder($customer_id){
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
			$get_product = $this->db->select($query);
			if($get_product){
				while($result = $get_product->fetch_assoc()){
					$productid = $result['productId'];
					$productName = $result['productName'];
					$quantity = $result['quantity'];
					$price = $result['price'] * $quantity;
					$image = $result['image'];
					$customer_id = $customer_id;
					$query_order = "INSERT INTO tbl_order(productId,productName,quantity,price,image,customer_id) VALUES('$productid','$productName','$quantity','$price','$image','$customer_id')";
					$insert_order = $this->db->insert($query_order);
					if($insert_order){
				    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=success.php">';
				    echo "<script>alert('Đã Đặt Hàng')</script>";

					}
					else{
						echo "<script>alert('Xảy ra lỗi')</script>";

					}
				}
			}


		}
		public function getAmountPrice($customer_id){
		
			$query = "SELECT price FROM tbl_order WHERE customer_id = '$customer_id'";
			$get_price = $this->db->select($query);
			return $get_price;
		}
		public function get_cart_ordered($customer_id){
			$query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id'";
			$get_cart_ordered = $this->db->select($query);
			return $get_cart_ordered;
		}
		public function get_inbox_cart(){
			$query = "SELECT * FROM tbl_order ORDER BY date_order";
			$get_inbox_cart = $this->db->select($query);
			return $get_inbox_cart;
		}
		public function shifted($id,$time,$price){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query = "UPDATE tbl_order SET

					status = '1'

					WHERE id = '$id' AND date_order='$time' AND price ='$price'";
			$result = $this->db->update($query);
			if($result){
				$msg = "<span class='success'>Cập nhật đơn hàng thành công</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Cập nhật đơn hàng thất bại</span>";
				return $msg;
			}
		}
		public function del_shifted($id,$time,$price){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query = "DELETE FROM tbl_order 
					WHERE id = '$id' AND date_order='$time' AND price ='$price'";
			$result = $this->db->update($query);
			if($result){
				$msg = "<span class='success'>Xóa đơn hàng thành công</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Xóa đơn hàng thất bại</span>";
				return $msg;
			}
		}
		public function shifted_confirm($id,$time,$price){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query = "UPDATE tbl_order SET

					status = '2'

					WHERE customer_id = '$id' AND date_order='$time' AND price ='$price'";
			$result = $this->db->update($query);
			return $result;
		}
		


	}
?>
</body>
</html>