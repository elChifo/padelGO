<?php

class UsuariosModel
{
    public static function getCategoria()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Categorias";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }

        public static function getUsuario()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Usuarios";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }

    public static function getIdUsuario($id) {
        $conn = Database::getInstance()->getDatabase();
        $id = (int) $id;
        if($id == 0){
            return false;
        }
        $ssql = "SELECT * FROM Usuarios WHERE idUsuario = :id";
        $query = $conn->prepare($ssql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();
    }


    public static function borrar($idUsuario)
    {           
        $conn = Database::getInstance()->getDatabase();

        $ssql = "DELETE FROM Usuarios WHERE idUsuario=:idUsuario";
        $query = $conn->prepare($ssql);
        $params = [':idUsuario' => $idUsuario];
        $query->execute($params);
    }
    
    public function existeEmail($emailContacto)
    {        
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Usuarios WHERE email=:email";
        $query = $conn->prepare($ssql);
        $params = [':email' => $email];
        $query->execute($params);

        $cuenta = $query->rowCount();

        if($cuenta == 1) {

            return true;
        } 
        else { 

            return false;
        }
    }


    public static function editar($datos)
    {
        $editar = '';

        foreach ($datos as $key => $value){

            if($key != 'idUsuario') {
                $editar .= $key . '=:' . $key . ', ';
            }
        }
        $editar = rtrim($editar, ', ');

        $ssql = 'UPDATE Usuarios SET ' . $editar . ' WHERE idUsuario=:idUsuario';
        $query = $conn->prepare($ssql);
        $params = [':idUsuario' => $idUsuario];
        $query->execute($params);
    }










    // public static function insertar($datos)
    // {
    //     $conn = Database::getInstance()->getDatabase();

    //     $errores_validacion = false;

    //     if(empty($datos['nombreAlumno'])) {
    //         Session::add('feedback_negative', "No he recibido el Nombre del Alumno");
    //         $errores_validacion = true;
    //     }
    //     if(empty($datos['apellidosAlumno'])) {
    //         Session::add('feedback_negative', "No he recibido los Apellidos del Alumno");
    //         $errores_validacion = true;
    //     }
    //     if(empty($datos['fechaNac'])) {
    //         Session::add('feedback_negative', "No he recibido la Fecha de Nacimiento del Alumno");
    //         $errores_validacion = true;
    //     }
    //     if(empty($datos['curso'])) {
    //         Session::add('feedback_negative', "No he recibido el Curso del Alumno");
    //         $errores_validacion = true;
    //     }
    //     if(empty($datos['idActividad'])) {
    //         Session::add('feedback_negative', "No he recibido la Actividad del Alumno");
    //         $errores_validacion = true;
    //     }

    //     if($errores_validacion) {
    //         return false;
    //     }
    //     else {
    //         $params = array(
    //             'nombreAlumno' => $_POST["nombreAlumno"],
    //             'apellidosAlumno' => $_POST["apellidosAlumno"],
    //             'fechaNac' => $_POST["fechaNac"],
    //             'curso' => $_POST["curso"],
    //             'observaciones' => $_POST["observaciones"],
    //             'idActividad' => $_POST["idActividad"]
    //         );

    //         $ssql = "INSERT INTO Alumnos (nombreAlumno, apellidosAlumno, fechaNac, curso, observaciones, idActividad)
    //                 VALUES (:nombreAlumno, :apellidosAlumno, :fechaNac, :curso, :observaciones, :idActividad)";

    //         $query = $conn->prepare($ssql);
    //         $query->execute($params);
    //         $cuenta = $query->rowCount();

    //         if($cuenta == 1) {
    //             return $conn->lastInsertId();
    //         }
    //         return false;
    //     }
    // }

}