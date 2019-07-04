<?php
    
    class Main extends Controller{
        function __construct() {
            parent::__construct();
        }

        function render() {
            $this->consulta();
        }

        function consulta(){
            $result = $this->GET_query_parking();
        	$this->view->cant_available=$result['available'];
            $this->view->cant_busy=$result['busy'];
        	$this->view->render('main/parking_information');
        }

        function GET_query_parking(){
            $result = $this->model->query_parking(['id' => '1']);
            if(isset($result)) {
      			return $result;
            }
        }

        function get_async_parking_info() {
            $result = $this->GET_query_parking();
            echo json_encode($result);
        }

        function update_quotas() {
            $this->model->update_work_log(['id_vigilant' => '1', 'type' => $_POST['type']]);
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