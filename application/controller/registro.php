<?php

class Registro extends Controller
{
    public function index()
    {            
        $this->view->addData(['titulo' => 'Registro']);

        $categorias = RegistroModel::getCategoria();

        if (!$_POST) {

            echo $this->view->render('registro/index', [
                     'categorias' => $categorias]);
        } 
        else {

            $datos = array(
                 'nombre'      => $_POST["nombre"],
                 'apellidos'   => $_POST["apellidos"],
                 'sexo'        => $_POST["sexo"],
                 'fechaNac'    => $_POST["fechaNac"],
                 'direccion'   => $_POST["direccion"],
                 'telefono'    => $_POST["telefono"],            
                 'idCategoria' => $_POST["idCategoria"]
            );

            if (RegistroModel::existeEmail($_POST["email"])) {

                Session::add('feedback_negative', "El Email ya está registrado");

                echo $this->view->render('registro/index', [
                         'datos'      => $datos,
                         'categorias' => $categorias
                         ]);
            }
            else {

                $registro = array(
                    'nombre'      => $_POST["nombre"],
                    'apellidos'   => $_POST["apellidos"],
                    'sexo'        => $_POST["sexo"],
                    'fechaNac'    => $_POST["fechaNac"],
                    'direccion'   => $_POST["direccion"],
                    'telefono'    => $_POST["telefono"],
                    'email'       => $_POST["email"],
                    'clave'       => $_POST["clave"],                
                    'idCategoria' => $_POST["idCategoria"]
                );

                if(RegistroModel::insertar($registro)) {

                    echo $this->view->render('registro/registrado');
                } 
                else {

                    Session::add('feedback_negative', "El Registro NO ha sido posible... Inténtelo de nuevo");

                    echo $this->view->render('registro/index', [
                            'datos'      => $datos,
                            'categorias' => $categorias
                            ]);
                }
            }            
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



    
