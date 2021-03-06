<?php 
session_start();
class Products
{
	public function read(){
		$query = "SELECT * FROM sanpham, hinhanh where sanpham.id_sanpham = hinhanh.id_sanpham";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}
	private $con;

	function __construct()
	{
		include_once("Database.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	public function getProducts(){
		$q = $this->con->query("SELECT p.id_sanpham, p.id_loaisp, p.tensp, p.ghichu, p.gia, p.soluong, p.hinhanh, c.tenloai FROM sanpham p INNER JOIN loai_sp c ON c.id_loaisp = p.id_loaisp");

		//$q = $this->con->query("SELECT p.id_sanpham, p.id_loaisp, p.tensp, p.ghichu, p.gia, p.soluong FROM sanpham p");
		$products = [];
		if ($q->num_rows > 0) {
			while($row = $q->fetch_assoc()){
				$products[] = $row;
			}
			//return ['status'=> 202, 'message'=> $ar];
			$_DATA['products'] = $products;
		}

		$categories = [];
		$q = $this->con->query("SELECT * FROM loai_sp");
		if ($q->num_rows > 0) {
			while($row = $q->fetch_assoc()){
				$categories[] = $row;
			}
			//return ['status'=> 202, 'message'=> $ar];
			$_DATA['categories'] = $categories;
		}


		return ['status'=> 202, 'message'=> $_DATA];
	}

	/* them san pham */
	public function addProduct($product_name,
								$category_id,
								$product_desc,
								$product_qty,
								$product_price,
								$file){

		$fileName = $file['name'];
		$fileNameAr= explode(".", $fileName);
		$extension = end($fileNameAr);
		$ext = strtolower($extension);

		if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
			
			if ($file['size'] > (1024 * 2)) {

				$uniqueImageName = time()."_".$file['name'];

				if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/GardenUT/assets/image/sanpham/".$uniqueImageName)) {
					
					$q = $this->con->query("INSERT INTO `sanpham`(`id_loaisp`, `tensp`, `soluong`, `gia`, `ghichu`, `hinhanh`) VALUES ('$category_id', '$product_name', '$product_qty', '$product_price', '$product_desc', '$uniqueImageName')");
					$q2 = $this->con->query("SELECT id_sanpham FROM sanpham ORDER BY id_sanpham DESC LIMIT 1");
					$id = $q2->fetch_assoc();
					$id = $id["id_sanpham"];
					$q3 = $this->con->query(" INSERT INTO `hinhanh`(`id_sanpham`, `link`) VALUES ('$id', '$uniqueImageName')");
					if ($q) {
						return ['status'=> 202, 'message'=> 'Th??m s???n ph???m th??nh c??ng..!'];
						
					}else{
						return ['status'=> 303, 'message'=> 'Kh??ng ch???y ???????c truy v???n'];
					}

				}else{
					return ['status'=> 303, 'message'=> 'L???i t???i h??nh ???nh'];
				}

			}else{
				return ['status'=> 303, 'message'=> 'H??nh ???nh l???n, K??ch th?????c t???i ??a cho ph??p 2MB'];
			}

		}else{
			return ['status'=> 303, 'message'=> '?????nh d???ng ???nh kh??ng h???p l??? [?????nh d???ng h???p l??? : jpg, jpeg, png]'];
		}

	}

/* x??a s???n ph???m */
	public function deleteProduct($pid = null){
		if ($pid != null) {
			$qDeleteHinhAnh = $this->con->query("DELETE FROM hinhanh WHERE id_sanpham = '$pid'");
			$q = $this->con->query("DELETE FROM sanpham WHERE id_sanpham = '$pid'");
			if ($q) {
				return ['status'=> 202, 'message'=> 'S???n ph???m ???? lo???i b??? kh???i kho'];
			}else{
				return ['status'=> 202, 'message'=> 'L???i truy v???n'];
			}	
			}else{
				return ['status'=> 303, 'message'=>'ID s???n ph???m kh??ng h???p l???'];
			}
	
		}


