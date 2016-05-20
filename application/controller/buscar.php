<?php

class Buscar extends Controller
{
    //funcion principal. Comprueba centros, actividades, alumnos y sus IDs correspondientes
    public function index()
    {
        $this->view->addData(['titulo' => 'Padel GO!']);

        $centros = BuscarModel::getCentro();
        $actividades = BuscarModel::getActividad();
        $alumnos = BuscarModel::getAlumno();

        if (!$_POST) {
        echo $this->view->render("buscar/index", [
                'centros'     => $centros,
                'actividades' => $actividades,
                'alumnos'     => $alumnos
        ]);  

        }
        else if ($_POST['idCentro']) {

             echo $this->view->render("buscar/centro", [
                'centros'     => $centros
            ]);             
        }
        else if ($_POST['idActividad']) {

             echo $this->view->render("buscar/actividad", [
                'actividades'     =>   $actividades,
                'centros'         =>   $centros
            ]);             
        }
        else if ($_POST['idAlumno']) {

             echo $this->view->render("buscar/alumno", [
                'alumnos'         =>   $alumnos,
                'actividades'     =>   $actividades,
                'idAlumno'        =>   $_POST['idAlumno']
            ]);             
        }
        
       
                
    } 

   

}
