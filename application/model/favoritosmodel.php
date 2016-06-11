<?php

class FavoritosModel
{
    //obtenemos el club mediante la consulta query
    public static function getFavoritos()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Favoritos";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }
    //obtenemos el identificador del club mediante la consulta query
    public static function getIdFavorito($id) {
        $conn = Database::getInstance()->getDatabase();
        $id = (int) $id;
        if($id == 0){
            return false;
        }
        $ssql = "SELECT * FROM Favoritos WHERE idUsuario = :idUsuario";
        $query = $conn->prepare($ssql);
        $query->bindValue(":idUsuario", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();

    }

    public static function existeFavorito($datos) {
        $conn = Database::getInstance()->getDatabase();      

        $params = array(
            'idUsuario' => $datos['idUsuario'],
            'Favorito' => $datos['Favorito']
        );

        $ssql = "SELECT * FROM Favoritos WHERE Favorito = :Favorito AND idUsuario = :idUsuario";
        
        $query = $conn->prepare($ssql);
        $query->execute($params);
        $cuenta = $query->rowCount();
        var_dump($cuenta);

        if($cuenta == 1) {
            return false;
        }
        else{            
            return true;
        }        
    }

    public static function agregar($favorito)  {
        $conn = Database::getInstance()->getDatabase();
        
        $params = array(
            'idUsuario' => $favorito['idUsuario'],
            'Favorito' => $favorito['Favorito']
        );

        $ssql = "INSERT INTO Favoritos (idUsuario, Favorito)
                VALUES (:idUsuario, :Favorito)";

        $query = $conn->prepare($ssql);
        $query->execute($params);
        $cuenta = $query->rowCount();

        if($cuenta == 1) {
            return $conn->lastInsertId();
        }
        return false;
        
    }

     public static function quitar($favorito)  {
        $conn = Database::getInstance()->getDatabase();

        $params = array(
            ":idUsuario" => $favorito["idUsuario"],
            ":Favorito" => $favorito["Favorito"]
        );

        $ssql = "DELETE FROM Favoritos WHERE Favorito=:Favorito AND idUsuario=:idUsuario";

        $query = $conn->prepare($ssql);
        $query->execute($params);  
        $cuenta = $query->rowCount();

        if($cuenta == 1) {
            return $conn->lastInsertId();
        }
        return false;
               
    }





















}