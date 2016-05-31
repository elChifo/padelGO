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


    public static function getIdNoticia($id) 
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


    public static function obtenerID($titular)
    {        
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT idNoticia FROM Noticias WHERE titular=:titular";
        $query = $conn->prepare($ssql);
        $parameters = [':titular' => $titular];
        $query->execute($parameters);

        $fila = $query->fetch(PDO::FETCH_ASSOC);

        return $fila['idNoticia'];
    }

    public static function insertarImagen($datos)
    {        
        $conn = Database::getInstance()->getDatabase();
        $rutaImagen = $datos['path'] . 'noticia' . $datos['idNoticia'] . '.png';

        $editar = 'imagen="' . $rutaImagen . '"';

        $ssql = 'UPDATE Noticias SET ' . $editar . ' WHERE idNoticia=:idNoticia';

        $query = $conn->prepare($ssql);
        $parameters = [':idNoticia' => $datos['idNoticia']];
        $query->execute($parameters);

        move_uploaded_file($datos['imagen']['tmp_name'], $rutaImagen);
    }

    public static function editar($datos)
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
        if(empty($datos['fechaNoticia'])) {
            Session::add('feedback_negative', "No se ha recibido la Fecha de la Noticia");
            $errores_validacion = true;
        }          
        
        if($errores_validacion) {
            return false;
        }
         //actualizamos los datos nuevos y hacemos el registro en la base de datos
        else {
            $params = array(
                ':idNoticia'   => $datos['idNoticia'],
                ':titular'   => $datos['titular'], 
                ':contenido'   => $datos['contenido'], 
                ':fechaNoticia'   => $datos["fechaNoticia"]
            );

            $ssql = "UPDATE Noticias SET idNoticia = :idNoticia, titular = :titular, 
                            contenido = :contenido, fechaNoticia = :fechaNoticia 
                     WHERE idNoticia = :idNoticia";

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