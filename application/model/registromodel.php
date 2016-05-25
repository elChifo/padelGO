<?php

class RegistroModel
{
    //obtenemos los datos de la categoría mediante la consulta query
    public static function getCategoria()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Categorias ORDER BY idCategoria ASC";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }

     //insertamos los datos mediante formulario con sus validaciones
    public static function insertar($datos)
    {
        $conn = Database::getInstance()->getDatabase();

        $errores_validacion = false;
     
        if(empty($datos['nombre'])){
            Session::add('feedback_negative', "No se ha recibido el Nombre del Usuario");
            $errores_validacion = true;
        }
        if(empty($datos['apellidos'])){
            Session::add('feedback_negative', "No se ha recibido los Apellidos del Usuario");
            $errores_validacion = true;
        }
        if(empty($datos['sexo'])) {
            Session::add('feedback_negative', "No se ha recibido el Sexo del Usuario");
            $errores_validacion = true;
        }  
        if(empty($datos['fechaNac'])){
            Session::add('feedback_negative', "No se ha recibido la Fecha de Nacimiento del Usuario");
            $errores_validacion = true;
        }
        if(empty($datos['direccion'])){
            Session::add('feedback_negative', "No se ha recibido la Dirección del Usuario");
            $errores_validacion = true;
        }
        if(empty($datos['telefono'])){
            Session::add('feedback_negative', "No se ha recibido el Teléfono del Usuario");
            $errores_validacion = true;
        }
        if(empty($datos['email'])){
            Session::add('feedback_negative', "No se ha recibido el Email del Usuario");
            $errores_validacion = true;
        } 
        if(empty($datos['clave'])){
            Session::add('feedback_negative', "No se ha recibido la Clave del Usuario");
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

    //comprobamos el email
    public static function existeEmail($email)
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

    public static function obtenerID($email)
    {        
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT idUsuario FROM Usuarios WHERE email=:email";
        $query = $conn->prepare($ssql);
        $parameters = [':email' => $email];
        $query->execute($parameters);

        $fila = $query->fetch(PDO::FETCH_ASSOC);

        return $fila['idUsuario'];
    }

    public static function insertarImagen($datos)
    {        
        $conn = Database::getInstance()->getDatabase();
        $rutaImagen = $datos['path'] . 'usuario' . $datos['idUsuario'] . '.png';

        $editar = 'imagenUsuario="' . $rutaImagen . '"';

        $ssql = 'UPDATE Usuarios SET ' . $editar . ' WHERE idUsuario=:idUsuario';

        $query = $conn->prepare($ssql);
        $parameters = [':idUsuario' => $datos['idUsuario']];
        $query->execute($parameters);

        move_uploaded_file($datos['imagenUsuario']['tmp_name'], $rutaImagen);
    }


}