<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../../config/db.php');
    include_once('../../model/Sanpham.php');

    $db = new db();
    $connect = $db->connect();

    /* khởi tạo đối tượng sanpham */
    $sanpham = new Sanpham($connect);
    
    $sanpham->id_sanpham = isset($_GET["id"]) ? $_GET["id"] : die();

    $sanpham->show();

    $sanphamItem = Array(
        'id_loaisp' => $sanpham->id_loaisp,
        'id_sanpham' => $sanpham->id_sanpham,
        'tensp' => $sanpham->tensp,
        'ghichu' => $sanpham->ghichu,
        'gia' => $sanpham->gia
    );

    echo json_encode($sanphamItem);

?>