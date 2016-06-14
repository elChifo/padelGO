<?php

class Mercadillo extends Controller
{

    public function index()
    {
        $this->view->addData(['titulo' => 'Mercadillo | Padel GO!']);

        $articulos = MercadilloModel::getArticulos(); // Recoge todos los articulos de la base de datos 
        $usuarios = MercadilloModel::getUsuario();  // Recoge todos los usuarios de la base de datos

            echo $this->view->render('mercadillo/index', [ // Imprime la vista y añade datos
                'articulos' => $articulos,
                'usuarios' => $usuarios
            ]);         
    }

    public function vender()
    {            
        $this->view->addData(['titulo' => 'Mercadillo | Vender']);
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión

        if (!$idSession) { // Error si no hay Usuario Logueado

            header('location: ../error'); // LLama al controlador que trae la vista
        }
        else {

            if (!$_POST) {

                echo $this->view->render('mercadillo/vender'); // Imprime la vista  
            } 
            else {

                $articulo = $_POST;            

                if (MercadilloModel::vender($articulo)) { // Inserta los datos en la base de datos

                    if (isset($_FILES['imagenArticulo'])) {

                    //Validar::imagen($_FILES['imagenContacto']);

                    $imagen['idArticulo'] = MercadilloModel::obtenerID($_POST['nombreArticulo']);
                    $imagen['imagenArticulo'] = $_FILES['imagenArticulo'];
                    $imagen['path'] = 'img/articulos/';

                    MercadilloModel::insertarImagen($imagen); // Inserta los datos en la base de datos
                }  

                    header("location: ../mercadillo/index"); // LLama al controlador que trae la vista
                } 
                else {

                    echo $this->view->render('mercadillo/vender', [ // Imprime la vista y añade datos 
                            'articulo' => $articulo
                    ]);
                }
            } 
        }   
    }

    public function editar()
    {            
        $this->view->addData(['titulo' => 'Mercadillo | Editar']);
        $idSession = Session::get('idUsuario');   // Recoge el Usuario Logueado en Sesión       

        $articulo = MercadilloModel::getIdArticulo($_GET['idArticulo']); // Recoge el articulo mediante el ID

        if ($idSession != $articulo->idUsuario) {  // Error si no hay Usuario Logueado

            header("location: ../error/"); // LLama al controlador que trae la vista    
        }
        else {

            if (!$_POST) {

                echo $this->view->render('mercadillo/editar', [ // Imprime la vista y añade datos
                    'articulo'  => $articulo
                ]);
            } 
            else { 

                $articulos = MercadilloModel::getArticulos(); // Recoge todos los articulos de la base de datos
                
                MercadilloModel::editar($_POST); // Edita los datos de la base de datos 

                if (isset($_FILES['imagenArticulo'])) {

                    //Validar::imagen($_FILES['imagenContacto']);

                    $imagen['idArticulo'] = MercadilloModel::obtenerID($_POST['nombreArticulo']);
                    $imagen['imagenArticulo'] = $_FILES['imagenArticulo'];
                    $imagen['path'] = 'img/articulos/';

                    MercadilloModel::insertarImagen($imagen); // Edita los datos de la base de datos
                } 
                                
                header("location: ../login/articulos"); // LLama al controlador que trae la vista               
                
            }
        }        
    }

    public function borrar()
    {
        $this->view->addData(['titulo' => 'Mercadillo | Borrar']);         
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión       

        $idArticulo = $_GET['idArticulo'];        

        if (!$idSession) { // Error si no hay Usuario Logueado

            header('location: ../error'); // LLama al controlador que trae la vista
        }
        else {

            MercadilloModel::borrar($idArticulo); // Borra los datos del ID
                
            Session::add('feedback_positive', "El Artículo a la venta ha sido Borrado.");

            header("location: ../login"); // LLama al controlador que trae la vista          
        }

    }

}
