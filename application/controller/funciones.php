<?php 


	public static function espacio($num)
    {       
        for ($i=0; $i<$num; $i++) {
            echo '&nbsp;';
        }
    }


    //comprueba la validez del numero de telefono
    public static function formatoTelefono($numero) 
    {
        $telefono = $numero[0] . $numero[1] . $numero[2] ." . ". 
                    $numero[3] . $numero[4] . $numero[5] ." . ".
                    $numero[6] . $numero[7] . $numero[8];

        return $telefono;
    }

    //comprueba que la fecha introducida está en el formato correcto
    public static function formatoFecha($fecha) 
    {
        $date = explode("-", $fecha);

        $fechaformato = $date[2] .' del '. $date[1] .' de '. $date[0];

        return $fechaformato;  
    }












 ?>