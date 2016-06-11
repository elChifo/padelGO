<?php

class Favoritos extends Controller
{
    //funcion principal. Comprueba el usuario
    public function agregar() 
    {        
        $this->view->addData(['titulo' => 'Favoritos']);
        $idSession = Session::get('idUsuario');

         if (!$idSession) {

            header('location: ../error');
        }
        else {

            $datos = array(
                    'idUsuario' => $idSession,
                    'Favorito' => $_GET['idUsuario']
                );

            $favoritosID = FavoritosModel::existeFavorito($datos);

            if ($favoritosID) {

                FavoritosModel::agregar($datos);
            }
            else {
                Session::add('feedback_negative', 'El Usuario ya está agregado a Favoritos');
            }

            header('location: ../usuarios');
        }
    }   

    public function quitar() 
    {        
        $this->view->addData(['titulo' => 'Favoritos']);
        $idSession = Session::get('idUsuario');

        $favorito = array(
                'idUsuario' => $idSession,
                'Favorito' => $_GET['idUsuario']
            );

        FavoritosModel::quitar($favorito);


        header('location: ../usuarios');


    }
}