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
        $ssql = "SELECT * FROM Favoritos WHERE idFavorito = :idFavorito";
        $query = $conn->prepare($ssql);
        $query->bindValue(":idFavorito", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();

    }
}