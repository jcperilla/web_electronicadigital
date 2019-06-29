<?php 
    class VigilantesModel extends Model {

        public function __construct() {
            parent::__construct();
        }

        /**
         * Método para obtener los vigilantes
         */
        public function obtenerVigilantes() {
            $query = $this->db->connect()->prepare('SELECT * FROM user');
            $query->execute();

            $row = $query->fetchALL(PDO::FETCH_ASSOC);

            if(isset($row)) {
               return ['listado' => $row];
            }
            else { 
               return null;
            }
            
        }

        /**
         * Método para crear un vigilante
         */
        public function crearVigilante($data)
        {
            //Se inserta en la tabla principal (user)
            $query = $this->db->connect()->prepare('INSERT INTO user (id, first_name, last_name, email, password) VALUES (?, ?, ?, ?, ?)');
            $query->execute([$data["id"], $data["firt_name"], $data["last_name"], $data["email"], $data["password"]]);

            //Se inserta en la tabla vigilant
            $query = $this->db->connect()->prepare('INSERT INTO vigilant (id, entry_time, departure_time) VALUES (?, ?, ?)');
            $query->execute([$data["id"], $data["entry_time"], $data["departure_time"]]);
        }
    }

?>