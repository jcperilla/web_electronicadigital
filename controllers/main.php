<?php
    
    class Main extends Controller{
        function __construct() {
            parent::__construct();
        }

        function render() {
            $this->consulta();
        }

        function consulta(){
        	$this->view->cant_available=$this->GET_query_parking()['available'];
            $this->view->cant_busy=$this->GET_query_parking()['busy'];
        	$this->view->render('main/parking_information');
        }

        function GET_query_parking(){
            $result = $this->model->query_parking(['id' => '1']);
            if(isset($result)) {
      			return $result;
            }
        }

        function admin_pane() {
            $user = Session::get('user');
            if(Session::getStatus() === 1 || empty($user['id'])) {
                header('location: '.constant('URL').'account/login');
            } else {
                header('location: '.constant('URL').'vigilantes');
            }
        }
    }

?>