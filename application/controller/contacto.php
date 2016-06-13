<?php
class Contacto extends Controller
{

    public function index()
    {        
        $this->view->addData(['titulo' => 'Contacto | Padel GO!']);         
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión   

        if (!$_POST) {

            echo $this->view->render('contacto/index'); // Imprime la vista 
        }            
        else {
        	
            $fecha = time();

            $fechaMensaje = date("Y-m-d H:i:s", $fecha);

            $contacto = 'Formulario de Contacto. <br><br>';
           
            $nombreContacto = 'NOMBRE: ' . $_POST['nombreContacto'];
            $contacto = $contacto .= $nombreContacto . '<br><br>';          
        
            $emailContacto = 'EMAIL: ' . $_POST['emailContacto'];
            $contacto = $contacto .= $emailContacto . '<br><br>';
            
            if (isset($_POST['telefonoContacto'])) {
                $telefonoContacto = 'TELÉFONO: ' . $_POST['telefonoContacto'];
                $contacto = $contacto .= $telefonoContacto . '<br><br>';
            }
            
            $comentarioContacto = 'COMENTARIO: ' . $_POST['comentarioContacto'];
            $contacto = $contacto .= $comentarioContacto . '<br><br>';
            
            if (isset($idSession)) {

            	$mensaje = array(                              
	                'idUsuario' => $idSession,
	                'idReceptor' => '1',
	                'fechaMensaje' => $fechaMensaje,
	                'mensaje' => $contacto
            	);
            }
            else {
            	
            	$mensaje = array(                              
	                'idUsuario' => '1',
	                'idReceptor' => '1',
	                'fechaMensaje' => $fechaMensaje,
	                'mensaje' => $contacto
            	);
            }

            if (MensajesModel::enviar($mensaje)) { // Inserta los datos en la base de datos

                Session::add('feedback_positive', "Su Comentario ha sido enviado");

            }
            else {

                Session::add('feedback_negative', "El Comentario no ha sido enviado. Inténtelo de nuevo");
            }

            header('location: ../contacto'); // LLama al controlador que trae la vista
        } 
        
    }

}
