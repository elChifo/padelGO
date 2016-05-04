<?php

class Usuarios extends Controller
{
     public function index() 
     {        
        $this->view->addData(['titulo' => 'Usuarios']);
        $usuarios = UsuariosModel::getUsuario(); 

        echo $this->view->render('usuarios/index', [
                'usuarios'     => $usuarios
                ]);
    }
 
    public function insertar()
    {                   
        $this->view->addData(['titulo' => 'Actividades Extraescolares']);

        $actividades = UsuariosModel::getActividad();

        if(!$_POST) {
            echo $this->view->render('usuarios/insertar', [
                    'actividades' => $actividades
            ]);            
        } 
        else {

            if(!isset($_POST["nombreAlumno"])) {
                $_POST["nombreAlumno"] = "";
            }
            if(!isset($_POST["apellidosAlumno"])) {
                $_POST["apellidosAlumno"] = "";
            }
            if(!isset($_POST["fechaNac"])) {
                $_POST["fechaNac"] = "";
            }
            if(!isset($_POST["curso"])) {
                $_POST["curso"] = "";
            }
            if(!isset($_POST["observaciones"])) {
                $_POST["observaciones"] = "";
            }
         
            $datos = array(
                'nombreAlumno' => $_POST["nombreAlumno"],
                'apellidosAlumno' => $_POST["apellidosAlumno"],
                'fechaNac' => $_POST["fechaNac"],
                'curso' => $_POST["curso"],
                'observaciones' => $_POST["observaciones"],
                'idActividad' => $_POST["idActividad"],
            );

            if(UsuariosModel::insertar($datos)) {
                echo $this->view->render('usuarios/alumnoinsertado');
            } 
            else {
                echo $this->view->render('usuarios/insertar',array(
                        'errores' => array('Error al insertar'),
                        'datos' => $_POST
                ));
            }
        }
    }

    public function editar() 
     {        
        $this->view->addData(['titulo' => 'Editar']);

        $idUsuario = Session::get('idUsuario');

        $usuarios = UsuariosModel::getIdUsuario($idUsuario); 

        $categorias = UsuariosModel::getCategoria();

        $usuario = UsuariosModel::getUsuario();

        echo $this->view->render('usuarios/editar', [
                'idUsuario'    => $idUsuario,
                'usuarios'     => $usuarios,
                'categorias'   => $categorias,
                'usuario'      => $usuario
               ]);
    }

    public function borrar()
    {    
        $this->view->addData(['titulo' => 'Borrar']);        

        $idUsuario = Session::get('idUsuario');

        $usuarios = UsuariosModel::getIdUsuario($idUsuario); 

        $categorias = UsuariosModel::getCategoria();

        $usuario = UsuariosModel::getUsuario();

        if (UsuariosModel::borrar($idUsuario)){

            echo $this->view->render('usuarios/borrar', [
                'idUsuari'    => $idUsuario,
                'usuarios'     => $usuarios,
                'categorias'   => $categorias,
                'usuario'      => $usuario
                ]);
        }
        else {

            Session::destroy();

            echo $this->view->render('usuarios/borrar', [
                'idUsuario'    => $idUsuario,
                'usuarios'     => $usuarios,
                'categorias'   => $categorias,
                'usuario'      => $usuario,
                'errores'      => array('No se han borrado los datos Correctamente. <br> 
                                         Por seguridad se ha cerrado la Sesión.')
                ]);
        }  
    }
}