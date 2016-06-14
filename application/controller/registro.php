<?php

class Registro extends Controller
{

    public function index()
    {            
        $this->view->addData(['titulo' => 'Registro | Padel GO!']);

        $categorias = RegistroModel::getCategoria(); // Recoge todas las categorias de la base de datos

        if (!$_POST) {

            echo $this->view->render('registro/index', [ // Imprime la vista y añade datos
                     'categorias' => $categorias
            ]);
        } 
        else {

            $registro = $_POST;

            if (RegistroModel::existeEmail($_POST["email"])) { //Comprueba si existe el email del usuario

                Session::add('feedback_negative', "El Email ya está registrado");

                echo $this->view->render('registro/index', [ // Imprime la vista y añade datos
                         'registro'   => $registro,
                         'categorias' => $categorias
                ]);
            }
            else {

                if (RegistroModel::insertar($registro)) { // Inserta los datos en la base de datos

                    if (isset($_FILES['imagenUsuario'])) {

                        //Validar::imagen($_FILES['imagenContacto']);

                        $imagen['idUsuario'] = RegistroModel::obtenerID($_POST['email']);
                        $imagen['imagenUsuario'] = $_FILES['imagenUsuario'];
                        $imagen['path'] = 'img/usuarios/';

                        RegistroModel::insertarImagen($imagen); // Inserta los datos en la base de datos
                    } 
                  
                    if ((isset($_SESSION['idUsuario'])) && ($_SESSION['idUsuario'] == 1)) {
                        
                            header("location: ../usuarios/administrar"); // LLama al controlador que trae la vista      
                    }
                    else {

                        $login = array (
                            'email' => $_POST['email'],
                            'clave' => $_POST['clave']
                        );

                        if (LoginModel::logueado($login)) { // Comprueba si se ha logueado el Usuario

                            header("Location: /login"); // LLama al controlador que trae la vista
                        }                        
                    }                     
                } 
                else {

                    Session::add('feedback_negative', "El Registro no ha sido posible, Inténtelo de nuevo");

                    echo $this->view->render('registro/index', [ // Imprime la vista y añade datos
                         'registro'   => $registro,
                         'categorias' => $categorias
                ]);
                }
            }            
        }
    }
}
        




    
