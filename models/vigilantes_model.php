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
         * Funcion que verifica por id si existe un vigilante
         */
        public function query_exist_vigilant_id($data) {
            $query = $this->db->connect()->prepare('SELECT * FROM user u WHERE u.type_user="2" AND u.id = :id');
            $query->execute(['id' => $data['id']]);

            $row = $query->fetch(PDO::FETCH_ASSOC);

            if(isset($row)) {
               return $row;
            }
            else { 
               return null;
            }
            
        }        


        /**
         * Funcion que verifica por email si existe un vigilante
         */
        public function query_exist_vigilant_email($data) {
            $query = $this->db->connect()->prepare('SELECT * FROM user u WHERE u.type_user="2" AND u.email = :email');
            $query->execute(['email' => $data['email']]);

            $row = $query->fetch(PDO::FETCH_ASSOC);

            if(isset($row)) {
               return $row;
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

            $result_exist_id = $this->query_exist_vigilant_id($data);
            $result_exist_email = $this->query_exist_vigilant_email($data);

            if (empty($result_exist_id) && empty($result_exist_email)) {


                //Se inserta en la tabla principal (user)
                $query = $this->db->connect()->prepare('INSERT INTO user (id, first_name, last_name, email, password, type_user) VALUES (?, ?, ?, ?, ?, ?)');
                $type_user='2';
                $pass = password_hash($data["password"], PASSWORD_BCRYPT);
                $query->execute([$data["id"], $data["first_name"], $data["last_name"], $data["email"], $pass ,$type_user]);

                //Se inserta en la tabla vigilant
                $query = $this->db->connect()->prepare('INSERT INTO vigilant (id, entry_time, departure_time) VALUES (?, ?, ?)');
                $query->execute([$data["id"], $data["entry_time"], $data["departure_time"]]);
                
                return true;
            } else {
                return null;
            }
            

        }

        /**
         * Método para actualizar un vigilante
         */
        public function editarVigilante($data)
        {
            //Se inserta en la tabla principal (user)
            if(empty($data["password"])) {
                $query = $this->db->connect()->prepare('UPDATE user SET  first_name = ?, last_name = ?, email = ? WHERE id =  ?');
                $query->execute([$data["first_name"], $data["last_name"], $data["email"], $data["id"]]);
            }
            else {
                $pass = password_hash($data["password"], PASSWORD_BCRYPT);
                $query = $this->db->connect()->prepare('UPDATE user SET  first_name = ?, last_name = ?, password = ?, email = ? WHERE id =  ?');
                $query->execute([$data["first_name"], $data["last_name"], $pass, $data["email"], $data["id"]]);
            }
            
            //Se actualiza el horario del vigilante
            $query2 = $this->db->connect()->prepare('UPDATE vigilant SET entry_time = ?, departure_time = ? WHERE id =  ?');

            $query2->execute([$data["entry_time"], $data["departure_time"], $data["id"]]);
        }
    }

?>