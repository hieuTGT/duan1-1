<?php
    class Query {
        public $pdo;

        public function __construct() {
            $this->pdo = connectDB();
        }

        public function __destruct() {
            $this->pdo = NULL;
        }

        public function listsanpham() {
            try{
                $sql = "SELECT * FROM `sanpham`";
                $result = $this->pdo->query($sql)->fetchAll();
                $array_listsanpham = [];
                foreach ($result as $row) {
                    $sp->MA_SP = $row['MA_SP'];
                    $sp->TEN_SP = $row['TEN_SP'];
                    $sp->MOTA_SP = $row['MOTA_SP'];
                    $sp->GIA_SP = $row['GIA_SP'];
                    $sp->SOLUONG_SP = $row['SOLUONG_SP'];
                    $sp->Anh_SP = $row['ANH_SP'];
                    $sp->MA_THUONGHIEU = $row['MA_THUONGHIEU'];
                    $sp->TRANGTHAI = $row['TRANGTHAI']; 
                    $array_listsanpham[] = $sp;
                }
                return $array_listsanpham;
                echo '@array_listsanpham';
            }

            catch(Exception $e) {
                $e->getMessgae();
            }
        }

    }
?>