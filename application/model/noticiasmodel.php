<?php

class NoticiasModel
{

    public static function getNoticias()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Noticias ORDER BY fechaNoticia DESC";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }


    public static function getIdPartido($id) 
    {
        $conn = Database::getInstance()->getDatabase();
        $id = (int) $id;
        if($id == 0){
            return false;
        }
        $ssql = "SELECT * FROM Noticias WHERE idNoticia = :idNoticia";
        $query = $conn->prepare($ssql);
        $query->bindValue(":idNoticia", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();
    }


    public static function crear($datos)
    {
        $conn = Database::getInstance()->getDatabase();
        $errores_validacion = false;
     
        if(empty($datos['titular'])){
            Session::add('feedback_negative', "No se ha recibido el Titular de la Noticia");
            $errores_validacion = true;
        }
        if(empty($datos['contenido'])){
            Session::add('feedback_negative', "No se ha recibido el Contenido de la Noticia");
            $errores_validacion = true;
        }
        if(empty($datos['fechaNoticia'])){
            Session::add('feedback_negative', "No se ha recibido la Fecha de la Noticia");
            $errores_validacion = true;
        }    
        
        if($errores_validacion) {
            return false;
        }
        else {
            $params = array(
                'titular' => $_POST["titular"],
                'contenido' => $_POST["contenido"],
                //'imagen' => $_POST["imagen"],
                'fechaNoticia' => $_POST["fechaNoticia"]
            );

            $ssql = "INSERT INTO Noticias (titular, contenido, fechaNoticia)
                     VALUES (:titular, :contenido, :fechaNoticia)";

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