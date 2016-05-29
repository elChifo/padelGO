<?php

class Registro extends Controller
{
    //funcion principal. Comprueba el acceso de nuevo usuario
    public function index()
    {            
        $this->view->addData(['titulo' => 'Registro']);

        $categorias = RegistroModel::getCategoria();

        if (!$_POST) {

            echo $this->view->render('registro/index', [
                     'categorias' => $categorias]);
        } 
        else {
            //recoge todos los datos obligatorios en el formulario de registro
            $datos = array(
                 'nombre'      => $_POST["nombre"],
                 'apellidos'   => $_POST["apellidos"],
                 'sexo'        => $_POST["sexo"],
                 'fechaNac'    => $_POST["fechaNac"],
                 'direccion'   => $_POST["direccion"],
                 'telefono'    => $_POST["telefono"],            
                 'idCategoria' => $_POST["idCategoria"]
            );
            //comprueba si el usuario ya está registrado en la base de datos
            if (RegistroModel::existeEmail($_POST["email"])) {

                Session::add('feedback_negative', "El Email ya está registrado");

                echo $this->view->render('registro/index', [
                         'datos'      => $datos,
                         'categorias' => $categorias
                         ]);
            }
            else {
                //si todos los campos son correctos se completa el registro
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

                    if(isset($_FILES['imagenUsuario'])) {

                        //Validar::imagen($_FILES['imagenContacto']);

                        $imagen['idUsuario'] = RegistroModel::obtenerID($_POST['email']);
                        $imagen['imagenUsuario'] = $_FILES['imagenUsuario'];
                        $imagen['path'] = 'img/usuarios/';

                        RegistroModel::insertarImagen($imagen);
                    } 
                  
                    if ((isset($_SESSION['idUsuario'])) && ($_SESSION['idUsuario'] == 1)) {
                        
                            header("location: ../usuarios/administrar");       
                    }
                    else {

                        $login = array (
                            'email' => $_POST['email'],
                            'clave' => $_POST['clave']
                        );

                        LoginModel::logueado($login);

                        header("Location: /login");                        
                    }                     
                } 
                else {
                    //error al hacer el registro
                    Session::add('feedback_negative', "El Registro no ha sido posible, Inténtelo de nuevo");
                    //si se produce el fallo, salta la alerta y redirecciona
                    echo $this->view->render('registro/index', [
                            'datos'      => $datos,
                            'categorias' => $categorias
                            ]);
                }
            }            
        }
    }
}
        




    
