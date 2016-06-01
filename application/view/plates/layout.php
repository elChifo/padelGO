<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $titulo ?></title>
    <meta name="description" content="">
    <link rel="shortcut icon" href="<?= URL; ?>img/padelgoico.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
    <script>
        var url = "<?= URL; ?>";
    </script>

    <!-- Política de Cookies -->
        <!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
    <script type="text/javascript">
        window.cookieconsent_options = {"message":"Utilizamos cookies para facilitar el uso de nuestra página web","dismiss":"Ok!","learnMore":"Más info","link":"http://www.padelgo.es","theme":"dark-bottom"};
    </script>
    
    <script type="text/javascript" src="<?= URL; ?>/js/cookieconsent.min.js"></script>
    <script type="text/javascript" src="<?= URL; ?>/js/codigoform.js"></script>
    <script type="text/javascript" src="<?= URL; ?>/js/demopolitica.js"></script>


    <!-- BOOTSTRAP -->
    <script type="text/javascript" src="<?= URL; ?>js/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?= URL; ?>js/jcalendar/calendar.js"></script>
    <script type="text/javascript" src="<?= URL; ?>js/jcalendar/calendar-es.js"></script>
    <script type="text/javascript" src="<?= URL; ?>js/jcalendar/calendar-setup.js"></script>
        
    <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="<?= URL; ?>css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?= URL; ?>css/bootstrap.min.css">

    <!--<link rel="stylesheet" type="text/css" href="<?= URL; ?>css/style.css">-->
    <link rel="stylesheet" type="text/css" href="<?= URL; ?>css/estilo.css">
    <link rel="stylesheet" type="text/css" href="<?= URL; ?>css/styleform.css">
    <link rel="stylesheet" type="text/css" href="<?= URL; ?>css/feedback.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?= URL; ?>css/demopolitica.css"> -->
    <link rel="stylesheet" type="text/css" href="<?= URL; ?>css/jcalendar/theme.css">
    <link rel="stylesheet" type="text/css" href="<?= URL; ?>css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= URL; ?>css/font-awesome.css">
</head>
<body>
    <!-- navigation -->
    <div class="col-md-12 cabecera">
        <!-- logo -->
        <div class="col-md-2 logo">
             <a title="Inicio" href="<?= URL; ?>"><img src="<?= URL; ?>img/home.png" alt="Padel GO!" height="100"></a>
        </div>
        <div class="col-md-8 menu">
            <?php $this->insert('partials/menu') ?> 
        </div>
        <div class="col-md-2 zona-login">
            <?php if (isset($_SESSION['idUsuario'])) : ?> 
                <p>Bienveni@ <strong class="pColor"><?= Session::get('nombre') ?></strong></p>
                <a class="enlaceLogin" title="Mi cuenta" href="<?= URL; ?>login">MI CUENTA <img src="<?= URL; ?>img/micuenta.png" alt="Mi cuenta" height="25" /></a><br>
                <button type="button" class="botonlogin" title="Cerrar Sesión" onclick="window.location.href='<?= URL; ?>login/salir'">Cerrar Sesión</button>
            <?php else : ?>
                <button type="button" class="botonlogin" title="Registrarse" onclick="window.location.href='<?= URL; ?>registro'">Registrarse</button>
                <button type="button" class="botonlogin" title="Iniciar Sesión" onclick="window.location.href='<?= URL; ?>login'">Iniciar Sesión</button>
            <?php endif ?>
        </div>
    </div>
    <?= $this->section('content') ?>
    <!-- footer -->
    <div class="col-md-12 pie">
        <div class="col-md-3 divpie">
            <!-- REDIRECCIONAR -->
       <a href="../home/cookies">Política de Cookies</a> 
       <a href="../home/privacidad">Política de Privacidad</a> 
        </div>
        <div class="col-md-3 divpie">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sollicitudin vestibulum purus, sed viverra purus tristique suscipit. Quisque ullamcorper nunc congue mi porttitor posuere. Nam sem lectus, commodo elementum porta non, suscipit ac dui. Donec pellentesque felis magna, vel varius purus venenatis ac. Phasellus eu diam vel elit gravida fringilla a sed sem. Duis aliquet a nibh non vehicula. Nullam fringilla euismod justo, vel interdum quam elementum ac. 
        </div>
        <div class="col-md-3 divpie">
        <div id="cont_5646df3e0bb3848a035b26e2dfbe669d"><span id="h_5646df3e0bb3848a035b26e2dfbe669d"><a id="a_5646df3e0bb3848a035b26e2dfbe669d" href="http://www.tiempo.com/murcia.htm" target="_blank" style="color: #00ABEB; font-family: 1; font-size: 13px; text-decoration: none;">El tiempo en MURCIA</a></span><script type="text/javascript" async src="https://www.tiempo.com/wid_loader/5646df3e0bb3848a035b26e2dfbe669d"></script></div>
        </div>
        <div class="col-md-3 divpie">
            <a href="#" target="_blank"><img alt="Siguenos en facebook" height="48" src="<?= URL; ?>img/facebook.png" title="Siguenos en facebook" width="48" /></a>
            <a href="#" target="_blank"><img alt="Siguenos en Twitter" height="48" src="<?= URL; ?>img/twitter.png" title="Siguenos en Twitter" width="48" /></a>
            <a href="#" target="_blank"><img alt="Canal de youtube" height="48" src="<?= URL; ?>img/youtube.png" title="Canal de youtube" width="48" /></a> 
            <a href="#" target="_blank"><img alt="Rss feed" height="48" src="<?= URL; ?>img/rss.png" title="Rss feed" width="48" /></a>
            <a href="#" target="_blank"><img alt="Siguenos en Instagram" height="48" src="<?= URL; ?>img/instagram.png" title="Siguenos en Instagram" width="48" /></a>
            <a href="<?= URL; ?>contacto" target="_blank"><img alt="Envíanos un Correo" height="48" src="<?= URL; ?>img/correo.png" title="Envíanos un Correo" width="48" /></a>
        </div>
    </div>

    <!-- jQuery, loaded in the recommended protocol-less way -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
    
</body>
</html>


