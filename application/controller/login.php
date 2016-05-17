<?php

class Login extends Controller
{
    public function index()    
    {
        $this->view->addData(['titulo' => 'Login']);    

        echo $this->view->render('login/index');
    }

    public function logueado()
    {
        $this->view->addData(['titulo' => 'Logueado']);

        $usuarioSesion = Session::get('idUsuario');
        
        LoginModel::logueado($_POST);

            $email = LoginModel::logueado($_POST);
            $usuario = UsuariosModel::getIdUsuario($usuarioSesion);

            if($email == 'admin@admin.com') {

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