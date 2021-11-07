<?php 
session_start();
/**
 * 
 */
class Customers
{
	
	private $con;

	function __construct()
	{
		include_once("Database.php");
		$db = new Database();
		$this->con = $db->connect();
		
	}

	public function getCustomers(){
		$query = $this->con->query("SELECT `user_id`, `username`, `phone` FROM `user_info`");
		$ar = [];
		if (@$query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$ar[] = $row;
			}
			return ['status'=> 202, 'message'=> $ar];
		}
		return ['status'=> 303, 'message'=> 'Không có dữ liệu khách hàng'];
	}


	public function getCustomersOrder(){
		$query = $this->con->query("SELECT o.id_order, o.sonha, o.xa, o.huyen, o.tinh, o.ngaydat, u.username, o.tongsl, o.trangthai  FROM orders o JOIN user_info u ON o.user_id = u.user_id");
		$ar = [];
		if (@$query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$ar[] = $row;
			}
			return ['status'=> 202, 'message'=> $ar];
		}
		return ['status'=> 303, 'message'=> 'no orders yet'];
	}

	public function getOrderDetails($cid = null){

		if ($cid != null){
			$query = $this->con->query("SELECT  o.id_order, o.soluong, s.tensp ,s.hinhanh FROM order_details o JOIN sanpham s ON o.id_sanpham = s.id_sanpham WHERE o.id_order = '$cid'");
			$ar = [];
			if (@$query->num_rows > 0) {
				while ($row = $query->fetch_assoc()) {
					$ar[] = $row;
					
				}
				return ['status'=> 202, 'message'=> $ar];
			}

		}
		else {
			return ['status'=> 303, 'message'=> 'no order details yet'];}
	}


	public function finishOrder($cid = null){
		if ($cid != null){
			$query = $this->con->query("UPDATE orders set trangthai = '0' where id_order = '$cid'");
			$ar = [];
			if (@$query->num_rows > 0) {
				while ($row = $query->fetch_assoc()) {
					$ar[] = $row;
				}
				return ['status'=> 202, 'message'=> $ar];
			}
		}else{
			return ['status'=> 303, 'message'=> 'no orders yet'];
		}
	}


	public function unFinishOrder($cid = null){
		if ($cid != null){
			$query = $this->con->query("UPDATE orders set trangthai = '1' where id_order = '$cid'");
			$ar = [];
			if (@$query->num_rows > 0) {
				while ($row = $query->fetch_assoc()) {
					$ar[] = $row;
				}
					return ['status'=> 202, 'message'=> $ar];
				}
		}else{
			return ['status'=> 303, 'message'=> 'no orders yet'];
		}
	}

	
}




/*$c = new Customers();
echo "<pre>";
print_r($c->getCustomers());
exit();*/

if (isset($_POST["GET_CUSTOMERS"])) {
	if (isset($_SESSION['admin_id'])) {
		$c = new Customers();
		echo json_encode($c->getCustomers());
		exit();
	}
}

if (isset($_POST["GET_CUSTOMER_ORDERS"])) {
	if (isset($_SESSION['admin_id'])) {
		$c = new Customers();
		echo json_encode($c->getCustomersOrder());
		exit();
	}
}

if (isset($_POST['GET_ORDER_DETAILS'])) {
	if (!empty($_POST['cid'])) {
		$c = new Customers();
		echo json_encode($c->getOrderDetails($_POST['cid']));
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Invalid details']);
		exit();
	}
}

if (isset($_POST['FINISH_ORDER'])) {
	if (!empty($_POST['cid'])) {
		$c = new Customers();
		echo json_encode($c->finishOrder($_POST['cid']));
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Invalid details']);
		exit();
	}
}

if (isset($_POST['UNFINISH_ORDER'])) {
	if (!empty($_POST['cid'])) {
		$c = new Customers();
		echo json_encode($c->unFinishOrder($_POST['cid']));
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Invalid details']);
		exit();
	}
}


?>