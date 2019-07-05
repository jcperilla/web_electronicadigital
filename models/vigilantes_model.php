<?php 
    class VigilantesModel extends Model {

        public function __construct() {
            parent::__construct();
        }

        /**
         * Método para obtener los vigilantes
         */
        public function obtenerVigilantes() {
            $query = $this->db->connect()->prepare('SELECT * FROM user u, vigilant v WHERE u.type_user="2" AND v.id=u.id');
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
            $query = $this->db->connect()->prepare('INSERT INTO user (id, first_name, last_name, email, password, type_user) VALUES (?, ?, ?, ?, ?, ?)');
            $type_user='2';
            $pass = password_hash($data["password"], PASSWORD_BCRYPT);
            $query->execute([$data["id"], $data["firt_name"], $data["last_name"], $data["email"], $pass ,$type_user]);

            //Se inserta en la tabla vigilant
            $query = $this->db->connect()->prepare('INSERT INTO vigilant (id, entry_time, departure_time) VALUES (?, ?, ?)');
            $query->execute([$data["id"], $data["entry_time"], $data["departure_time"]]);
        }

        /**
         * Método para actualizar un vigilante
         */
        public function editarVigilante($data)
        {
            //Se inserta en la tabla principal (user)
            $query = $this->db->connect()->prepare('UPDATE user SET  first_name = ?, last_name = ?, email = ?, password = ?, type_user = ? WHERE id =  ?');
            
            $type_user='2';

            $query->execute([$data["first_name"], $data["last_name"], $data["email"], $data["password"], $type_user, $data["id"]]);
        }
    }

?>