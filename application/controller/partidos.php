<?php

class Partidos extends Controller
{
   	public function index()
   	{
        $this->view->addData(['titulo' => 'Partidos']);

        $partidos = PartidosModel::getPartido();
        $categorias = PartidosModel::getCategoria();
        $usuarios = PartidosModel::getUsuario();
        $clubs = PartidosModel::getClub();

        $idUsuario = Session::get('idUsuario');
        $usuarioPartido = Session::set('usuarioPartido', $idUsuario);
      

        echo $this->view->render("partidos/index", [
                'partidos' => $partidos,
                'categorias' => $categorias,
                'usuarios' => $usuarios,
                'clubs' => $clubs, 
                'idUsuario' => $idUsuario,
                'usuarioPartido' => $usuarioPartido
        ]);
    }

    public function insertar()
    {                   
        $this->view->addData(['titulo' => 'Nuevo Partido']);

        $partidos = PartidosModel::getPartido();
        $categorias = PartidosModel::getCategoria();
        $usuarios = UsuariosModel::getUsuario();
        $usuarioPartido = PartidosModel::getIdUsuario(Session::get('idUsuario'));
        $clubs = PartidosModel::getClub();

        $idUsuario = Session::get('idUsuario');
        $usuarioPartido = Session::set('usuarioPartido', $idUsuario);

        if(!$_POST) {

            echo $this->view->render('partidos/insertar', [
                'categorias' => $categorias,
                'usuarios' => $usuarios,
                'clubs' => $clubs, 
                'usuarioPartido' => $usuarioPartido
            ]);            
        } 
        else {            

            $datos = array(                              
                'tipoPartido' => $_POST["tipoPartido"],
                'fechaPartido' => $_POST["fechaPartido"],
                'horaPartido' => $_POST["horaPartido"],
                'jugador1' => $_POST["jugador1"],
                'jugador2' => $_POST["jugador2"],
                'jugador3' => $_POST["jugador3"],
                'jugador4' => $_POST["jugador4"],
                'idCategoria' => $_POST["idCategoria"],
                'idUsuario' => Session::get('idUsuario'),
                'idClub' => $_POST["idClub"],
            );

            if (!PartidosModel::insertar($datos)) {

                echo $this->view->render('partidos/index', [
                    'partidos' => $partidos,
                    'categorias' => $categorias,
                    'usuarios' => $usuarios,
                    'clubs' => $clubs, 
                    'idUsuario' => $idUsuario,
                    'usuarioPartido' => $usuarioPartido
                ]); 
            } 
            else {

                echo $this->view->render('partidos/index', [
                    'partidos' => $partidos,
                    'categorias' => $categorias,
                    'usuarios' => $usuarios,
                    'clubs' => $clubs, 
                    'idUsuario' => $idUsuario,
                    'usuarioPartido' => $usuarioPartido
                ]);
            }
            
        }
    }

    public function editar($id = 0)
    {
        if(!$_POST){

            $this->view->addData(['titulo' => 'Actividades Extraescolares']);

            $centros = ActividadesModel::getCentro();
            $idActividad = ActividadesModel::getIdActividad($id);

            if($idActividad) {
                echo $this->view->render('actividades/formulario', array(
                        'idActividad' => get_object_vars($idActividad),
                        'accion' => 'editar',
                        'centros' => $centros
                 ));
            } 
            else {
                header("location: /actividades");
            }
        } 
        else {
            $datos = array(
                'nombreActividad' => (isset($_POST["nombreActividad"])) ? $_POST["nombreActividad"] : "",
                'monitor' => (isset($_POST["monitor"])) ? $_POST["monitor"] : "",
                'descripcion' => (isset($_POST["descripcion"])) ? $_POST["descripcion"] : "",
                'idCentro' => (isset($_POST["idCentro"])) ? $_POST["idCentro"] : "",
                'idActividad' => (isset($_POST["idActividad"])) ? $_POST["idActividad"] : ""
            );

            if(ActividadesModel::editar($datos)) {
                
                header('location: /actividades');
            } 
            else {
                echo $this->view->render('actividades/formulario', array(
                    'errores' => array('Error al editar'),
                    'datos'   => $_POST,
                    'accion'  => 'editar'
                ));
            }
        }
    }

    public function privado()
    {
        $this->view->addData(['titulo' => 'Actividades Extraescolares']);

        $actividades = ActividadesModel::getActividad();
        $centros = ActividadesModel::getCentro();
      
        echo $this->view->render("actividades/privado", [
                'actividades' => $actividades,
                'centros'     => $centros
        ]);
    }






}
