<?php 
    class MainModel extends Model {

        public function __construct() {
            parent::__construct();
        }

        public function query_parking($data) {
            $query = $this->db->connect()->prepare('SELECT * FROM parking_lot where id = :id');
            $query->execute(['id' => $data['id']]);

            $row = $query->fetch(PDO::FETCH_ASSOC);

            if(isset($row)) {
               return ['available' => $row['available'], 'busy' => $row['busy']];
            }
            else { 
               return null;
            }
            
        }

        public function insert_parking($data) {
            $query = $this->db->connect()->prepare('INSERT INTO work_log VALUES()');
            $query->execute(['id' => $data['id']]);

            $row = $query->fetch(PDO::FETCH_ASSOC);

            if(isset($row)) {
               return ['available' => $row['available'], 'busy' => $row['busy']];
            }
            else { 
               return null;
            }
            
        }
    }

?>