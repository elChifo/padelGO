<?php

class Mensajes extends Controller
{
    //funcion principal. Comprueba el acceso de nuevo usuario
    public function index()
    { 

    	$this->view->addData(['titulo' => 'Mensajes']);
        $idSession = Session::get('idUsuario');

    	if (!$idSession) {

            header('location: ../error');
        }
        else {

	        $mensajes = MensajesModel::getMensajes();
	        $usuarios = MensajesModel::getUsuario();
	        
	        echo $this->view->render('mensajes/index', [
	                'mensajes' => $mensajes,
	                'usuarios' => $usuarios
	        ]);  
    	}

    }



    public function enviar()
    {        
        $this->view->addData(['titulo' => 'Enviar Mensaje']);         
        $idSession = Session::get('idUsuario'); 

        if (!$idSession) {

            header('location: ../error');
        }
        else {

            $usuarios = MensajesModel::getUsuario(); 

            if (!$_POST) {

                echo $this->view->render('mensajes/enviar', [
                        'idSession' => $idSession,
                        'usuarios' => $usuarios
                ]);                
            }
            elseif ( empty($_POST['mensaje']) || 
                    (!isset($_POST['idReceptor'])) ||
                    ($_POST['idReceptor'] == '0') 
                ) {

                Session::add('feedback_negative', "Elija un Destinatario y escriba un Mensaje");

                echo $this->view->render('mensajes/enviar', [
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

                if (MensajesModel::enviar($mensaje)) {

                    Session::add('feedback_positive', "Su Mensaje ha sido Enviado correctamente.");

                    header('location: ../mensajes/index');

                }
                else {

                Session::add('feedback_negative', "El Envío no ha sido posible, Inténtelo de nuevo");

                    echo $this->view->render('mensajes/enviar', [
                            'idSession' => $idSession,
                            'usuarios' => $usuarios
                    ]);
                }
            }
        } 
    }






















}    