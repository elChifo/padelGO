<?php

class Partidos extends Controller
{
    //funcion principal. Comprueba el acceso del usuario
   	public function index()
   	{
        $this->view->addData(['titulo' => 'Partidos']);
        $idSession = Session::get('idUsuario');
        $usuarioPartido = Session::set('usuarioPartido', $idSession);        

        $partidos = PartidosModel::getPartido();
        $categorias = PartidosModel::getCategoria();
        $usuarios = PartidosModel::getUsuario();
        $clubs = PartidosModel::getClub();

        echo $this->view->render("partidos/index", [
                'partidos' => $partidos,
                'categorias' => $categorias,
                'usuarios' => $usuarios,
                'clubs' => $clubs,
                'usuarioPartido' => $usuarioPartido                 
        ]);
    }

    //introduce los nuevos datos para un nuevo partido
    public function insertar()
    {                   
        $this->view->addData(['titulo' => 'Nuevo Partido']);
        $idSession = Session::get('idUsuario');
        $usuarioPartido = Session::set('usuarioPartido', $idSession); 

        $categorias = PartidosModel::getCategoria();
        $clubs = PartidosModel::getClub();        

        if(!$_POST) {

            echo $this->view->render('partidos/insertar', [
                'categorias' => $categorias,
                'clubs' => $clubs
            ]);            
        } 
        else {            
            //datos obligatorios que se necesitan para poder forman un partido
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

            if (PartidosModel::insertar($partido)) {

                header("Location: /partidos");
            } 
            else {

                echo $this->view->render('partidos/insertar', [
                    'categorias' => $categorias,
                    'clubs' => $clubs
                ]); 
            }            
        }
    }

}
