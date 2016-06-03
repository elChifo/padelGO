<?php

class Login extends Controller
{
    //funcion principal. Comprueba el acceso del usuario
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

    
    //finaliza la sesion y redirecciona a la raiz de la web
    public static function salir()
    {
        Session::destroy();
        header('location: /');
        exit();
    } 


    public function articulos()
    {        
        $this->view->addData(['titulo' => 'Artículos']);  

        $articulos = MercadilloModel::getArticulos(); 
        $usuarios = MercadilloModel::getUsuario();       

        if ($idSession != 1) {

            header('location: ../error');
        }
        else {
            
            echo $this->view->render('login/articulos', [
                'articulos' => $articulos,
                'usuarios' => $usuarios
            ]);
        }

            
    }
}  