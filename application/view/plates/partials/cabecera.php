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

<?php $idSession = Session::get('idUsuario');  ?> 