<?php
    class queryControl {
        public $queryControl;

        public function __construct() {
            $this->queryControl = new Query;
        }


        public function list() {
            $result = $this->queryControl->listsanpham();
            // include("");
            include("view/chitietsanpham.php");
        }
    }
?>