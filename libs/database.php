<?php

    class Database {
        private $host;
        private $db;
        private $user;
        private $passsword;
        private $charset;

        public function __construct() {
            $this->host = constant('HOST');
            $this->db = constant('DB');
            $this->user = constant('USER');
            $this->password = constant('PASSWORD');
            $this->charset = constant('CHARSET');

            
        }

        function connect() {
            try {
                $connection = "mysql:host=".$this->host.";dbname=" . $this->db . ";charset=" . $this->charset;
                $options = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ];
                $pdo = new PDO($connection,$this->user,$this->password);
            
                return $pdo;
            }catch(PDOException $e) {
                print_r('Error in connection: ' .$e->getMessage());
            }
        }
    }

?>