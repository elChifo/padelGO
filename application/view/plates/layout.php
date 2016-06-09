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

    

    <!-- flecha arriba -->
    <script language='javascript' type='text/javascript'>
    var arriba;
    function subir() {
    if (document.body.scrollTop != 0 || document.documentElement.scrollTop != 0) {
    window.scrollBy(0, -15);
    arriba = setTimeout('subir()', 10); //retardo en segundos
    }
    else clearTimeout(arriba);
    }
    </script>
    <!-- FIN flecha arriba -->

    <!-- efecto ventana modal-->
        <script type="text/javascript">
        function toogle(a,b,c)
        {
        document.getElementById(b).style.display=a;
        document.getElementById(c).style.display=a;
        }
        </script>



    <!-- fin efecto ventana modal -->


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
    <!-- calendario fecha antiguo (da conflicto con el nuevo)
    <script type="text/javascript" src="<?= URL; ?>js/jcalendar/calendar.js"></script>
    <script type="text/javascript" src="<?= URL; ?>js/jcalendar/calendar-es.js"></script>
    <script type="text/javascript" src="<?= URL; ?>js/jcalendar/calendar-setup.js"></script>
        --> 

        <!-- SLIDER -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?= URL; ?>css/styleslider.css">

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
    <div class="container">
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
                <a class="enlaceLogin" title="Mi cuenta" href="<?= URL; ?>login">MI CUENTA <img class="imgLogin" src="<?= URL; ?>img/micuenta.png" alt="Mi cuenta" height="15" /></a><br>
                <button type="button" class="botonlogin" title="Cerrar Sesión" onclick="window.location.href='<?= URL; ?>login/salir'">Cerrar Sesión</button>
            <?php else : ?>
                <button type="button" class="botonlogin" title="Registrarse" onclick="window.location.href='<?= URL; ?>registro'">Registrarse</button>
                <button type="button" class="botonlogin" title="Iniciar Sesión" onclick="window.location.href='<?= URL; ?>login'">Iniciar Sesión</button>
            <?php endif ?>
        </div>
    </div>
    <div class="col-md-12 contenido">
    <?= $this->section('content') ?>
    </div>
    <!-- footer -->
    <div class="col-md-12 pie">
        <div class="col-md-3 divpie">
            <p class="pFooter">SECCIONES WEB</p>
            <a href="<?= URL; ?>" title="Ir a INICIO">INICIO</a><br>
            <a href="<?= URL; ?>partidos" title="Ir a PARTIDOS">PARTIDOS</a><br>
            <a href="<?= URL; ?>noticias" title="Ir a NOTICIAS">NOTICIAS</a><br>
            <a href="<?= URL; ?>usuarios" title="Ir a USUARIOS">USUARIOS</a><br>
            <a href="<?= URL; ?>clubs" title="Ir a CLUBS">CLUBS</a><br>
            <a href="<?= URL; ?>mercadillo" title="Ir a 2ª MANO">2ª MANO</a><br>
            <a href="<?= URL; ?>monitores" title="Ir a MONITORES">MONITORES</a><br>
            <a href="<?= URL; ?>contacto" title="Ir a CONTACTO">CONTACTO</a><br>
            <a href="<?= URL; ?>login" title="Ir a MI CUENTA">MI CUENTA</a><br>

        <?php $idSession = Session::get('idUsuario'); ?>   
        <?php if (!isset($idSession)) : ?>

            <a href="<?= URL; ?>registro" title="Ir a REGISTRARME">REGISTRARME</a>

        <?php endif ?>


        </div>
        <div class="col-md-3 divpie">
        <p class="pFooter">CORPORATIVO</p>
            <a href="#" title="">EL CONCEPTO PADELGO!</a><br>
            <a href="../home/cookies">POLÍTICA DE COOKIES</a><br>
            <a href="../home/privacidad">POLÍTICA DE PRIVACIDAD</a><br>
            <a href="../home/faq">FAQ</a>


            <a href="#" onclick="toogle('block','modal','ventana')">Abrir Modal</a>
        <div id="modal" style="display: none;">


        <div id="ventana" class="contenedor" style="display: none;">
        <h2>Titulo</h2> "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."
        <a href="#close" title="Cerrar" onclick="toogle('none','modal','ventana')">Close</a>
        </div>
        </div>


        </div>
        <div class="col-md-3 divpie">
        <p class="pFooter">CLIMA EN MURCIA</p>
            <div id="cont_9655d95d1c1b9c5a02dc9b564ac720a6"><span id="h_9655d95d1c1b9c5a02dc9b564ac720a6"><a id="a_9655d95d1c1b9c5a02dc9b564ac720a6" href="http://www.tiempo.com/murcia.htm" target="_blank" rel="nofollow" style="color: #00ABEB; font-family: Roboto; font-size: 13px; text-decoration: none;">HOY</a></span><script type="text/javascript" async src="https://www.tiempo.com/wid_loader/9655d95d1c1b9c5a02dc9b564ac720a6"></script></div>
        </div>
        <div class="col-md-3 divpie">
        <p class="pFooter">CONTACTO</p>
            <div class='social_bookmarks_container redes'>
                <ul class='social_bookmarks'>
                    <li class='iconfacebook'>
                        <a href='https://es-es.facebook.com/' target="_blank">Facebook</a>
                    </li>
                    <li class='icontwitter'>
                        <a href='https://twitter.com/?lang=es' target="_blank">Twitter</a>
                    </li>
                    <li class='icongplus'>
                        <a href='https://plus.google.com/collections/featured' target="_blank">Google Plus</a>
                    </li>
                    <li class='iconrss'>
                        <a href='http://gplusrss.com/' target="_blank">RSS</a>
                    </li>
                    <li class='iconrssmail'>
                        <a href='<?= URL; ?>contacto'>RSS Mail</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </div>

  
</body>
</html>



