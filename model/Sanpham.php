<?php

    class Sanpham{
        private  $conn;

        public $id_loaisp;
        public $id_sanpham;
        public $tensp;
        public $ghichu;
        public $gia;
        public $linkanh;

        /* connect */
        public function __construct($db){
            $this->conn = $db;
        }

        /* read */
        public function read(){
            $query = "SELECT * FROM sanpham, hinhanh where sanpham.id_sanpham = hinhanh.id_sanpham";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }


        /* show 1 */
        public function show(){
            $query = "SELECT * FROM sanpham WHERE id_sanpham =? LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1,$this->id_sanpham);
            $stmt->execute();
        
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->id_loaisp = $row['id_loaisp'];
            $this->id_sanpham = $row['id_sanpham'];
            $this->tensp = $row['tensp'];
            $this->ghichu = $row['ghichu'];
            $this->gia = $row['gia'];
        }
    }



?>