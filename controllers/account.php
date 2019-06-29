<?php
    class Account extends Controller{
        function __construct() {
            parent::__construct();
            $this->session=new Session();
        }

        function render() {
            $this->view->render('account/index');
        }

        function login() {
            $this->view->render('account/index');
        }

        function try_login(){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->model->login(['email' => $email, 'password' => $password]);
            if(isset($user)) {
                $this->session->init();
                $this->session->add('user', $user);
                header('location: '.constant('URL').'main/consulta');
            }
            else {
                $this->view->message_error = "Datos incorrectos";
                $this->render();
            }

        }
    }

?>