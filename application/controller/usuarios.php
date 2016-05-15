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


    public function borrar()
    {
        $this->view->addData(['titulo' => 'Borrar Usuarios']);        

        $idUsuario = $_GET['idUsuario'];

        UsuariosModel::borrar($idUsuario);

        echo $this->view->render('usuarios/borrar', [
                'idUsuario'     => $idUsuario
        ]);

    }

    public function administrar()
    {
        $this->view->addData(['titulo' => 'Administrar Usuarios']);         
        $usuarios = UsuariosModel::getUsuario(); 

        echo $this->view->render('usuarios/administrar', [
                'usuarios'     => $usuarios
        ]);
    }

    public function editarr() 
    {        
        $this->view->addData(['titulo' => 'Editar Usuarios']);

        $idUsuario = $_GET['idUsuario']; 

        $categorias = UsuariosModel::getCategoria();

        if(!$_POST) {

            $usuario = UsuariosModel::getIdUsuario($idUsuario);

            echo $this->view->render('usuarios/editar', [
                    'idUsuario'    => $idUsuario,
                    //'usuarios'     => $usuarios,
                    'categorias'   => $categorias,
                    'usuario'      => $usuario
            ]);
        }
        else {

            $usuarioNuevo = UsuariosModel::getIdUsuario($_POST('idUsuario'));

            if ($usuarioNuevo['email'] == $_POST['email']) {

                $emailRepetido = false;
            }
            else if ($usuarioNuevo['email'] != $_POST['email']) {

                $emailRepetido = UsuariosModel::existeEmail($_POST['email']);
            }

            if ($emailRepetido == false) { 

                $datos = ['nombre'      => $_POST["nombre"],
                          'apellidos'   => $_POST["apellidos"],
                          'sexo'        => $_POST["sexo"],
                          'fechaNac'    => $_POST["fechaNac"],
                          'direccion'   => $_POST["direccion"],
                          'telefono'    => $_POST["telefono"],
                          'email'       => $_POST["email"],
                          'clave'       => md5($_POST["clave"]),
                          'idCategoria' => $_POST["idCategoria"]
                ];

                UsuariosModel::editar($datos); 

                echo $this->view->render('usuarios/index', [
                    'idUsuario'    => $idUsuario,
                    'usuarios'     => $usuarios,
                    'categorias'   => $categorias,
                    'usuario'      => $usuario
                ]);
            } 
            else {

               Session::add('feedback_negative', 
                            'Este Email pertenece a otro Usuario. Por Favor, escoja otro Email.'); 

                $usuario = $_POST;

                echo $this->view->render('usuarios/editar', [
                    'idUsuario'    => $idUsuario,
                    //'usuarios'     => $usuarios,
                    'categorias'   => $categorias,
                    'usuario'      => $usuario
                ]);
            } 
        }

        $usuario = $_POST;

                echo $this->view->render('usuarios/editar', [
                    'idUsuario'    => $idUsuario,
                    //'usuarios'     => $usuarios,
                    'categorias'   => $categorias,
                    'usuario'      => $usuario
        ]);

    }


    public function formatoTelefono($numero) 
    {
        $telefono = $numero[0] . $numero[1] . $numero[2] ." . ". 
                    $numero[3] . $numero[4] . $numero[5] ." . ".
                    $numero[6] . $numero[7] . $numero[8];

        return $telefono;
    }

    public function formatoFecha($fecha) 
    {
        $date = explode("-", $fecha);

        $fechaformato = $date[2] .' del '. $date[1] .' de '. $date[0];

        return $fechaformato;  
    }



 
}


    // public function insertar()
    // {                   
    //     $this->view->addData(['titulo' => 'Actividades Extraescolares']);

    //     $actividades = UsuariosModel::getActividad();

    //     if(!$_POST) {
    //         echo $this->view->render('usuarios/insertar', [
    //                 'actividades' => $actividades
    //         ]);            
    //     } 
    //     else {

    //         if(!isset($_POST["nombreAlumno"])) {
    //             $_POST["nombreAlumno"] = "";
    //         }
    //         if(!isset($_POST["apellidosAlumno"])) {
    //             $_POST["apellidosAlumno"] = "";
    //         }
    //         if(!isset($_POST["fechaNac"])) {
    //             $_POST["fechaNac"] = "";
    //         }
    //         if(!isset($_POST["curso"])) {
    //             $_POST["curso"] = "";
    //         }
    //         if(!isset($_POST["observaciones"])) {
    //             $_POST["observaciones"] = "";
    //         }
         
    //         $datos = array(
    //             'nombreAlumno' => $_POST["nombreAlumno"],
    //             'apellidosAlumno' => $_POST["apellidosAlumno"],
    //             'fechaNac' => $_POST["fechaNac"],
    //             'curso' => $_POST["curso"],
    //             'observaciones' => $_POST["observaciones"],
    //             'idActividad' => $_POST["idActividad"],
    //         );

    //         if(UsuariosModel::insertar($datos)) {
    //             echo $this->view->render('usuarios/alumnoinsertado');
    //         } 
    //         else {
    //             echo $this->view->render('usuarios/insertar',array(
    //                     'errores' => array('Error al insertar'),
    //                     'datos' => $_POST
    //             ));
    //         }
    //     }
    // }

    

    // 
