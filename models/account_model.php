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
                return $row['email'];
            }
            else {
                if($data['password'] == $row['password']) {
                   return $row;
                }
                else { 
                   return null;
                }
            }
        }

        public function vigilant_schedule($data) {
            $query = $this->db->connect()->prepare('SELECT * FROM vigilant where id = :id');
            $query->execute(['id' => $data['id']]);

            $row = $query->fetch(PDO::FETCH_ASSOC);

            $data_entry = new DateTime($row['entry_time']);
            $departure_time = new DateTime($row['departure_time']);
            $current_time = new DateTime();

            if ($data_entry < $current_time &&  $departure_time > $current_time) {
                return $row;
            }
            else {
                return null;
            }
        }
    }

?>