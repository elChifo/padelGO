<?php

class Clubs extends Controller
{

   	public function index()
    {
        $this->view->addData(['titulo' => 'Clubs | Padel GO!']);

        $clubs = ClubsModel::getClub(); // Recoge todos los clubs de la base de datos
        
        echo $this->view->render('clubs/index', [ // Imprime la vista y añade datos
                'clubs' => $clubs
        ]);         
    }

    public function insertar()
    {            
        $this->view->addData(['titulo' => 'Clubs | Insertar']);
        $idSession = Session::get('idUsuario'); // Recoge el Usuario Logueado en Sesión

        $clubs = ClubsModel::getClub();  // Recoge todos los clubs de la base de datos

        if ($idSession != 1) { // Error si no es Administrador 

            header('location: ../error'); // LLama al controlador que trae la vista
        }
        else {

            if (!$_POST) {

                echo $this->view->render('clubs/insertar'); // Imprime la vista
            } 
            else {                

                $club = $_POST;

                if(ClubsModel::insertar($club)) { // Inserta los datos en la base de datos 

                    if (isset($_FILES['imagenClub'])) {

                        //Validar::imagen($_FILES['imagenContacto']);

                        $imagen['idClub'] = ClubsModel::obtenerID($_POST['titular']);
                        $imagen['imagenClub'] = $_FILES['imagenClub'];
                        $imagen['path'] = 'img/clubs/';

                        ClubsModel::insertarImagen($imagen); // Inserta los datos en la base de datos
                    }  

                    header("location: ../clubs/administrar"); // LLama al controlador que trae la vista
                } 
                else {
                    echo $this->view->render('clubs/insertar', [ // Imprime la vista y añade datos
                            'club' => $club
                    ]);
                }
            }     
        } 
    }


    public function administrar()
    {
        $this->view->addData(['titulo' => 'Clubs | Administrar']);
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión

        $clubs = ClubsModel::getClub(); // Recoge todos los clubs de la base de datos         

        if ($idSession != 1) { // Error si no es Administrador

            header('location: ../error'); // LLama al controlador que trae la vista
        }
        else {

            echo $this->view->render('clubs/administrar', [ // Imprime la vista y añade datos
                    'clubs'     => $clubs
            ]);
        }
    }

    public function editar()
    {            
        $this->view->addData(['titulo' => 'Clubs | Editar']);
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión       

        $club = ClubsModel::getIdClubs($_GET['idClub']); // Recoge el club mediante el ID

        if ($idSession != 1) { // Error si no es Administrador

            header("location: ../error/"); // LLama al controlador que trae la vista     
        }
        else {

            if (!$_POST) {

                echo $this->view->render('clubs/editar', [ // Imprime la vista y añade datos
                    'club'  => $club
                ]);
            } 
            else { 

                ClubsModel::editar($_POST); // Edita los datos de la base de datos

                if (isset($_FILES['imagenClub'])) {

                    //Validar::imagen($_FILES['imagenContacto']);

                    $imagen['idClub'] = ClubsModel::obtenerID($_POST['nombreClub']);
                    $imagen['imagenClub'] = $_FILES['imagenClub'];
                    $imagen['path'] = 'img/clubs/';

                    ClubsModel::insertarImagen($imagen); // Edita los datos de la base de datos
                }                
                
                    header("location: ../clubs/administrar"); // LLama al controlador que trae la vista                               
                
            }
        }        
    }


    public function borrar()
    {
        $this->view->addData(['titulo' => 'Clubs | Borrar']);         
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión      

        $idClub = $_GET['idClub'];        

        if ($idSession != 1) { // Error si no es Administrador

            header('location: ../error'); // LLama al controlador que trae la vista
        }
        else {

            ClubsModel::borrar($idClub); // Borra los datos del ID

            echo $this->view->render('clubs/administrar'); // Imprime la vista 
           
        }

    }


}
