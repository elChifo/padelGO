<?php

class Usuarios extends Controller
{
    //funcion principal. Comprueba el usuario
    public function index() 
    {        
        $this->view->addData(['titulo' => 'Usuarios']);

        $usuarios = UsuariosModel::getUsuario(); 
        $categorias = UsuariosModel::getCategoria();

        echo $this->view->render('usuarios/index', [
                'usuarios'  => $usuarios,
                'categorias' => $categorias
        ]);
    }

    //Selecciona un usuario y lo borra de la base de datos
    public function borrar()
    {
        $this->view->addData(['titulo' => 'Borrar Usuarios']);         
        $idSession = Session::get('idUsuario');       

        $idUsuario = $_GET['idUsuario'];        

        if ($idSession != 1) {

            header('location: ../error');
        }
        else {

            if (UsuariosModel::borrar($idUsuario)) {

                echo $this->view->render('usuarios/borrar');
            }
            else {
                echo $this->view->render('usuarios/noBorrado');
            }
        }

    }

    //?
    public function administrar()
    {
        $this->view->addData(['titulo' => 'Administrar Usuarios']);       
        $idSession = Session::get('idUsuario');  

        $usuarios = UsuariosModel::getUsuario(); 

        if ($idSession != 1) {

            header('location: ../error');
        }
        else {

            echo $this->view->render('usuarios/administrar', [
                    'usuarios'     => $usuarios
            ]);
        }        
    }

    //Recoge los datos del usuario, los muestra y permite actualizarlos
    public function editar() 
    {        
        $this->view->addData(['titulo' => 'Editar Usuarios']);        
        $idSession = Session::get('idUsuario'); 

        $categorias = UsuariosModel::getCategoria(); 

        if ($idSession == 1) {

            $usuario = UsuariosModel::getIdUsuario($_GET['idUsuario']);     
        }
        else {

            $usuario = UsuariosModel::getIdUsuario($idSession);
        }

        if(!$_POST) {

            echo $this->view->render('usuarios/editar', [                    
                    'usuario'      => $usuario,
                    'categorias'   => $categorias
            ]); 
        }
        else {

            $usuarioNuevo = $_POST;

            if ($usuarioNuevo['email'] == $usuario->email) {

                $emailRepetido = false;
            }
            else {

                $emailRepetido = UsuariosModel::existeEmail($usuarioNuevo['email']);
            }

            if ($emailRepetido == false) { 

                UsuariosModel::editar($usuarioNuevo); 

                if(isset($_FILES['imagenUsuario'])) {

                    //Validar::imagen($_FILES['imagenContacto']);

                    $imagen['idUsuario'] = RegistroModel::obtenerID($usuarioNuevo['email']);
                    $imagen['imagenUsuario'] = $_FILES['imagenUsuario'];
                    $imagen['path'] = 'img/usuarios/';

                    RegistroModel::insertarImagen($imagen);                    
                }

                if ($idSession == 1) {

                    header("location: ../usuarios/administrar");       
                }
                else {

                    header("location: ../login/");
                }                
            }
            else {

               Session::add('feedback_negative', 
                            'Este Email pertenece a otro Usuario. Por Favor, escoja otro Email.'); 

                echo $this->view->render('usuarios/editar', [                    
                    'usuario'      => $usuario,
                    'categorias'   => $categorias
                ]);
               
            } 
        }
    }  



 
}


    