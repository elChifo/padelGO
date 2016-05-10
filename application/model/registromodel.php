<?php

class RegistroModel
{
    public static function getCategoria()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Categorias ORDER BY idCategoria ASC";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }

    public static function insertar($datos)
    {
        $conn = Database::getInstance()->getDatabase();

        $errores_validacion = false;
     
        if(empty($datos['nombre'])){
            Session::add('feedback_negative', "No he recibido el Nombre del Usuario");
            $errores_validacion = true;
        }
        if(empty($datos['apellidos'])){
            Session::add('feedback_negative', "No he recibido los Apellidos del Usuario");
            $errores_validacion = true;
        }
        if(empty($datos['sexo'])) {
            Session::add('feedback_negative', "No he recibido el Sexo del Usuario");
            $errores_validacion = true;
        }  
        if(empty($datos['fechaNac'])){
            Session::add('feedback_negative', "No he recibido la Fecha de Nacimiento del Usuario");
            $errores_validacion = true;
        }
        if(empty($datos['direccion'])){
            Session::add('feedback_negative', "No he recibido la Dirección del Usuario");
            $errores_validacion = true;
        }
        if(empty($datos['telefono'])){
            Session::add('feedback_negative', "No he recibido el Teléfono del Usuario");
            $errores_validacion = true;
        }
        if(empty($datos['email'])){
            Session::add('feedback_negative', "No he recibido el Email del Usuario");
            $errores_validacion = true;
        } 
        if(empty($datos['clave'])){
            Session::add('feedback_negative', "No he recibido la Clave del Usuario");
            $errores_validacion = true;
        }
        if(empty($datos['idCategoria'])){
            Session::add('feedback_negative', "No he recibido la Categoría del Usuario");
            $errores_validacion = true;
        }       
        
        if($errores_validacion) {
            return false;
        }
        else {
            $params = array(
                'nombre' => $_POST["nombre"],
                'apellidos' => $_POST["apellidos"],
                'sexo' => $_POST["sexo"],
                'fechaNac' => $_POST["fechaNac"],
                'direccion' => $_POST["direccion"],
                'telefono' => $_POST["telefono"],
                'email' => $_POST["email"],
                'clave' => md5($_POST["clave"]),
                'idCategoria' => $_POST["idCategoria"],
            );

            $ssql = "INSERT INTO Usuarios (nombre, apellidos, sexo, fechaNac, direccion, telefono, email, clave, idCategoria)
                     VALUES (:nombre, :apellidos, :sexo, :fechaNac, :direccion, :telefono, :email, :clave, :idCategoria)";

            $query = $conn->prepare($ssql);
            $query->execute($params);
            $cuenta = $query->rowCount();
            if($cuenta == 1){
                return $conn->lastInsertId();
            }
            return false;
        }
    } 

    public static function repetido($email)
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Usuarios WHERE email=:email";
        $query = $conn->prepare($ssql);
        $parameters = [':email' => $email];
        $query->execute($parameters);

        $cuenta = $query->rowCount();

        if($cuenta == 1) {

            return true;
        } 
        else { 

            return false;
        }
    }


}