/*  s???a s???n ph???m */
	public function editProductWithImage($pid,
										$product_name,
										$category_id,
										$product_desc,
										$product_qty,
										$product_price,
										$file){

		$fileName = $file['name'];
		$fileNameAr= explode(".", $fileName);
		$extension = end($fileNameAr);
		$ext = strtolower($extension);

		if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
			
			//print_r($file['size']);

			if ($file['size'] > (1024 * 2)) {
				
				$uniqueImageName = time()."_".$file['name'];
				if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/GardenUT/assets/image/sanpham/".$uniqueImageName)) {
					
					$q = $this->con->query("UPDATE `sanpham` SET 
										`id_loaisp` = '$category_id', 
										`tensp` = '$product_name', 
										`soluong` = '$product_qty', 
										`gia` = '$product_price', 
										`ghichu` = '$product_desc', 
										`hinhanh` = '$uniqueImageName'
										WHERE id_sanpham = '$pid'");

					if ($q) {
						return ['status'=> 202, 'message'=> 'S???a th??nh c??ng..!'];
					}else{
						return ['status'=> 303, 'message'=> 'Kh??ng ch???y ???????c truy v???n'];
					}

				}else{
					return ['status'=> 303, 'message'=> 'L???i t???i h??nh ???nh'];
				}

			}else{
				return ['status'=> 303, 'message'=> 'H??nh ???nh l???n, K??ch th?????c t???i ??a cho ph??p 2MB'];
			}

		}else{
			return ['status'=> 303, 'message'=> '?????nh d???ng ???nh kh??ng h???p l??? [?????nh d???ng h???p l??? : jpg, jpeg, png]'];
		}

	}

	public function editProductWithoutImage($pid,
										$product_name,
										$category_id,
										$product_desc,
										$product_qty,
										$product_price){

		if ($pid != null) {
			$q = $this->con->query("UPDATE `sanpham` SET 
										`id_loaisp` = '$category_id', 
										`tensp` = '$product_name', 
										`soluong` = '$product_qty', 
										`gia` = '$product_price', 
										`ghichu` = '$product_desc'
										WHERE id_sanpham = '$pid'");

			if ($q) {
				return ['status'=> 202, 'message'=> 'S???a th??nh c??ng'];
			}else{
				return ['status'=> 303, 'message'=> 'L???i truy v???n'];
			}
			
		}else{
			return ['status'=> 303, 'message'=> 'ID s???n ph???m kh??ng h???p l???'];
		}
		
	}



	public function addCategory($name){
		$q = $this->con->query("SELECT * FROM loai_sp WHERE tenloai = '$name' LIMIT 1");
		if ($q->num_rows > 0) {
			return ['status'=> 303, 'message'=> 'Lo???i s???n ph???m n??y ???? t???n t???i'];
		}else{
			$q = $this->con->query("INSERT INTO loai_sp (tenloai) VALUES ('$name')");
			if ($q) {
				return ['status'=> 202, 'message'=> 'Th??m th??nh c??ng'];
			}else{
				return ['status'=> 303, 'message'=> 'L???i truy v???n'];
			}
		}
	}

	public function getCategories(){
		$q = $this->con->query("SELECT * FROM loai_sp");
		$ar = [];
		if ($q->num_rows > 0) {
			while ($row = $q->fetch_assoc()) {
				$ar[] = $row;
			}
		}
		return ['status'=> 202, 'message'=> $ar];
	}



	public function deleteCategory($cid = null){
		if ($cid != null) {
			$q = $this->con->query("DELETE FROM loai_sp WHERE id_loaisp = '$cid'");
			if ($q) {
				return ['status'=> 202, 'message'=> '???? x??a lo???i s???n ph???m'];
			}else{
				return ['status'=> 202, 'message'=> 'L???i truy v???n'];
			}
			
		}else{
			return ['status'=> 303, 'message'=>'ID lo???i s???n ph???m kh??ng h???p l???'];
		}

	}
	
	

	public function updateCategory($post = null){
		extract($post);
		if (!empty($cat_id) && !empty($e_cat_title)) {
			$q = $this->con->query("UPDATE loai_sp SET tenloai = '$e_cat_title' WHERE id_loaisp = '$cat_id'");
			if ($q) {
				return ['status'=> 202, 'message'=> 'S???a th??nh c??ng'];
			}else{
				return ['status'=> 202, 'message'=> 'L???i truy v???n'];
			}
			
		}else{
			return ['status'=> 303, 'message'=>'ID th??? lo???i kh??ng h???p l???'];
		}

	}

}


