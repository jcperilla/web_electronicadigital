<?php 
    class AccountModel extends Model {

        public function __construct() {
            parent::__construct();
        }

        public function login($data) {
            $query = $this->db->connect()->prepare('SELECT * FROM user where email = :email');
            $query->execute(['email' => $data['email']]);

            $row = $query->fetch(PDO::FETCH_ASSOC);
            if(password_verify($data['password'], $row['password'])){
                return $row;
            }
            else {
                return null;
            }
        }

        public function vigilant_schedule($data) {
            $query = $this->db->connect()->prepare('SELECT * FROM vigilant where id = :id');
            $query->execute(['id' => $data['id']]);

            $row = $query->fetch(PDO::FETCH_ASSOC);

            $entry_time = date($row['entry_time']);
            $departure_time = date($row['departure_time']);
    
            date_default_timezone_set('America/Bogota');

            $current_time = date("H:i:s");

            if ($entry_time < $current_time && $departure_time > $current_time) {
                return $row;
            }
            else {
                return null;
            }
        }

        public function recovery_password($data){
            $query = $this->db->connect()->prepare('UPDATE user SET password=:password where id = :id');
            $query->execute(['id' => $data['id'],'password' => $data['password']]);
        }
    }

?>