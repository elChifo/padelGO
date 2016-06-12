<?php

class Monitores extends Controller
{
    //funcion principal. Comprueba el acceso de nuevo usuario
    public function index()
    { 

    	$this->view->addData(['titulo' => 'Monitores | Padel GO!']);
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión

        $monitores = MonitoresModel::getMonitores(); // Recoge todos los monitores de la base de datos
        $usuarios = MonitoresModel::getUsuario(); // Recoge todos los usuarios de la base de datos
        
        echo $this->view->render('monitores/index', [ // Imprime la vista y añade datos
                'monitores' => $monitores,
                'usuarios' => $usuarios
        ]);  
    	

    }

    public function solicitar()
    {        
        $this->view->addData(['titulo' => 'Monitores | Solicitud']);         
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión  

        if (!$idSession) { // Error si no hay Usuario Logueado
            
            header('location: ../error'); // LLama al controlador que trae la vista
        }
        else {

            if (!$_POST) {

                echo $this->view->render('monitores/solicitar'); // Imprime la vista 

            }
            elseif (  empty($_POST['formacion'])   ||
                      empty($_POST['experiencia']) ||                  
                      empty($_POST['anuncio'])     ||
                      empty($_POST['horarios']) 
                ) {

                Session::add('feedback_negative', "Los Campos son Obligatorios. Rellene el Formulario");

                echo $this->view->render('monitores/solicitar'); // Imprime la vista 
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

                if (MensajesModel::enviar($mensaje)) { // Inserta los datos en la base de datos

                    Session::add('feedback_positive', "Le llegará una Respuesta en menos de 24 Horas.");

                    header('location: ../login'); // LLama al controlador que trae la vista

                }
                else {

                    Session::add('feedback_negative', "La Solicitud no es posible, Inténtelo de nuevo");

                    header('location: ../monitores/solicitar'); // LLama al controlador que trae la vista
                }
            }
        } 
    }



    public function agregar()
    {            
        $this->view->addData(['titulo' => 'Monitores | Agragar']);
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión

        if ($idSession != 1) { // Error si no es Administrador

            header('location: ../error'); // LLama al controlador que trae la vista
        }
        else {

            if (!$_POST) {

                $usuarios = MonitoresModel::getUsuario(); // Recoge todos los usuarios de la base de datos
                
                echo $this->view->render('monitores/agregar', [ // Imprime la vista y añade datos
                        'usuarios' => $usuarios
                ]);
            } 
            else {

               $monitor = $_POST;            

                if (MonitoresModel::agregar($monitor)) { // Inserta los datos en la base de datos  

                    header("location: ../monitores/index"); // LLama al controlador que trae la vista
                } 
                else {

                    echo $this->view->render('monitores/agregar', [ // Imprime la vista y añade datos 
                            'errores' => array('Error al Agregar'),
                            'monitor' => $monitor
                    ]);
                }
            } 
        }   
    }












}    