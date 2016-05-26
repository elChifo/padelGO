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

        $noticias = NoticiasModel::getNoticias();

        if (!$_POST) {

            echo $this->view->render('noticias/crear', [
                'noticias' => $noticias
            ]);
        } 
        else {

            if(!isset($_POST["titular"])) {
                $_POST["titular"] = "";
            }
            if(!isset($_POST["fechaNoticia"])) {
                $_POST["fechaNoticia"] = "";
            }
            if(!isset($_POST["contenido"])) {
                $_POST["contenido"] = "";
            }

            $datos = array(
                'titular' => $_POST["titular"],
                'fechaNoticia' => $_POST["fechaNoticia"],
                'contenido' => $_POST["contenido"],
                //'imagen' => $_POST["imagen"]
            );

            if(NoticiasModel::crear($datos)) {

                 header("location: ../noticias/index");
            } 
            else {
                echo $this->view->render('noticias/crear', 
                        array(
                            'errores' => array('Error al insertar'),
                            'datos' => $_POST
                        ));
            }
        }        
    }

    public function administrar()
    {
        $this->view->addData(['titulo' => 'Administrar Clubs']);         
        $noticias = NoticiasModel::getNoticias();

        echo $this->view->render('noticias/administrar', [
                'noticias' => $noticias
        ]);
    }




}
