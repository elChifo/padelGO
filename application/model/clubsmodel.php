<?php

class ClubsModel
{
    //obtenemos el club mediante la consulta query
    public static function getClub()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Clubs";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }
    //obtenemos el identificador del club mediante la consulta query
    public static function getIdClubs($id) {
        $conn = Database::getInstance()->getDatabase();
        $id = (int) $id;
        if($id == 0){
            return false;
        }
        $ssql = "SELECT * FROM Clubs WHERE idClub = :idClub";
        $query = $conn->prepare($ssql);
        $query->bindValue(":idClub", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();

    }
    //insertamos datos en el club mediante el formulario
    public static function insertar($datos)  {
        $conn = Database::getInstance()->getDatabase();

        $errores_validacion = false;

        if(empty($datos['nombreClub'])) {
            Session::add('feedback_negative', "No se he recibido el Nombre del Club");
            $errores_validacion = true;
        }
        if(empty($datos['direccionClub'])) {
            Session::add('feedback_negative', "No se ha recibido la Dirección del Club");
            $errores_validacion = true;
        }
        if(empty($datos['numPistas'])) {
            Session::add('feedback_negative', "No se ha recibido el Nº de Pistas del Club");
            $errores_validacion = true;
        }
        
        if($errores_validacion) {
            return false;
        }
        else {
            $params = array(
                'nombreClub' => $_POST["nombreClub"],
                'direccionClub' => $_POST["direccionClub"],
                'numPistas' => $_POST["numPistas"]
            );

            $ssql = "INSERT INTO Clubs (nombreClub, direccionClub, numPistas)
                    VALUES (:nombreClub, :direccionClub, :numPistas)";

            $query = $conn->prepare($ssql);
            $query->execute($params);
            $cuenta = $query->rowCount();

            if($cuenta == 1) {
                return $conn->lastInsertId();
            }
            return false;
        }
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

	