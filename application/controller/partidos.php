<?php

class Partidos extends Controller
{

   	public function index()
   	{
        $this->view->addData(['titulo' => 'Partidos | Padel GO!']);
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión
        $usuarioPartido = Session::set('usuarioPartido', $idSession); // Añade datos a $_SESSION

        $partidos = PartidosModel::getPartido();// Recoge todos los partidos de la base de datos
        $categorias = PartidosModel::getCategoria();// Recoge todas las categorias de la base de datos
        $usuarios = PartidosModel::getUsuario();// Recoge todos los usuarios de la base de datos
        $clubs = PartidosModel::getClub();// Recoge todos los clubs de la base de datos

        echo $this->view->render("partidos/index", [ // Imprime la vista y añade datos
                'partidos' => $partidos,
                'categorias' => $categorias,
                'usuarios' => $usuarios,
                'clubs' => $clubs,
                'usuarioPartido' => $usuarioPartido                 
        ]);
    }


    public function insertar()
    {                   
        $this->view->addData(['titulo' => 'Partidos | Nuevo']);
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión
        $usuarioPartido = Session::set('usuarioPartido', $idSession); // Añade datos a $_SESSION

        $categorias = PartidosModel::getCategoria();// Recoge todas las categorias de la base de datos
        $clubs = PartidosModel::getClub(); // Recoge todos los clubs de la base de datos       

        if (!$idSession) { // Error si no hay Usuario Logueado
            
            header('location: ../error'); // LLama al controlador que trae la vista
        }
        else {

            if(!$_POST) {

                echo $this->view->render('partidos/insertar', [ // Imprime la vista y añade datos
                    'categorias' => $categorias,
                    'clubs' => $clubs
                ]);            
            } 
            else {            

                $partido = array(                              
                    'tipoPartido' => $_POST["tipoPartido"],
                    'fechaPartido' => $_POST["fechaPartido"],
                    'horaPartido' => $_POST["horaPartido"],
                    'jugador1' => $_POST["jugador1"],
                    'jugador2' => $_POST["jugador2"],
                    'jugador3' => $_POST["jugador3"],
                    'jugador4' => $_POST["jugador4"],
                    'idCategoria' => $_POST["idCategoria"],
                    'idClub' => $_POST["idClub"],
                    'idUsuario' => $idSession
                );

                if (PartidosModel::insertar($partido)) {  // Inserta los datos en la base de datos

                    header("Location: /partidos"); // LLama al controlador que trae la vista
                } 
                else {

                    echo $this->view->render('partidos/insertar', [ // Imprime la vista y añade datos
                        'categorias' => $categorias,
                        'clubs' => $clubs
                    ]); 
                }            
            }
        }
    }


    public function administrar()
    {
        $this->view->addData(['titulo' => 'Partidos | Administrar']); 
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión
        $usuarioPartido = Session::set('usuarioPartido', $idSession); // Añade datos a $_SESSION    

        $partidos = PartidosModel::getPartido();// Recoge todos los partidos de la base de datos
        $categorias = PartidosModel::getCategoria();// Recoge todas las categorias de la base de datos
        $usuarios = PartidosModel::getUsuario();// Recoge todos los usuarios de la base de datos
        $clubs = PartidosModel::getClub();// Recoge todos los clubs de la base de datos

        if ($idSession != 1) { // Error si no es Administrador

            header('location: ../error'); // LLama al controlador que trae la vista
        }
        else {

            echo $this->view->render('partidos/administrar', [ // Imprime la vista y añade datos
                'partidos' => $partidos,
                'categorias' => $categorias,
                'usuarios' => $usuarios,
                'clubs' => $clubs,
                'usuarioPartido' => $usuarioPartido 
            ]);
        }
    }

 
    public function editar()
    {            
        $this->view->addData(['titulo' => 'Partidos | Editar']);
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión
        $usuarioPartido = Session::set('usuarioPartido', $idSession); // Añade datos a $_SESSION

        $idPartido = $_GET['idPartido'];

        $partido = PartidosModel::getIdPartido($idPartido); // Recoge el partido mediante el ID        

        $categorias = PartidosModel::getCategoria();// Recoge todas las categorias de la base de datos
        $usuarios = PartidosModel::getUsuario();// Recoge todos los usuarios de la base de datos
        $clubs = PartidosModel::getClub();// Recoge todos los clubs de la base de datos

        if (!$idSession) { // Error si no hay Usuario Logueado

            header("location: ../error/");  // LLama al controlador que trae la vista    
        }
        else {

            if (!$_POST) {

                echo $this->view->render('partidos/editar', [ // Imprime la vista y añade datos
                        'partido' => $partido,
                        'categorias' => $categorias,
                        'usuarios' => $usuarios,
                        'clubs' => $clubs,
                        'usuarioPartido' => $usuarioPartido  
                ]);
            } 
            else { 
              
                PartidosModel::editar($_POST); // Edita los datos de la base de datos  

                header("location: ../partidos/administrar");// LLama al controlador que trae la vista 
                
            }
        }        
    }


    public function ver()
    {
        $this->view->addData(['titulo' => 'Partidos | Ver']);
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión
        $usuarioPartido = Session::set('usuarioPartido', $idSession); // Añade datos a $_SESSION

        $partidos = PartidosModel::getPartido();// Recoge todos los partidos de la base de datos
        $categorias = PartidosModel::getCategoria();// Recoge todas las categorias de la base de datos
        $usuarios = PartidosModel::getUsuario();// Recoge todos los usuarios de la base de datos
        $clubs = PartidosModel::getClub();// Recoge todos los clubs de la base de datos

        $idClub = $_GET['idClub'];

        echo $this->view->render("partidos/ver", [ // Imprime la vista y añade datos
                'partidos' => $partidos,
                'categorias' => $categorias,
                'usuarios' => $usuarios,
                'clubs' => $clubs,
                'usuarioPartido' => $usuarioPartido,
                'idClub'         => $idClub                 
        ]);
    }

    public function borrar()
    {
        $this->view->addData(['titulo' => 'Partidos | Borrar']);         
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión       

        $idPartido = $_GET['idPartido'];        

        if ($idSession != 1) { // Error si no es Administrador

            header('location: ../error'); // LLama al controlador que trae la vista
        }
        else {

            PartidosModel::borrar($idPartido); // Borra los datos del ID

            header("location: ../partidos/administrar"); // LLama al controlador que trae la vista 
           
        }

    }




    public function entrar()
    {
        $this->view->addData(['titulo' => 'Partidos | Entrar']);
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión
        $usuarioPartido = Session::set('usuarioPartido', $idSession); // Añade datos a $_SESSION

        $idPartido = $_GET['idPartido'];

        $partido = PartidosModel::getIdPartido($idPartido);
        var_dump($partido);

    }

}
