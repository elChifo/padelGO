<?php

class Mensajes extends Controller
{
    //funcion principal. Comprueba el acceso de nuevo usuario
    public function index()
    { 

    	$this->view->addData(['titulo' => 'Mensajes | Padel GO!']);
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión

    	if (!$idSession) { // Error si no hay Usuario Logueado

            header('location: ../error'); // LLama al controlador que trae la vista
        }
        else {

	        $mensajes = MensajesModel::getMensajes(); // Recoge todos los mensajes de la base de datos
	        $usuarios = MensajesModel::getUsuario(); // Recoge todos los usuarios de la base de datos
	        
	        echo $this->view->render('mensajes/index', [ // Imprime la vista y añade datos
	                'mensajes' => $mensajes,
	                'usuarios' => $usuarios
	        ]);  
    	}

    }



    public function enviar()
    {        
        $this->view->addData(['titulo' => 'Mensajes | Enviar']);         
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión 

        if (!$idSession) { // Error si no hay Usuario Logueado

            header('location: ../error'); // LLama al controlador que trae la vista
        }
        else {

            $usuarios = MensajesModel::getUsuario(); // Recoge todos los usuarios de la base de datos 

            if (!$_POST) {

                echo $this->view->render('mensajes/enviar', [ // Imprime la vista y añade datos
                        'idSession' => $idSession,
                        'usuarios' => $usuarios
                ]);                
            }
            elseif ( empty($_POST['mensaje'])      || 
                    (!isset($_POST['idReceptor'])) ||
                    ($_POST['idReceptor'] == '0') 
                ) {

                Session::add('feedback_negative', "Elija un Destinatario y escriba un Mensaje");

                echo $this->view->render('mensajes/enviar', [ // Imprime la vista y añade datos
                        'idSession' => $idSession,
                        'usuarios' => $usuarios
                ]); 
            }
            else {

                $fecha = time();

                $fechaMensaje = date("Y-m-d H:i:s", $fecha);            

                $mensaje = array(                              
                    'idUsuario' => $idSession,
                    'idReceptor' => $_POST['idReceptor'],
                    'fechaMensaje' => $fechaMensaje,
                    'mensaje' => $_POST['mensaje']
                );

                if (MensajesModel::enviar($mensaje)) {  // Inserta los datos en la base de datos

                    Session::add('feedback_positive', "Su Mensaje ha sido Enviado correctamente.");

                    header('location: ../mensajes/index'); // LLama al controlador que trae la vista

                }
                else {

                Session::add('feedback_negative', "El Envío no ha sido posible, Inténtelo de nuevo");

                    echo $this->view->render('mensajes/enviar', [ // Imprime la vista y añade datos
                            'idSession' => $idSession,
                            'usuarios' => $usuarios
                    ]);
                }
            }
        } 
    }






















}    