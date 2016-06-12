<?php

class Favoritos extends Controller
{
    //funcion principal. Comprueba el usuario
    public function agregar() 
    {        
        $this->view->addData(['titulo' => 'Favoritos | Padel GO!']);
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión

         if (!$idSession) { // Error si no hay Usuario Logueado

            header('location: ../error'); // LLama al controlador que trae la vista
        }
        else {

            $datos = array(
                    'idUsuario' => $idSession,
                    'Favorito' => $_GET['idUsuario']
                );

            $favoritosID = FavoritosModel::existeFavorito($datos); // Comprueba si existe el Favorito 

            if ($favoritosID) {

                FavoritosModel::agregar($datos); // Inserta los datos en la base de datos
            }
            else {
                Session::add('feedback_negative', 'El Usuario ya está agregado a Favoritos');
            }

            header('location: ../usuarios'); // LLama al controlador que trae la vista
        }
    }   

    public function quitar() 
    {        
        $this->view->addData(['titulo' => 'Favoritos | Padel GO!']);
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión

        if (!$idSession) { // Error si no hay Usuario Logueado

            header('location: ../error'); // LLama al controlador que trae la vista
        }
        else {

            $favorito = array(
                'idUsuario' => $idSession,
                'Favorito' => $_GET['idUsuario']
            );

            FavoritosModel::quitar($favorito); // Borra los datos del ID


            header('location: ../usuarios'); // LLama al controlador que trae la vista
        }


    }
}