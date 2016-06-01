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

            UsuariosModel::borrar($idUsuario);

            header('location: ../usuarios/administrar');           
           
        }

    }

    public function cancelacion()
    {        
        $this->view->addData(['titulo' => 'Cancelar Cuenta']);         
        $idSession = Session::get('idUsuario');   

        if (!$_POST) {

            echo $this->view->render('usuarios/cancelacion', [
                    'idSession' => $idSession 
            ]);

        }
        elseif ( empty($_POST['otrosmotivos']) && 
                (!isset($_POST['privacidad'])) &&
                (!isset($_POST['dificultad'])) &&
                (!isset($_POST['negativa'])) &&
                (!isset($_POST['desuso'])) 
            ) {

            Session::add('feedback_negative', "La Cancelación no ha sido posible, Inténtelo de nuevo");

            echo $this->view->render('usuarios/cancelacion', [
                    'idSession' => $idSession 
            ]);
        } 
        else {

            $motivosCancelacion = $_POST;

            Session::set('motivosCancelacion', $motivosCancelacion);

            Session::add('feedback_positive', "Su Cuenta será Cancelada en menos de 24 Horas.");

            header('location: ../login');
        } 
    }
}


    