<?php

class Login extends Controller
{
    //funcion principal. Comprueba el acceso del usuario
    public function index()    
    {
        $this->view->addData(['titulo' => 'Login | Padel GO!']); 

        if (Session::get('idUsuario')) { 

            $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión
            $usuario = UsuariosModel::getIdUsuario($idSession); // Recoge el usuario mediante el ID

            if ($usuario->email == 'admin@padelgo.com') { // Si el usuario es el Administrador

                        echo $this->view->render('login/privado', [ // Imprime la vista y añade datos
                            'usuario' => $usuario
                        ]);
                }    
                else {                    
                        echo $this->view->render('login/logueado', [ // Imprime la vista y añade datos
                            'usuario' => $usuario
                        ]);
                } 
        }        
        else if (!$_POST) {

            echo $this->view->render('login/index'); // Imprime la vista 

        }
        else {

            if (LoginModel::logueado($_POST)) { // Comprueba si se ha logueado el Usuario

                $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión

                $usuario = UsuariosModel::getIdUsuario($idSession); // Recoge el usuario mediante el ID

                if ($_POST['email'] == 'admin@padelgo.com') { // Si el usuario es el Administrador

                        echo $this->view->render('login/privado', [ // Imprime la vista y añade datos
                            'usuario' => $usuario
                        ]);
                }    
                else {                    
                        echo $this->view->render('login/logueado', [ // Imprime la vista y añade datos
                            'usuario' => $usuario
                        ]);
                }    
            }
            else {

                echo $this->view->render('login/index'); // Imprime la vista 
            }
        }
    }

    
    public static function salir() 
    {
        Session::destroy(); 
        header('location: /'); // LLama al controlador que trae la vista
        exit();
    } 


    public function articulos()
    {        
        $this->view->addData(['titulo' => 'Artículos']);
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión    

        $articulos = MercadilloModel::getArticulos(); // Recoge todos los articulos de la base de datos 
        $usuarios = MercadilloModel::getUsuario(); // Recoge todos los usuarios de la base de datos

        if (!$idSession) { // Error si no hay Usuario Logueado

            header('location: ../error'); // LLama al controlador que trae la vista
        }
        else {
            
            echo $this->view->render('login/articulos', [ // Imprime la vista y añade datos
                'articulos' => $articulos,
                'usuarios' => $usuarios
            ]);
        }            
    }
}  