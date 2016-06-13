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
            <a href="<?= URL; ?>mensajes" title="Ir a MENSAJES">MENSAJES</a><br>

        <?php $idSession = Session::get('idUsuario'); ?>   
        <?php if (!isset($idSession)) : ?>

            <a href="<?= URL; ?>registro" title="Ir a REGISTRARME">REGISTRARME</a>

        <?php endif ?>


        </div>

        <div class="col-md-3 divpie">
        <p class="pFooter">CORPORATIVO</p>
            <a href="#" onclick="toogle('block','ventana_aviso','aviso')">AVISO LEGAL</a><br>
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
                    <!--<li class='iconrss'>
                        <a href='http://gplusrss.com/' target="_blank">RSS</a>
                    </li>-->
                    <li class='iconrssmail'>
                        <a href='<?= URL; ?>contacto'>RSS Mail</a>
                    </li>
                </ul>
            </div>
        </div>
</div>