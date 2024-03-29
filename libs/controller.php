<?php
    class Controller {
        function __construct() {
            Session::init();
            $this->view = new View(); 
        }

        function loadModel($model) {
            $url = 'models/' . $model.'_model.php';

            if(file_exists($url)) {
                require $url;
                $modelName = $model.'Model';
                $this->model = new $modelName();
            }
        }
    }

?>