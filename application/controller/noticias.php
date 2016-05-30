<?php
class Noticias extends Controller
{

    public function index()
    {
        $this->view->addData(['titulo' => 'Noticias']);

        $noticias = NoticiasModel::getNoticias();

            echo $this->view->render('noticias/index', [
                'noticias' => $noticias
            ]);         
    }

    public function crear()
    {            
        $this->view->addData(['titulo' => 'Crear Noticia']);

        $idSession = Session::get('idUsuario');

        if ($idSession != 1) {

            header('location: ../error');
        }
        else {

            if (!$_POST) {

                echo $this->view->render('noticias/crear');
            } 
            else {

                $noticia = $_POST;            

                if (NoticiasModel::crear($noticia)) {

                    if (isset($_FILES['imagen'])) {

                        //Validar::imagen($_FILES['imagenContacto']);

                        $imagen['idNoticia'] = NoticiasModel::obtenerID($_POST['titular']);
                        $imagen['imagen'] = $_FILES['imagen'];
                        $imagen['path'] = 'img/noticias/';

                        NoticiasModel::insertarImagen($imagen);
                    }  

                    header("location: ../noticias/administrar");
                } 
                else {

                    echo $this->view->render('noticias/crear', [                    
                            'errores' => array('Error al insertar'),
                            'noticia' => $noticia
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
        $this->view->addData(['titulo' => 'Editar Noticia']);
        $idSession = Session::get('idUsuario');        

        $noticia = NoticiasModel::getIdNoticia($_GET['idNoticia']);

        if ($idSession != 1) {

            header("location: ../error/");     
        }
        else {

            if (!$_POST) {

                echo $this->view->render('noticias/editar', [
                    'noticia'  => $noticia
                ]);
            } 
            else { 

                NoticiasModel::editar($_POST);  

                if (isset($_FILES['imagen'])) {

                    //Validar::imagen($_FILES['imagenContacto']);

                    $imagen['idNoticia'] = NoticiasModel::obtenerID($_POST['titular']);
                    $imagen['imagen'] = $_FILES['imagen'];
                    $imagen['path'] = 'img/noticias/';

                    NoticiasModel::insertarImagen($imagen);
                } 

                header("location: ../noticias/administrar");                
                
            }
        }        
    }

}
