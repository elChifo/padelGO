<?php

class BuscarModel
{
    //obtenemos los datos del centro mediante la consulta query
    public static function getCentro()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Centros";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }
    //obtenemos los datos de la actividad mediante la consulta query
    public static function getActividad()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Actividades";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }
    //obtenemos los datos del alumno mediante la consulta query
    public static function getAlumno()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Alumnos";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }  

}

