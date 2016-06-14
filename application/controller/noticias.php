<?php

class Noticias extends Controller
{

    public function index()
    {
        $this->view->addData(['titulo' => 'Noticias | Padel GO!']);

        $noticias = NoticiasModel::getNoticias();// Recoge todas las noticias de la base de datos

            echo $this->view->render('noticias/index', [ // Imprime la vista y añade datos
                'noticias' => $noticias
            ]);         
    }

    public function crear()
    {            
        $this->view->addData(['titulo' => 'Noticias | Crear']);
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión

        if ($idSession != 1) { // Error si no es Administrador

            header('location: ../error'); // LLama al controlador que trae la vista
        }
        else {

            if (!$_POST) {

                echo $this->view->render('noticias/crear'); // Imprime la vista 
            } 
            else {

                $noticia = $_POST;            

                if (NoticiasModel::crear($noticia)) {  // Inserta los datos en la base de datos

                    if (isset($_FILES['imagen'])) {

                        //Validar::imagen($_FILES['imagenContacto']);

                        $imagen['idNoticia'] = NoticiasModel::obtenerID($_POST['titular']);
                        $imagen['imagen'] = $_FILES['imagen'];
                        $imagen['path'] = 'img/noticias/';

                        NoticiasModel::insertarImagen($imagen); // Inserta los datos en la base de datos
                    }  

                    header("location: ../noticias/administrar"); // LLama al controlador que trae la vista
                } 
                else {

                    echo $this->view->render('noticias/crear', [ // Imprime la vista y añade datos 
                            'noticia' => $noticia
                    ]);
                }
            } 
        }   
    }

    public function administrar()
    {
        $this->view->addData(['titulo' => 'Noticias | Administrar']); 
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión

        $noticias = NoticiasModel::getNoticias();// Recoge todas las noticias de la base de datos 

        if ($idSession != 1) { // Error si no es Administrador

            header('location: ../error'); // LLama al controlador que trae la vista
        }
        else {

            echo $this->view->render('noticias/administrar', [ // Imprime la vista y añade datos
                    'noticias' => $noticias
            ]);
        }
    }


    public function editar()
    {            
        $this->view->addData(['titulo' => 'Noticias | Editar']);
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión        

        $noticia = NoticiasModel::getIdNoticia($_GET['idNoticia']); // Recoge la noticia mediante el ID

        if ($idSession != 1) { // Error si no es Administrador

            header("location: ../error/"); // LLama al controlador que trae la vista     
        }
        else {

            if (!$_POST) {

                echo $this->view->render('noticias/editar', [ // Imprime la vista y añade datos
                    'noticia'  => $noticia
                ]);
            } 
            else { 

                NoticiasModel::editar($_POST); // Edita los datos de la base de datos 

                if (isset($_FILES['imagen'])) {

                    //Validar::imagen($_FILES['imagenContacto']);

                    $imagen['idNoticia'] = NoticiasModel::obtenerID($_POST['titular']);
                    $imagen['imagen'] = $_FILES['imagen'];
                    $imagen['path'] = 'img/noticias/';

                    NoticiasModel::insertarImagen($imagen); // Edita los datos de la base de datos
                } 

                header("location: ../noticias/administrar"); // LLama al controlador que trae la vista 
                
            }
        }        
    }

    public function borrar()
    {
        $this->view->addData(['titulo' => 'Noticias | Borrar']);         
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión       

        $idNoticia = $_GET['idNoticia'];        

        if ($idSession != 1) { // Error si no es Administrador

            header('location: ../error'); // LLama al controlador que trae la vista
        }
        else {

            NoticiasModel::borrar($idNoticia); // Borra los datos del ID

            header("location: ../noticias/administrar"); // LLama al controlador que trae la vista 
        }

    }

}
