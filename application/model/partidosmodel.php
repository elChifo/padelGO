<?php

class PartidosModel
{    
    //obtenemos los datos del partido mediante la consulta query
    public static function getPartido()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Partidos ORDER BY fechaPartido DESC";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }
    //obtenemos los datos del identificador del partido mediante la consulta query
    public static function getIdPartido($id) 
    {
        $conn = Database::getInstance()->getDatabase();
        $id = (int) $id;
        if($id == 0){
            return false;
        }
        $ssql = "SELECT * FROM Partidos WHERE idPartido = :id";
        $query = $conn->prepare($ssql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();
    }
    //obtenemos los datos de la categoría del partido mediante la consulta query
    public static function getCategoria()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Categorias";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    } 
    //obtenemos los datos del usuario mediante la consulta query
    public static function getUsuario()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Usuarios";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }
    //obtenemos el identificador del usuario mediante la consulta query
    public static function getIdUsuario($id) 
    {
        $conn = Database::getInstance()->getDatabase();
        $id = (int) $id;
        if($id == 0){
            return false;
        }
        $ssql = "SELECT * FROM Usuarios WHERE idUsuario = :id";
        $query = $conn->prepare($ssql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();
    } 
    //obtenemos los datos del club mediante la consulta query
    public static function getClub()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Clubs";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    } 
    //insertamos los datos mediante formulario con sus validaciones
    public static function insertar($datos)
    {
        $conn = Database::getInstance()->getDatabase();

        $errores_validacion = false;

        if(empty($datos['tipoPartido'])) {
            Session::add('feedback_negative', "No he recibido el Tipo de Partido.");
            $errores_validacion = true;
        }
        if(empty($datos['fechaPartido'])) {
            Session::add('feedback_negative', "No he recibido la Fecha del Partido.");
            $errores_validacion = true;
        }
        if(empty($datos['horaPartido'])) {
            Session::add('feedback_negative', "No he recibido la Hora del Partido.");
            $errores_validacion = true;
        }
        if (empty($datos['jugador1'])) {            
            Session::add('feedback_negative', "No he recibido ningun Jugador.");
            $errores_validacion = true;
        }
        if(empty($datos['idCategoria'])) {
            Session::add('feedback_negative', "No he recibido la Categoría.");
            $errores_validacion = true;
        }
        if(empty($datos['idUsuario'])) {
            Session::add('feedback_negative', "No he recibido el Usuario.");
            $errores_validacion = true;
        }
        if(empty($datos['idClub'])) {
            Session::add('feedback_negative', "No he recibido el Club.");
            $errores_validacion = true;
        }              

        if($errores_validacion) {
            return false;
        }
        //comprobamos todos los campos
        else {
            $params = array(
                'tipoPartido' => $_POST["tipoPartido"],
                'fechaPartido' => $_POST["fechaPartido"],
                'horaPartido' => $_POST["horaPartido"],
                'jugador1' => $_POST["jugador1"],
                'jugador2' => $_POST["jugador2"],
                'jugador3' => $_POST["jugador3"],
                'jugador4' => $_POST["jugador4"],
                'idCategoria' => $_POST["idCategoria"],
                'idUsuario' => $_POST["idUsuario"],
                'idClub' => $_POST["idClub"]
            );

            $ssql = "INSERT INTO Partidos (tipoPartido, fechaPartido, horaPartido, jugador1, jugador2, jugador3, jugador4, idCategoria, idUsuario, idClub)
                    VALUES (:tipoPartido, :fechaPartido, :horaPartido, :jugador1, :jugador2, :jugador3, :jugador4, :idCategoria, :idUsuario, :idClub)";

            $query = $conn->prepare($ssql);
            $query->execute($params);
            $cuenta = $query->rowCount();

            if($cuenta == 1) {
                return $conn->lastInsertId();
            }
            return false;
        }
    }

    //obtenemos los datos ya existentes en la base de datos para poder modificarlos
    public static function editar($datos){

        $conn = Database::getInstance()->getDatabase();

        $errores_validacion = false;

        if(empty($datos['idActividad'])){
            Session::add('feedback_negative', 'No he recibido la Actividad');
            $errores_validacion = true;
        }

        if(empty($datos['nombreActividad'])){
            Session::add('feedback_negative', "No he recibido el Nombre de la Actividad");
            $errores_validacion = true;
        }

        if(empty($datos['monitor'])){
            Session::add('feedback_negative', "No he recibido el Nombre del Monitor");
            $errores_validacion = true;
        }

        if(empty($datos['descripcion'])){
            Session::add('feedback_negative', "No he recibido la Descripción");
            $errores_validacion = true;
        }

        if(empty($datos['idCentro'])){
            Session::add('feedback_negative', "No he recibido el Centro");
            $errores_validacion = true;
        }

        if($errores_validacion) {
            return false;
        } 
        //actualizamos los datos nuevos y hacemos el registro en la base de datos
        else {
            $ssql = "UPDATE Actividades SET nombreActividad=:nombreActividad, monitor=:monitor, 
             descripcion=:descripcion, idCentro=:idCentro WHERE idActividad=:id";
            $query = $conn->prepare($ssql);

            $parameters = array(
                ':nombreActividad' => $datos["nombreActividad"],
                ':monitor' => $datos["monitor"],
                ':descripcion' => $datos["descripcion"],
                ':idCentro' => $datos["idCentro"],
                ':id'     => $datos["idActividad"]
            );
            $query->execute($parameters);
            $count = $query->rowCount();
            if($count == 1){
                Session::add('feedback_positive', 'Datos actualizados');
                return true;
            }
            Session::add('feedback_positive', 'Actualizadas 0 casillas');
            return false;
        }
    }











}
