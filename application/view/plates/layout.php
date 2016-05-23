<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $titulo ?></title>
    <meta name="description" content="">
    <link rel="shortcut icon" href="<?php echo URL; ?>img/padelgoico.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
    <script>
        var url = "<?php echo URL; ?>";
    </script>

    <!-- our JavaScript -->    
    <script type="text/javascript" src="<?php echo URL; ?>js/codigoform.js"></script>

    <!-- BOOTSTRAP -->
    <script type="text/javascript" src="<?php echo URL; ?>js/bootstrap.min.js"></script>

    <!-- JCALENDAR -->
    <script type="text/javascript" src="<?php echo URL; ?>js/jcalendar/calendar.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/jcalendar/calendar-es.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/jcalendar/calendar-setup.js"></script>
    
    <!-- CSS -->   
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/estilo.css">

    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/bootstrap.min.css">

    <!--<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/style.css">--> 

    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/jcalendar/theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/font-awesome.css">
</head>
<body>
    <!-- navigation -->
    <div class="col-md-12 cabecera">
        <!-- logo -->
        <div class="col-md-2 logo">
             <a title="Inicio" href="<?php echo URL; ?>">
                <img src="<?php echo URL; ?>img/home.png" alt="Padel GO!" height="100">
            </a>
        </div>
        <div class="col-md-8 menu">
            <?php $this->insert('partials/menu') ?> 
        </div>

        <div class="col-md-2 zona-login">

            <?php if (isset($_SESSION['idUsuario'])) : ?> 

                <p> Bienvenid@: 
                    <strong class="pColor">
                        <?= Session::get('nombre') ?> <?= Session::get('apellidos') ?> 
                    </strong>
                </p>

                <a class="enlaceLogin" title="Mi cuenta" href="<?php echo URL; ?>login">Mi cuenta 
                    <img src="<?php echo URL; ?>img/micuenta.png" alt="Mi cuenta" height="15" />
                </a>
                <br>
                <button type="button" class="botonlogin" title="Cerrar Sesión" 
                    onclick="window.location.href='<?php echo URL; ?>login/salir'"> Cerrar Sesión
                </button>

            <?php else : ?>

                <button type="button" class="botonlogin" title="Registrarse" 
                    onclick="window.location.href='<?php echo URL; ?>registro'">Registrarse
                </button>
                <button type="button" class="botonlogin" title="Iniciar Sesión" 
                    onclick="window.location.href='<?php echo URL; ?>login'">Iniciar Sesión
                </button>

            <?php endif ?>
        </div>
    </div>
    
    <?= $this->section('content') ?>
    <!-- footer -->
    <div class="col-md-12 pie">
        <div class="col-md-3 divpie">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sollicitudin vestibulum purus, sed viverra purus tristique suscipit. Quisque ullamcorper nunc congue mi porttitor posuere. Nam sem lectus, commodo elementum porta non, suscipit ac dui. Donec pellentesque felis magna, vel varius purus venenatis ac. Phasellus eu diam vel elit gravida fringilla a sed sem. Duis aliquet a nibh non vehicula. Nullam fringilla euismod justo, vel interdum quam elementum ac. 
        </div>
        <div class="col-md-3 divpie">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sollicitudin vestibulum purus, sed viverra purus tristique suscipit. Quisque ullamcorper nunc congue mi porttitor posuere. Nam sem lectus, commodo elementum porta non, suscipit ac dui. Donec pellentesque felis magna, vel varius purus venenatis ac. Phasellus eu diam vel elit gravida fringilla a sed sem. Duis aliquet a nibh non vehicula. Nullam fringilla euismod justo, vel interdum quam elementum ac. 
        </div>
        <div class="col-md-3 divpie">
            <div id="cont_5646df3e0bb3848a035b26e2dfbe669d">
                <span id="h_5646df3e0bb3848a035b26e2dfbe669d">
                    <a id="a_5646df3e0bb3848a035b26e2dfbe669d" href="http://www.tiempo.com/murcia.htm"    target="_blank" style="color: #00ABEB; font-family: 1; font-size: 13px; text-decoration: none;">El tiempo en MURCIA
                    </a>
                </span>
                <script type="text/javascript" 
                    async src="https://www.tiempo.com/wid_loader/5646df3e0bb3848a035b26e2dfbe669d">
                </script>
            </div>
        </div>
        <div class="col-md-3 divpie">
            <a href="#" target="_blank">
                <img alt="Siguenos en facebook" height="48" title="Siguenos en facebook" 
                    src="<?php echo URL; ?>img/facebook.png" width="48" />
            </a>
            <a href="#" target="_blank">
                <img alt="Siguenos en Twitter" height="48" title="Siguenos en Twitter" 
                src="<?php echo URL; ?>img/twitter.png" width="48" />
            </a>
            <a href="#" target="_blank">
                <img alt="Canal de youtube" height="48" title="Canal de youtube" 
                    src="<?php echo URL; ?>img/youtube.png" width="48" />
            </a> 
            <a href="#" target="_blank">
                <img alt="Rss feed" height="48" title="Rss feed" 
                    src="<?php echo URL; ?>img/rss.png" width="48" />
            </a>
            <a href="#" target="_blank">
                <img alt="Siguenos en Instagram" height="48" title="Siguenos en Instagram" 
                    src="<?php echo URL; ?>img/instagram.png" width="48" />
            </a>
            <a href="<?php echo URL; ?>contacto" target="_blank">
                <img alt="Envíanos un Correo" height="48" title="Envíanos un Correo" 
                    src="<?php echo URL; ?>img/correo.png" width="48" />
            </a>
        </div>
    </div>

    <!-- jQuery, loaded in the recommended protocol-less way -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
    
</body>
</html>


