<?php
    
    class Main extends Controller{
        function __construct() {
            parent::__construct();
        }

        function render() {
            $this->view->render('main/index');
        }

        function consulta(){
        	$this->view->cant_available=$this->GET_query_parking()['available'];
        	$this->view->cant_busy=$this->GET_query_parking()['busy'];
        	$this->view->render('main/parking_information');
        }

        function GET_query_parking(){
        	$id = '1';
            $result = $this->model->query_parking(['id' => $id]);
            if(isset($result)) {
      			return $result;
            }
        }
    }

?>