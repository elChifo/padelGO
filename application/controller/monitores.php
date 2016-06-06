<?php

class Monitores extends Controller
{
    //funcion principal. Comprueba el acceso de nuevo usuario
    public function index()
    { 

    	$this->view->addData(['titulo' => 'Monitores']);
        $idSession = Session::get('idUsuario');

	        $monitores = MonitoresModel::getMonitores();
	        $usuarios = MonitoresModel::getUsuario();
	        
	        echo $this->view->render('monitores/index', [
	                'monitores' => $monitores,
	                'usuarios' => $usuarios
	        ]);  
    	

    }

    public function solicitar()
    {        
        $this->view->addData(['titulo' => 'Solicitud Monitor']);         
        $idSession = Session::get('idUsuario');   

        if (!$_POST) {

            echo $this->view->render('monitores/solicitar');

        }
        elseif ( empty($_POST['formacion']) ||
                  empty($_POST['experiencia']) ||                  
                  empty($_POST['anuncio']) ||
                  empty($_POST['horarios']) 
            ) {

            Session::add('feedback_negative', "Los Campos son Obligatorios. Rellene el Formulario");

            echo $this->view->render('monitores/solicitar');
        } 
        else {

            $fecha = time();

            $fechaMensaje = date("Y-m-d H:i:s", $fecha);

            $formacion = 'FORMACIÓN: ' . $_POST['formacion'] . '<br><br>';
            $experiencia = 'EXPERIENCIA: ' . $_POST['experiencia'] . '<br><br>';
            $anuncio = 'ANUNCIO: ' . $_POST['anuncio'] . '<br><br>';
            $horarios = 'HORARIOS Y PRECIOS: ' . $_POST['horarios'];

            $solicitud = 'Solicitud para Ofrecerse como Monitor: <br><br>' . 
                        $formacion . $experiencia . $anuncio . $horarios;
            
            $mensaje = array(                              
                'idUsuario' => $idSession,
                'idReceptor' => '1',
                'fechaMensaje' => $fechaMensaje,
                'mensaje' => $solicitud
            );


            var_dump($mensaje);

            if (MensajesModel::enviar($mensaje)) {

                Session::add('feedback_positive', "Le llegará una Respuesta en menos de 24 Horas.");

                header('location: ../login');

            }
            else {

                Session::add('feedback_negative', "La Solicitud no es posible, Inténtelo de nuevo");

                header('location: ../monitores/solicitar');
            }
        } 
    }



    public function agregar()
    {            
        $this->view->addData(['titulo' => 'Agragar Monitor']);
        $idSession = Session::get('idUsuario');

        if ($idSession != 1) {

            header('location: ../error');
        }
        else {

            if (!$_POST) {

                $usuarios = MonitoresModel::getUsuario();
                
                echo $this->view->render('monitores/agregar', [
                        'usuarios' => $usuarios
                ]);
            } 
            else {

               $monitor = $_POST;            

                if (MonitoresModel::agregar($monitor)) {                    

                    header("location: ../monitores/index");
                } 
                else {

                    echo $this->view->render('monitores/agregar', [                    
                            'errores' => array('Error al Agregar'),
                            'monitor' => $monitor
                    ]);
                }
            } 
        }   
    }












}    