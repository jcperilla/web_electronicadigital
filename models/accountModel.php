<?php 
    class AccountModel extends Model {
        public function __construct() {
            parent::__construct();
        }

        public function insert() {
            //invoacion api para insertar a bases de datos
            echo "datos correctos";
        }

        public function login() {
            //invoacion api para insertar a bases de datos
            echo "login correcto";
        }

    }

?>