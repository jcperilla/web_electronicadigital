<?php
    class Account extends Controller{
        function __construct() {
            parent::__construct();
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
                if($user['type_user'] == "1") {
                    $this->createSession($user);
                    header('location: '.constant('URL').'main/admin_pane');
                }
                else {
                    $vigilant = $this->model->vigilant_schedule(['id' => $user['id']]);
                     if(isset($vigilant)) {
                        $this->createSession($user);
                        header('location: '.constant('URL').'main/consulta');
                     }
                     else {
                        $this->view->message_error = "No esta en su horario";
                        $this->render();
                     }
                }
            }
            else {
                $this->view->message_error = "Datos incorrectos";
                $this->render();
            }

        }

        function createSession($user) {
            Session::add('user', $user);
        }

        function destroySession() {
            Session::close();
            header('location: '.constant('URL'));
        }

        function change_password() {
            $this->view->render('account/change_password');
        }

        function update_password() {
            $password_confirm = $_POST['password_confirm'];
            $password = $_POST['password'];

            if($password_confirm == $password) {
                $this->model->change_password(['id' => Session::get('user')['id'], 'password' => $password]);
                $this->view->info_message = "Se actualizo la contraseña de manera correcta";
                $this->view->render('account/change_password');
            }
            else {
                $this->view->message_error = "Las contraseñas no coinciden";
                $this->view->render('account/change_password');
            }
        }
    }

?>