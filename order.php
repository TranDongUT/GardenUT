<?php
  session_start();
    $servername = 'localhost'; 
    $db = 'gardenut'; 
    $username = 'root'; 
    $password = '';
    $con = mysqli_connect($servername, $username, $password ,$db);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    header('Content-Type: text/html; charset=UTF-8');

    if (!empty($_POST)){
        $tinh   = addslashes($_POST['tinh']);
        $huyen   = addslashes($_POST['huyen']);
        $xa   = addslashes($_POST['xa']);
        $sonha   = addslashes($_POST['sonha']);
        $tongsl   = addslashes($_POST['totalProducts']);
        
        $ngaydat = date('Y-m-d H:i:s');
        $user_id = $_SESSION['user_id'];

        $sql = "INSERT INTO orders (user_id, tinh, huyen, xa, sonha, ngaydat, tongsl, trangthai) VALUES ('$user_id','$tinh','$huyen', '$xa', '$sonha','$ngaydat', '$tongsl', '1')";
        mysqli_query($con, $sql);
        
        $sql1 = "SELECT id_order FROM orders WHERE user_id = '$user_id' and ngaydat = '$ngaydat' ";
        $row = mysqli_fetch_array(mysqli_query($con, $sql1));
        $id_order = $row['id_order'];
        
        foreach($_POST['products'] as $d => $data){
            $obj = json_decode($data,true);
            $sp = $obj['id_sanpham'];
            $qty = $obj['quantity'];
            $add = "INSERT INTO order_details (id_order , id_sanpham, soluong) VALUES ('$id_order', '$sp', '$qty')";
            
        }

        if (mysqli_query($con, $add)){
            echo '<script language="javascript">alert("Đặt hàng thanh công")</script>';
            header('Location: cart.php');

                die();
          }
          else {
              echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="index.php";</script>';
    
          }

    }


?>