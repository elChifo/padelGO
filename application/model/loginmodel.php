<?php

class LoginModel
{
    //Se comprueban las datos recibidos en el formulario de login
    public static function logueado($datos)
    {
        if(!$datos) {
            Session::add('feedback_negative', 'No tengo los datos de Login');
            return false;  
        }
        if(empty($datos['email'])) {
            Session::add('feedback_negative', 'No se ha indicado el Email');
        }
        if(empty($datos['clave'])) {
            Session::add('feedback_negative', 'No se ha indicado la Clave');
        }
        if(Session::get('feedback_negative')) {
            return false; 
        }

    // CODIGO PARA VALIDAR EL LOGIN DNI
        /*
        if(strlen($datos['dniTutor']) < 9) {
            Session::add('feedback_negative', 'El DNI debe tener 8 digitos + 1 letra');
        }
        if(strlen($datos['clave']) < 4) {
            Session::add('feedback_negative', 'La Contraseña debe tener 4 o más caracteres');
        }
        */

        if(Session::get('feedback_negative')) {
            return false;
        }
        //Se hace la conexion y consulta a la base de datos
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Usuarios WHERE email=:email";
        $query = $conn->prepare($ssql);
        $query->bindValue(':email', $datos['email'], PDO::PARAM_STR);
        $query->execute();
        //muestra los errores producidos
        $cuantos = $query->rowCount();
        if($cuantos != 1) {
            Session::add('feedback_negative', 'No estás registrado');
            return false;
        }

        $usuario = $query->fetch();
        //se comprueba que la password sea correcta
        if($usuario->clave != md5($datos['clave'])) {
            Session::add('feedback_negative', 'La Clave Login no coincide');
            return false;
        }
        //se guardan en $_SESSION los datos del usuario logueado
        Session::set('idUsuario', $usuario->idUsuario);
        Session::set('nombre', $usuario->nombre);
        Session::set('apellidos', $usuario->apellidos);

        return $datos['email'];
    }


    //se obtienen los datos mediante la consulta query
    public static function getUsuario()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Usuarios";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }


}