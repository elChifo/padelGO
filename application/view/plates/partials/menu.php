<div class="navigation">
    <a href="<?php echo URL; ?>">INICIO</a>
    <a href="<?php echo URL; ?>usuarios">USUARIOS</a>
    <a href="<?php echo URL; ?>clubs">CLUBS</a>
    <a href="<?php echo URL; ?>partidos">PARTIDOS</a>    
    <a href="<?php echo URL; ?>noticias">NOTICIAS</a>
    <a href="<?php echo URL; ?>registro">REGISTRO</a>
    <a href="<?php echo URL; ?>contacto">CONTACTO</a>
	
	<?php if (isset($_SESSION['idUsuario'])) : ?> 

        <a href="<?php echo URL; ?>login/salir">SALIR</a>

    <?php else : ?> 

    	<a href="<?php echo URL; ?>login">LOGIN</a> 

	<?php endif ?>

</div>