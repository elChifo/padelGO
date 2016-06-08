<?php 

class MercadilloModel
{

	public static function getArticulos()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Mercadillo";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }


    public static function getIdArticulo($id) 
    {
        $conn = Database::getInstance()->getDatabase();
        $id = (int) $id;
        if($id == 0){
            return false;
        }
        $ssql = "SELECT * FROM Mercadillo WHERE idArticulo = :idArticulo";
        $query = $conn->prepare($ssql);
        $query->bindValue(":idArticulo", $id, PDO::PARAM_INT);
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


    public static function vender($datos)
    {
        $conn = Database::getInstance()->getDatabase();
        $errores_validacion = false;     
        
        if(empty($datos['nombreArticulo'])){
            Session::add('feedback_negative', "No se ha recibido el Nombre del Artículo");
            $errores_validacion = true;
        }
        if(empty($datos['descripcionArticulo'])){
            Session::add('feedback_negative', "No se ha recibido la Descripción del Artículo");
            $errores_validacion = true;
        }    
        
        if($errores_validacion) {
            return false;
        }
        else {
            $params = array(
                'idUsuario' => $_POST["idUsuario"],
                'nombreArticulo' => $_POST["nombreArticulo"],
                'descripcionArticulo' => $_POST["descripcionArticulo"]
            );

            $ssql = "INSERT INTO Mercadillo (idUsuario, nombreArticulo, descripcionArticulo)
                     VALUES (:idUsuario, :nombreArticulo, :descripcionArticulo)";

            $query = $conn->prepare($ssql);
            $query->execute($params);
            $cuenta = $query->rowCount();
            if($cuenta == 1){
                return $conn->lastInsertId();
            }
            return false;
        }
    }

    public static function editar($datos)
    {
        $conn = Database::getInstance()->getDatabase();

        $errores_validacion = false;        
     
        if(empty($datos['nombreArticulo'])){
            Session::add('feedback_negative', "No se ha recibido el Nombre del Artículo");
            $errores_validacion = true;
        }
        if(empty($datos['descripcionArticulo'])){
            Session::add('feedback_negative', "No se ha recibido la Descripción del Artículo");
            $errores_validacion = true;
        }          
        
        if($errores_validacion) {
            return false;
        }
         //actualizamos los datos nuevos y hacemos el registro en la base de datos
        else {
            $params = array(
                'idArticulo' => $_POST["idArticulo"],
                'idUsuario' => $_POST["idUsuario"],
                'nombreArticulo' => $_POST["nombreArticulo"],
                'descripcionArticulo' => $_POST["descripcionArticulo"]
            );

            $ssql = "UPDATE Mercadillo SET idArticulo = :idArticulo, idUsuario = :idUsuario, 
                        nombreArticulo = :nombreArticulo, descripcionArticulo = :descripcionArticulo 
                     WHERE idArticulo = :idArticulo";

            $query = $conn->prepare($ssql);
            $query->execute($params);

            $cuenta = $query->rowCount();
            if($cuenta == 1) {
                return $conn->lastInsertId();
            }
            return false;
        }
    }

    public static function obtenerID($nombreArticulo)
    {        
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT idArticulo FROM Mercadillo WHERE nombreArticulo=:nombreArticulo";
        $query = $conn->prepare($ssql);
        $parameters = [':nombreArticulo' => $nombreArticulo];
        $query->execute($parameters);

        $fila = $query->fetch(PDO::FETCH_ASSOC);

        return $fila['idArticulo'];
    }

    public static function insertarImagen($datos)
    {        
        $conn = Database::getInstance()->getDatabase();
        $rutaImagen = $datos['path'] . 'articulo' . $datos['idArticulo'] . '.png';

        $editar = 'imagenArticulo="' . $rutaImagen . '"';

        $ssql = 'UPDATE Mercadillo SET ' . $editar . ' WHERE idArticulo=:idArticulo';

        $query = $conn->prepare($ssql);
        $parameters = [':idArticulo' => $datos['idArticulo']];
        $query->execute($parameters);

        move_uploaded_file($datos['imagenArticulo']['tmp_name'], $rutaImagen);
    }

    public static function borrar($idArticulo)
    {           
        $conn = Database::getInstance()->getDatabase();
        $errores_validacion = false; 

        $ssql = "DELETE FROM Mercadillo WHERE idArticulo=:idArticulo";
        $query = $conn->prepare($ssql);
        $params = [':idArticulo' => $idArticulo];
        $query->execute($params);
    }

}









