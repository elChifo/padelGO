<?php

class Registro extends Controller
{
    public function index()
    {            
        $this->view->addData(['titulo' => 'Padel GO!']);

        $categorias = RegistroModel::getCategoria();

        if (!$_POST) {
            echo $this->view->render('registro/index', [
            'categorias' => $categorias]);
        } 
        else {

            if(!isset($_POST["nombre"])) {
                $_POST["nombre"] = "";
            }
            if(!isset($_POST["apellidos"])) {
                $_POST["apellidos"] = "";
            }
            if(!isset($_POST["sexo"])) {
                $_POST["sexo"] = "";
            }
            if(!isset($_POST["fechaNac"])) {
                $_POST["fechaNac"] = "";
            }
            if(!isset($_POST["direccion"])) {
                $_POST["direccion"] = "";
            }
            if(!isset($_POST["telefono"])) {
                $_POST["telefono"] = "";
            }
            if(!isset($_POST["email"])) {
                $_POST["email"] = "";
            }
            if(!isset($_POST["clave"])) {
                $_POST["clave"] = "";
            }

            $datos = array(
                'nombre' => $_POST["nombre"],
                'apellidos' => $_POST["apellidos"],
                'sexo' => $_POST["sexo"],
                'fechaNac' => $_POST["fechaNac"],
                'direccion' => $_POST["direccion"],
                'telefono' => $_POST["telefono"],
                'email' => $_POST["email"],
                'clave' => $_POST["clave"],                
                'idCategoria' => $_POST["idCategoria"]
            );

            if(RegistroModel::insertar($datos)) {
                echo $this->view->render('registro/registrado');
            } 
            else {
                echo $this->view->render('registro/index', [
                        'errores' => array('Error al insertar'),
                        'datos' => $datos,
                        'categorias' => $categorias
                        ]);
            }
        }
    }
           
/*

    public function editar($id = 0)
    {
        if(!$_POST){

            $this->view->addData(['titulo' => 'Actividades Extraescolares']);

            $centros = ActividadesModel::getCentro();
            $idActividad = ActividadesModel::getIdActividad($id);

            if($idActividad) {
                echo $this->view->render('actividades/formulario', array(
                        'idActividad' => get_object_vars($idActividad),
                        'accion' => 'editar',
                        'centros' => $centros
                 ));
            } 
            else {
                header("location: /actividades");
            }
        } 
        else {
            $datos = array(
                'nombreActividad' => (isset($_POST["nombreActividad"])) ? $_POST["nombreActividad"] : "",
                'monitor' => (isset($_POST["monitor"])) ? $_POST["monitor"] : "",
                'descripcion' => (isset($_POST["descripcion"])) ? $_POST["descripcion"] : "",
                'idCentro' => (isset($_POST["idCentro"])) ? $_POST["idCentro"] : "",
                'idActividad' => (isset($_POST["idActividad"])) ? $_POST["idActividad"] : ""
            );

            if(ActividadesModel::editar($datos)) {
                
                header('location: /actividades');
            } 
            else {
                echo $this->view->render('actividades/formulario', array(
                    'errores' => array('Error al editar'),
                    'datos'   => $_POST,
                    'accion'  => 'editar'
                ));
            }
        }
    }
*/
/*
    public function privado()
    {
        $this->view->addData(['titulo' => 'Actividades Extraescolares']);

        $actividades = ActividadesModel::getActividad();
        $centros = ActividadesModel::getCentro();
      
        echo $this->view->render("actividades/privado", [
                'actividades' => $actividades,
                'centros'     => $centros
        ]);
    }

*/



    
}