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
			
			//print_r($file['size']);

			if ($file['size'] > (1024 * 2)) {

				// $path = "";
				// $path = mysql_real_escape_string(urlencode($path) );
				$uniqueImageName = time()."_".$file['name'];

				if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/GardenUT/assets/image/sanpham/".$uniqueImageName)) {
					
					$q = $this->con->query("INSERT INTO `sanpham`(`id_loaisp`, `tensp`, `soluong`, `gia`, `ghichu`, `hinhanh`) VALUES ('$category_id', '$product_name', '$product_qty', '$product_price', '$product_desc', '$uniqueImageName')");

					if ($q) {
						return ['status'=> 202, 'message'=> 'Thêm sản phẩm thành công..!'];
						
					}else{
						return ['status'=> 303, 'message'=> 'Không chạy được truy vấn'];
					}

				}else{
					return ['status'=> 303, 'message'=> 'Lỗi tải hình ảnh'];
				}

			}else{
				return ['status'=> 303, 'message'=> 'Hình ảnh lớn, Kích thước tối đa cho phép 2MB'];
			}

		}else{
			return ['status'=> 303, 'message'=> 'Định dạng ảnh không hợp lệ [Định dạng hợp lệ : jpg, jpeg, png]'];
		}

	}


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
						return ['status'=> 202, 'message'=> 'Sửa thành công..!'];
					}else{
						return ['status'=> 303, 'message'=> 'Không chạy được truy vấn'];
					}

				}else{
					return ['status'=> 303, 'message'=> 'Lỗi tải hình ảnh'];
				}

			}else{
				return ['status'=> 303, 'message'=> 'Hình ảnh lớn, Kích thước tối đa cho phép 2MB'];
			}

		}else{
			return ['status'=> 303, 'message'=> 'Định dạng ảnh không hợp lệ [Định dạng hợp lệ : jpg, jpeg, png]'];
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
				return ['status'=> 202, 'message'=> 'Sửa thành công'];
			}else{
				return ['status'=> 303, 'message'=> 'Lỗi truy vấn'];
			}
			
		}else{
			return ['status'=> 303, 'message'=> 'ID sản phẩm không hợp lệ'];
		}
		
	}



	public function addCategory($name){
		$q = $this->con->query("SELECT * FROM loai_sp WHERE tenloai = '$name' LIMIT 1");
		if ($q->num_rows > 0) {
			return ['status'=> 303, 'message'=> 'Loại sản phẩm này đã tồn tại'];
		}else{
			$q = $this->con->query("INSERT INTO loai_sp (tenloai) VALUES ('$name')");
			if ($q) {
				return ['status'=> 202, 'message'=> 'Thêm thành công'];
			}else{
				return ['status'=> 303, 'message'=> 'Lỗi truy vấn'];
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

	public function deleteProduct($pid = null){
		if ($pid != null) {
			$q = $this->con->query("DELETE FROM sanpham WHERE id_sanpham = '$pid'");
			if ($q) {
				return ['status'=> 202, 'message'=> 'Sản phẩm đã loại bỏ khỏi kho'];
			}else{
				return ['status'=> 202, 'message'=> 'Lỗi truy vấn'];
			}
			
		}else{
			return ['status'=> 303, 'message'=>'ID sản phẩm không hợp lệ'];
		}

	}

	public function deleteCategory($cid = null){
		if ($cid != null) {
			$q = $this->con->query("DELETE FROM loai_sp WHERE id_loaisp = '$cid'");
			if ($q) {
				return ['status'=> 202, 'message'=> 'Đã xóa loại sản phẩm'];
			}else{
				return ['status'=> 202, 'message'=> 'Lỗi truy vấn'];
			}
			
		}else{
			return ['status'=> 303, 'message'=>'ID loại sản phẩm không hợp lệ'];
		}

	}
	
	

	public function updateCategory($post = null){
		extract($post);
		if (!empty($cat_id) && !empty($e_cat_title)) {
			$q = $this->con->query("UPDATE loai_sp SET tenloai = '$e_cat_title' WHERE id_loaisp = '$cat_id'");
			if ($q) {
				return ['status'=> 202, 'message'=> 'Sửa thành công'];
			}else{
				return ['status'=> 202, 'message'=> 'Lỗi truy vấn'];
			}
			
		}else{
			return ['status'=> 303, 'message'=>'ID thể loại không hợp lệ'];
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
		
		header("Content-type: application/json");
		echo json_encode($result);
		http_response_code($result['status']);
		exit();


	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Empty fields']);
		exit();
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


if (isset($_POST['DELETE_CATEGORY'])) {
	if (!empty($_POST['cid'])) {
		$p = new Products();
		echo json_encode($p->deleteCategory($_POST['cid']));
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Invalid details']);
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