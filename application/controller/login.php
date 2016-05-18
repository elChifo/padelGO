<?php

class Login extends Controller
{
    public function index()    
    {
        $this->view->addData(['titulo' => 'Login']); 

        if (Session::get('idUsuario')) {

            $idSession = Session::get('idUsuario');

            $usuario = UsuariosModel::getIdUsuario($idSession);

            if ($usuario->email == 'admin@admin.com') {

                        echo $this->view->render('login/privado', [
                            'usuario' => $usuario
                        ]);
                }    
                else {                    
                        echo $this->view->render('login/logueado', [
                            'usuario' => $usuario
                        ]);
                } 
        }        
        else if (!$_POST) {

            echo $this->view->render('login/index');

        }
        else {

            if (LoginModel::logueado($_POST)) {

                $idSession = Session::get('idUsuario');

                $usuario = UsuariosModel::getIdUsuario($idSession);

                if ($_POST['email'] == 'admin@admin.com') {

                        echo $this->view->render('login/privado', [
                            'usuario' => $usuario
                        ]);
                }    
                else {                    
                        echo $this->view->render('login/logueado', [
                            'usuario' => $usuario
                        ]);
                }    
            }
            else {

                echo $this->view->render('login/index');
            }
        }
    }

    

    public function salir()
    {
        Session::destroy();
        header('location: /');
        exit();
    }

    public static function espacio($num)
    {       
        for ($i=0; $i<$num; $i++) {
            echo '&nbsp;';
        }
    }

     
}