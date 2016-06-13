<?php $idSession = Session::get('idUsuario');  ?> 

<div class="navigation">
    <a title="INICIO" href="<?= URL; ?>"><img src="<?= URL; ?>img/menu/inicio.png" alt="INICIO" height="70" class="imagen-menu1" /></a>
    <a title="PARTIDOS" href="<?= URL; ?>partidos"><img src="<?= URL; ?>img/menu/partidos.png" alt="PARTIDOS" height="70" class="imagen-menu2" /></a>
    <a title="NOTICIAS" href="<?= URL; ?>noticias"><img src="<?= URL; ?>img/menu/noticias.png" alt="NOTICIAS" height="70" class="imagen-menu3" /></a>
    <a title="USUARIOS" href="<?= URL; ?>usuarios"><img src="<?= URL; ?>img/menu/usuarios.png" alt="USUARIOS" height="70" class="imagen-menu4" /></a>
    <a title="CLUBS" href="<?= URL; ?>clubs"><img src="<?= URL; ?>img/menu/clubs.png" alt="CLUBS" height="70" class="imagen-menu5" /></a>    
    <a title="MERCADILLO" href="<?= URL; ?>mercadillo"><img src="<?= URL; ?>img/menu/2mano.png" alt="MERCADILLO" height="70" class="imagen-menu6" /></a>
    <a title="MONITORES" href="<?= URL; ?>monitores"><img src="<?= URL; ?>img/menu/monitores.png" alt="MONITORES" height="70" class="imagen-menu6" /></a>
    <a title="CONTACTO" href="<?= URL; ?>contacto"><img src="<?= URL; ?>img/menu/contacto.png" alt="CONTACTO" height="70" class="imagen-menu6" /></a>

    <?php if(isset($idSession)) : ?>

    	 <a title="MENSAJES" href="<?= URL; ?>mensajes"><img src="<?= URL; ?>img/menu/mensajes.png" alt="MENSAJES" height="70" class="imagen-menu6" /></a>

    <?php endif ?>
</div>
