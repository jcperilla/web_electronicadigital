<?php 
    class AccountModel extends Model {

        public function __construct() {
            parent::__construct();
            session_unset();
            session_destroy();
        }

        public function login($data) {
            $query = $this->db->connect()->prepare('SELECT * FROM user where email = :email');
            $query->execute(['email' => $data['email']]);

            $row = $query->fetch(PDO::FETCH_ASSOC);

            if(password_verify($data['password'], $row['password'])){
                return $row['email'];
            }
            else {
                if($data['password'] == $row['password']) {
                   return $row['email'];
                }
                else { 
                   return null;
                }
            }
        }
    }

?>