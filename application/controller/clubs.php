<?php

class Clubs extends Controller
{
   	public function index()
    {
        $this->view->addData(['titulo' => 'Clubs']);

        $clubs = ClubsModel::getClub();

        // echo $this->view->render("clubs/index", [
        // 		'clubs' => $clubs
        // ]);     

        if (!$_POST) {

            echo $this->view->render('clubs/index', [
                'clubs' => $clubs
            ]);
        } 
    }

    public function insertar()
    {            
        $this->view->addData(['titulo' => 'Insertar Club']);

        $clubs = ClubsModel::getClub();

        $idSession = Session::get('idUsuario');

        $usuario = UsuariosModel::getIdUsuario($idSession);

        if (!$_POST) {

            echo $this->view->render('clubs/insertar', [
                'clubs' => $clubs
            ]);
        } 
        else {

            if(!isset($_POST["nombreClub"])) {
                $_POST["nombreClub"] = "";
            }
            if(!isset($_POST["direccionClub"])) {
                $_POST["direccionClub"] = "";
            }
            if(!isset($_POST["numPistas"])) {
                $_POST["numPistas"] = "";
            }

            $datos = array(
                'nombreClub' => $_POST["nombreClub"],
                'direccionClub' => $_POST["direccionClub"],
                'numPistas' => $_POST["numPistas"]
            );

            if(ClubsModel::insertar($datos)) {

                 header("location: ../clubs/index");
            } 
            else {
                echo $this->view->render('clubs/insertar',array(
                        'errores' => array('Error al insertar'),
                        'datos' => $_POST
                ));
            }
        }        
    }

    public function administrar()
    {
        $this->view->addData(['titulo' => 'Administrar Clubs']);         
        $clubs = ClubsModel::getClub(); 

        echo $this->view->render('clubs/administrar', [
                'clubs'     => $clubs
        ]);
    }

}
