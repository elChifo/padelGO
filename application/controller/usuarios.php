<?php

class Usuarios extends Controller
{
    public function index() 
    {        
        $this->view->addData(['titulo' => 'Usuarios | Padel GO!']);

        $usuarios = UsuariosModel::getUsuario();  // Recoge todos los usuarios de la base de datos
        $categorias = UsuariosModel::getCategoria(); // Recoge todas las categorias de la base de datos
        $favoritos = FavoritosModel::getFavoritos(); // Recoge todos los favoritos de la base de datos

        echo $this->view->render('usuarios/index', [ // Imprime la vista y añade datos
                'usuarios'  => $usuarios,
                'categorias' => $categorias,
                'favoritos' => $favoritos
        ]);
    }
    

    public function administrar()
    {
        $this->view->addData(['titulo' => 'Usuarios | Administrar']);       
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión  

        $usuarios = UsuariosModel::getUsuario(); // Recoge todos los datos del usuario de la base de datos

        if ($idSession != 1) { // Error si no es Administrador

            header('location: ../error'); // LLama al controlador que trae la vista
        }
        else {

            echo $this->view->render('usuarios/administrar', [ // Imprime la vista y añade datos
                    'usuarios'     => $usuarios
            ]);
        }        
    }


    public function editar() 
    {        
        $this->view->addData(['titulo' => 'Usuarios | Editar']);        
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión 

        $categorias = UsuariosModel::getCategoria(); // Recoge todas las categorias de la base de datos 

        if (!$idSession) { // Error si no hay Usuario Logueado

            header('location: ../error'); // LLama al controlador que trae la vista
        }
        else {

            if ($idSession == 1) { // Si el usuario es el Administrador

                $usuario = UsuariosModel::getIdUsuario($_GET['idUsuario']); // Recoge el usuario mediante el ID    
            }
            else {

                $usuario = UsuariosModel::getIdUsuario($idSession); // Recoge el usuario mediante el ID 
            }

            if(!$_POST) {

                echo $this->view->render('usuarios/editar', [ // Imprime la vista y añade datos 
                        'usuario'      => $usuario,
                        'categorias'   => $categorias
                ]); 
            }
            else {

                $usuarioNuevo = $_POST;

                if ($usuarioNuevo['email'] == $usuario->email) { // Comprueba si el correo es el mismo

                    $emailRepetido = false;
                }
                else {

                    $emailRepetido = UsuariosModel::existeEmail($usuarioNuevo['email']); //Comprueba si existe el email del usuario
                }

                if ($emailRepetido == false) { 

                    UsuariosModel::editar($usuarioNuevo); // Edita los datos de la base de datos

                    if(isset($_FILES['imagenUsuario'])) {

                        //Validar::imagen($_FILES['imagenContacto']);

                        $imagen['idUsuario'] = RegistroModel::obtenerID($usuarioNuevo['email']);
                        $imagen['imagenUsuario'] = $_FILES['imagenUsuario'];
                        $imagen['path'] = 'img/usuarios/';

                        RegistroModel::insertarImagen($imagen); // Edita los datos de la base de datos                    
                    }

                    if ($idSession == 1) {  // Si el usuario es el Administrador

                        header("location: ../usuarios/administrar"); // LLama al controlador que trae la vista
                    }
                    else {

                        header("location: ../login/"); // LLama al controlador que trae la vista
                    }                
                }
                else {

                   Session::add('feedback_negative', 
                                'Este Email pertenece a otro Usuario. Por Favor, escoja otro Email.'); 

                    echo $this->view->render('usuarios/editar', [ // Imprime la vista y añade datos
                        'usuario'      => $usuario,
                        'categorias'   => $categorias
                    ]);
                   
                } 
            }
        }
    }  


    public function borrar()
    {
        $this->view->addData(['titulo' => 'Usuarios | Borrar']);         
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión       

        $idUsuario = $_GET['idUsuario'];        

        if ($idSession != 1) { // Error si no es Administrador

            header('location: ../error'); // LLama al controlador que trae la vista
        }
        else {

            UsuariosModel::borrar($idUsuario); // Borra los datos del ID

            header('location: ../usuarios'); // LLama al controlador que trae la vista           
           
        }

    }

    public function cancelacion()
    {        
        $this->view->addData(['titulo' => 'Usuarios | Cancelación']);         
        $idSession = Session::get('idUsuario');  // Recoge el Usuario Logueado en Sesión   

        if (!$idSession) {
            
            header('location: ../error'); // LLama al controlador que trae la vista
        }
        else {

            if (!$_POST) {

                echo $this->view->render('usuarios/cancelacion', [ // Imprime la vista y añade datos
                        'idSession' => $idSession 
                ]);
            }
            elseif ( empty($_POST['otrosmotivos']) && 
                    (!isset($_POST['privacidad'])) &&
                    (!isset($_POST['dificultad'])) &&
                    (!isset($_POST['negativa'])) &&
                    (!isset($_POST['desuso'])) 
                ) {

                Session::add('feedback_negative', "Escoja un motivo e Inténtelo de nuevo");

                echo $this->view->render('usuarios/cancelacion', [ // Imprime la vista y añade datos
                        'idSession' => $idSession 
                ]);
            } 
            else {

                $fecha = time();

                $fechaMensaje = date("Y-m-d H:i:s", $fecha);

                $motivos = 'Motivos de Cancelación de Cuenta: <br><br>';

                if (isset($_POST['privacidad'])) {
                    $privacidad = $_POST['privacidad'];
                    $motivos = $motivos .= $privacidad . '<br><br>';
                }
                if (isset($_POST['dificultad'])) {
                    $dificultad = $_POST['dificultad'];
                    $motivos = $motivos .= $dificultad . '<br><br>';
                }
                if (isset($_POST['malaImpresion'])) {
                    $malaImpresion = $_POST['malaImpresion'];
                    $motivos = $motivos .= $malaImpresion . '<br><br>';
                }
                if (isset($_POST['desuso'])) {
                    $desuso = $_POST['desuso'];
                    $motivos = $motivos .= $desuso . '<br><br>';
                }
                if (!empty($_POST['otrosmotivos'])) {
                    $otrosmotivos = $_POST['otrosmotivos'];
                    $motivos = $motivos .= 'Otros Motivos: <br>' . $otrosmotivos;
                }

                $mensaje = array(                              
                    'idUsuario' => $idSession,
                    'idReceptor' => '1',
                    'fechaMensaje' => $fechaMensaje,
                    'mensaje' => $motivos
                );

                if (MensajesModel::enviar($mensaje)) { // Inserta los datos en la base de datos

                    Session::add('feedback_positive', "Su Cuenta será Cancelada en menos de 24 Horas.");

                    header('location: ../login'); // LLama al controlador que trae la vista

                }
                else {

                    Session::add('feedback_negative', "La Cancelación no es posible, Inténtelo de nuevo");

                    echo $this->view->render('usuarios/cancelacion', [ // Imprime la vista y añade datos
                            'idSession' => $idSession 
                    ]);
                }
            } 
        }
    }


}


    