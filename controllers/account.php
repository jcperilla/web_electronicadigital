<?php
    
    class Account extends Controller{
        function __construct() {
            parent::__construct();
            $this->view->render('account/index');
        }

        function login() {
            $this->model->login();
        }
    }

?>