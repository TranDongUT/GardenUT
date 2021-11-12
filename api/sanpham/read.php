<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../../config/db.php');
    include_once('../../model/Sanpham.php');

    $db = new db();
    $connect = $db->connect();

    /* khởi tạo đối tượng sanpham */
    $sanpham = new Sanpham($connect);
    $read = $sanpham->read(); /* gọi tơi function read để lấy data */

    $num = $read->rowCount();
    if($num > 0){

        $sanphamArr = [];
        $sanphamArr['Sanpham'] = []; /* mang 2 chieu */

        while($row = $read->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            /* array obj */
            $sanphamItem = Array(
                'id_loaisp' => $id_loaisp,
                'id_sanpham' => $id_sanpham,
                'tensp' => $tensp,
                'ghichu' => $ghichu,
                'gia' => $gia,
                'hinhanh' => $hinhanh,
                'link' => $link
            );
            array_push( $sanphamArr['Sanpham'], $sanphamItem); /* mỗi phần tử trong mảng là 1 obj sanpham */
        }

        echo json_encode($sanphamArr);
    }
?>