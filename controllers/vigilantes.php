<?php
    class Vigilantes extends Controller{
        function __construct() {
            parent::__construct();
        }

        /**
         * Renderiza la vista principal del vigilante y ejecuta el método de listar
         */
        function render() {
            $this->listarVigilantes();
            $this->view->render('vigilantes/index');
        }

        /**
         * Método para listar todos los vigilantes disponibles en el sistema
         */
        function listarVigilantes()
        {
            $this->view->listadoVigilantes = $this->model->obtenerVigilantes()["listado"];
        }

        /**
         * Método para insertar un vigilante en la base de datos
         */
        function ingresar()
        {
            if(!$_POST["idVigilante"])
            {
                $respuesta = $this->model->crearVigilante($_POST);

                if ($respuesta==true) {
                    $this->view->message_exito = "¡Vigilante guardado con éxito!";
                } else {
                    $this->view->message_error = "¡Oops algo sucedió y el vigilante no se pudo guardar!. Parece que el vigilante ya está registrado";
                }
            }
            else
            {
                $respuesta = $this->model->editarVigilante($_POST);

                $this->view->message_exito = "¡Vigilante Actualizado con Éxito!";
            }
            
            $this->render("vigilantes/listarVigilantes");
        }
    }

?>