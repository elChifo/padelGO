<?php

class Mercadillo extends Controller
{

    public function index()
    {
        $this->view->addData(['titulo' => 'Mercadillo']);

        $articulos = MercadilloModel::getArticulos(); 
        $usuarios = MercadilloModel::getUsuario();       

            echo $this->view->render('mercadillo/index', [
                'articulos' => $articulos,
                'usuarios' => $usuarios
            ]);         
    }

    public function vender()
    {            
        $this->view->addData(['titulo' => 'Vender Artículo']);
        $idSession = Session::get('idUsuario');

        if (!$idSession) {

            header('location: ../error');
        }
        else {

            if (!$_POST) {

                echo $this->view->render('mercadillo/vender');
            } 
            else {

                $articulo = $_POST;            

                if (MercadilloModel::vender($articulo)) {

                    if (isset($_FILES['imagenArticulo'])) {

                    //Validar::imagen($_FILES['imagenContacto']);

                    $imagen['idArticulo'] = MercadilloModel::obtenerID($_POST['nombreArticulo']);
                    $imagen['imagenArticulo'] = $_FILES['imagenArticulo'];
                    $imagen['path'] = 'img/articulos/';

                    MercadilloModel::insertarImagen($imagen);
                }  

                    header("location: ../mercadillo/index");
                } 
                else {

                    echo $this->view->render('mercadillo/vender', [                    
                            'errores' => array('Error al vender'),
                            'articulo' => $articulo
                    ]);
                }
            } 
        }   
    }

    public function administrar()
    {
        $this->view->addData(['titulo' => 'Administrar Noticias']); 
        $idSession = Session::get('idUsuario');

        $noticias = NoticiasModel::getNoticias();        

        if ($idSession != 1) {

            header('location: ../error');
        }
        else {

            echo $this->view->render('noticias/administrar', [
                    'noticias' => $noticias
            ]);
        }
    }


    public function editar()
    {            
        $this->view->addData(['titulo' => 'Editar Articulo']);
        $idSession = Session::get('idUsuario');        

        $articulo = MercadilloModel::getIdArticulo($_GET['idArticulo']);

        if ($idSession != $articulo->idUsuario) {

            header("location: ../error/");     
        }
        else {

            if (!$_POST) {

                echo $this->view->render('mercadillo/editar', [
                    'articulo'  => $articulo
                ]);
            } 
            else { 

                $articulos = MercadilloModel::getArticulos(); 
                
                MercadilloModel::editar($_POST); 

                if (isset($_FILES['imagenArticulo'])) {

                    //Validar::imagen($_FILES['imagenContacto']);

                    $imagen['idArticulo'] = MercadilloModel::obtenerID($_POST['nombreArticulo']);
                    $imagen['imagenArticulo'] = $_FILES['imagenArticulo'];
                    $imagen['path'] = 'img/articulos/';

                    MercadilloModel::insertarImagen($imagen);
                } 

                
                header("location: ../login/articulos");               
                
            }
        }        
    }

    public function borrar()
    {
        $this->view->addData(['titulo' => 'Borrar Artículo']);         
        $idSession = Session::get('idUsuario');       

        $idArticulo = $_GET['idArticulo'];        

        if (!$idSession) {

            header('location: ../error');
        }
        else {

            MercadilloModel::borrar($idArticulo);
                
            Session::add('feedback_positive', "El Artículo a la venta ha sido Borrado.");

            header("location: ../login");           
        }

    }

}