if (isset($_POST['GET_PRODUCT'])) {
	if (isset($_SESSION['admin_id'])) {
		$p = new Products();
		echo json_encode($p->getProducts());
		exit();
	}
}


if (isset($_POST['add_product'])) {

	extract($_POST);
	if (!empty($product_name) 
	&& !empty($category_id)
	&& !empty($product_desc)
	&& !empty($product_qty)
	&& !empty($product_price)
	&& !empty($_FILES['product_image']['name'])) {
		
		$p = new Products();
		$result = $p->addProduct($product_name,
								$category_id,
								$product_desc,
								$product_qty,
								$product_price,
								$_FILES['product_image']);
		
		//header("Content-type: application/json");
		echo json_encode($result);
		//http_response_code($result['status']);
		exit();

	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Empty fields']);
		exit();
	}
}

if (isset($_POST['DELETE_PRODUCT'])) {
	$p = new Products();
	if (isset($_SESSION['admin_id'])) {
		if(!empty($_POST['pid'])){
			$pid = $_POST['pid'];
			echo json_encode($p->deleteProduct($pid));
			exit();
		}else{
			echo json_encode(['status'=> 303, 'message'=> 'Invalid product id']);
			exit();
		}
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Invalid Session']);
	}
}

if (isset($_POST['edit_product'])) {

	extract($_POST);
	if (!empty($pid)
	&& !empty($e_product_name) 
	&& !empty($e_category_id)
	&& !empty($e_product_desc)
	&& !empty($e_product_qty)
	&& !empty($e_product_price)) {
		
		$p = new Products();

		if (isset($_FILES['e_product_image']['name']) 
			&& !empty($_FILES['e_product_image']['name'])) {
			$result = $p->editProductWithImage($pid,
								$e_product_name,
								$e_category_id,
								$e_product_desc,
								$e_product_qty,
								$e_product_price,
								$_FILES['e_product_image']);
		}else{
			$result = $p->editProductWithoutImage($pid,
								$e_product_name,
								$e_category_id,
								$e_product_desc,
								$e_product_qty,
								$e_product_price);
		}

		echo json_encode($result);
		exit();


	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Empty fields']);
		exit();
	}	
}


if (isset($_POST['add_category'])) {
	if (isset($_SESSION['admin_id'])) {
		$cat_title = $_POST['cat_title'];
		if (!empty($cat_title)) {
			$p = new Products();
			echo json_encode($p->addCategory($cat_title));
		}else{
			echo json_encode(['status'=> 303, 'message'=> 'Empty fields']);
		}
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Session Error']);
	}
}

if (isset($_POST['GET_CATEGORIES'])) {
	$p = new Products();
	echo json_encode($p->getCategories());
	exit();
	
}


if (isset($_POST['DELETE_CATEGORY'])) {
	if (!empty($_POST['cid'])) {
		$p = new Products();
		echo json_encode($p->deleteCategory($_POST['cid']));
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'no']);
		exit();
	}
}

if (isset($_POST['edit_category'])) {
	if (!empty($_POST['cat_id'])) {
		$p = new Products();
		echo json_encode($p->updateCategory($_POST));
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Invalid details']);
		exit();
	}
}

?>