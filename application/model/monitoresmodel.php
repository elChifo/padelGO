<?php

class MonitoresModel
{
    //obtenemos el club mediante la consulta query
    public static function getMonitores()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Monitores";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }
    //obtenemos el identificador del club mediante la consulta query
    public static function getIdMonitor($id) {
        $conn = Database::getInstance()->getDatabase();
        $id = (int) $id;
        if($id == 0){
            return false;
        }
        $ssql = "SELECT * FROM Monitores WHERE idMonitor = :idMonitor";
        $query = $conn->prepare($ssql);
        $query->bindValue(":idMonitor", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();

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

    public static function agregar($monitor)
    {
        $conn = Database::getInstance()->getDatabase();
        $errores_validacion = false;
     
        if(empty($monitor['idUsuario'])){
            Session::add('feedback_negative', "No se ha recibido el Usuario Monitor");
            $errores_validacion = true;
        }
        if(empty($monitor['anuncio'])){
            Session::add('feedback_negative', "No se ha recibido el Anuncio del Monitor");
            $errores_validacion = true;
        }
        if(empty($monitor['horarioClases'])){
            Session::add('feedback_negative', "No se ha recibido los Horarios de Clases");
            $errores_validacion = true;
        }    
        
        if($errores_validacion) {
            return false;
        }
        else {
            $params = array(
                'idUsuario' => $monitor["idUsuario"],
                'anuncio' => $monitor["anuncio"],
                'horarioClases' => $monitor["horarioClases"]
            );

            $ssql = "INSERT INTO Monitores (idUsuario, anuncio, horarioClases)
                     VALUES (:idUsuario, :anuncio, :horarioClases)";

            $query = $conn->prepare($ssql);
            $query->execute($params);
            $cuenta = $query->rowCount();
            if($cuenta == 1){
                return $conn->lastInsertId();
            }
            return false;
        }
    }





}