<?php

class MensajesModel
{
    //obtenemos el club mediante la consulta query
    public static function getMensajes()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Mensajes ORDER BY fechaMensaje DESC";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }
    //obtenemos el identificador del club mediante la consulta query
    public static function getIdMensaje($id) {
        $conn = Database::getInstance()->getDatabase();
        $id = (int) $id;
        if($id == 0){
            return false;
        }
        $ssql = "SELECT * FROM Mensajes WHERE idMensaje = :idMensaje";
        $query = $conn->prepare($ssql);
        $query->bindValue(":idMensaje", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();

    }
    //insertamos datos en el club mediante el formulario
    public static function enviar($mensaje)  {
        $conn = Database::getInstance()->getDatabase();

        $errores_validacion = false;

        if(empty($mensaje)) {
            Session::add('feedback_negative', "No se he recibido el Mensaje");
            $errores_validacion = true;
        }
        
        if($errores_validacion) {
            return false;
        }
        else {

            $params = array(                              
                'idUsuario' => $mensaje['idUsuario'],
                'idReceptor' => $mensaje['idReceptor'],
                'fechaMensaje' => $mensaje['fechaMensaje'],
                'mensaje' => $mensaje['mensaje']
            );

            $ssql = "INSERT INTO Mensajes (idUsuario, idReceptor, fechaMensaje, mensaje)
                    VALUES (:idUsuario, :idReceptor, :fechaMensaje, :mensaje)";

            $query = $conn->prepare($ssql);
            $query->execute($params);
            $cuenta = $query->rowCount();

            if($cuenta == 1) {
                return $conn->lastInsertId();
            }
            return false;
        }
    }  
    
    public static function getIdUsuario($id) {
        $conn = Database::getInstance()->getDatabase();
        $id = (int) $id;
        if($id == 0){
            return false;
        }
        $ssql = "SELECT * FROM Usuarios WHERE idUsuario = :idUsuario";
        $query = $conn->prepare($ssql);
        $query->bindValue(":idUsuario", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();
    }

    public static function getUsuario()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Usuarios";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }











    public static function borrar($idClub)
    {           
        $conn = Database::getInstance()->getDatabase();
        $errores_validacion = false; 

        $ssql = "DELETE FROM Clubs WHERE idClub=:idClub";
        $query = $conn->prepare($ssql);
        $params = [':idClub' => $idClub];
        $query->execute($params);
    }

    public static function obtenerID($nombreClub)
    {        
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT idClub FROM Clubs WHERE nombreClub=:nombreClub";
        $query = $conn->prepare($ssql);
        $parameters = [':nombreClub' => $nombreClub];
        $query->execute($parameters);

        $fila = $query->fetch(PDO::FETCH_ASSOC);

        return $fila['idClub'];
    }

    public static function insertarImagen($datos)
    {        
        $conn = Database::getInstance()->getDatabase();
        $rutaImagen = $datos['path'] . 'club' . $datos['idClub'] . '.png';

        $editar = 'imagenClub="' . $rutaImagen . '"';

        $ssql = 'UPDATE Clubs SET ' . $editar . ' WHERE idClub=:idClub';

        $query = $conn->prepare($ssql);
        $parameters = [':idClub' => $datos['idClub']];
        $query->execute($parameters);

        move_uploaded_file($datos['imagenClub']['tmp_name'], $rutaImagen);
    }

    //obtenemos los datos del club ya existentes para modificarlos
    public static function editar($datos){

        $conn = Database::getInstance()->getDatabase();

        $errores_validacion = false;

        if(empty($datos['nombreClub'])){
            Session::add('feedback_negative', "No se ha recibido el Nombre del Club");
            $errores_validacion = true;
        }

        if(empty($datos['direccionClub'])){
            Session::add('feedback_negative', "No se ha recibido la Dirección del Club");
            $errores_validacion = true;
        }

        if(empty($datos['numPistas'])){
            Session::add('feedback_negative', "No se ha recibido el Nº de Pistas del Club");
            $errores_validacion = true;
        }        
    
        if($errores_validacion) {
            return false;
        } 
        else {

            $params = array(
                'idClub' => $_POST["idClub"],
                'nombreClub' => $_POST["nombreClub"],
                'direccionClub' => $_POST["direccionClub"],
                'numPistas' => $_POST["numPistas"]
            );

            $ssql = "UPDATE Clubs SET idClub=:idClub, nombreClub=:nombreClub, 
             direccionClub=:direccionClub, numPistas=:numPistas WHERE idClub=:idClub";

            $query = $conn->prepare($ssql);            
            $query->execute($params);

            $cuenta = $query->rowCount();
            if($cuenta == 1) {
                return $conn->lastInsertId();
            }
            return false;
        }
    }
        
}

	