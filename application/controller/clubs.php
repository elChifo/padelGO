<?php

class Clubs extends Controller
{

   	public function index()
    {
        $this->view->addData(['titulo' => 'Clubs']);

        $clubs = ClubsModel::getClub();
        
        echo $this->view->render('clubs/index', [
                'clubs' => $clubs
        ]);         
    }

    public function insertar()
    {            
        $this->view->addData(['titulo' => 'Insertar Club']);
        $idSession = Session::get('idUsuario');

        $clubs = ClubsModel::getClub();
        $usuario = UsuariosModel::getIdUsuario($idSession);

        if ($idSession != 1) {

            header('location: ../error');
        }
        else {

            if (!$_POST) {

                echo $this->view->render('clubs/insertar');
            } 
            else {                

                $club = $_POST;

                if(ClubsModel::insertar($club)) {

                    if (isset($_FILES['imagenClub'])) {

                        //Validar::imagen($_FILES['imagenContacto']);

                        $imagen['idClub'] = ClubsModel::obtenerID($_POST['titular']);
                        $imagen['imagenClub'] = $_FILES['imagenClub'];
                        $imagen['path'] = 'img/clubs/';

                        ClubsModel::insertarImagen($imagen);
                    }  

                    header("location: ../clubs/administrar");
                } 
                else {
                    echo $this->view->render('clubs/insertar',array(
                            'errores' => array('Error al insertar'),
                            'club' => $club
                    ));
                }
            }     
        } 
    }


    public function administrar()
    {
        $this->view->addData(['titulo' => 'Administrar Clubs']);
        $idSession = Session::get('idUsuario'); 

        $clubs = ClubsModel::getClub();         

        if ($idSession != 1) {

            header('location: ../error');
        }
        else {

            echo $this->view->render('clubs/administrar', [
                    'clubs'     => $clubs
            ]);
        }
    }

    public function editar()
    {            
        $this->view->addData(['titulo' => 'Editar Club']);
        $idSession = Session::get('idUsuario');        

        $club = ClubsModel::getIdClubs($_GET['idClub']);

        if ($idSession != 1) {

            header("location: ../error/");     
        }
        else {

            if (!$_POST) {

                echo $this->view->render('clubs/editar', [
                    'club'  => $club
                ]);
            } 
            else { 

                ClubsModel::editar($_POST);

                if (isset($_FILES['imagenClub'])) {

                    //Validar::imagen($_FILES['imagenContacto']);

                    $imagen['idClub'] = ClubsModel::obtenerID($_POST['nombreClub']);
                    $imagen['imagenClub'] = $_FILES['imagenClub'];
                    $imagen['path'] = 'img/clubs/';

                    ClubsModel::insertarImagen($imagen);
                }                
                
                    header("location: ../clubs/administrar");                               
                
            }
        }        
    }


}
