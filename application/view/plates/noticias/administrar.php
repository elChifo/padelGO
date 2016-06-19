<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container" style="margin-left: -30px;padding-left: 3%; padding-right: 3%;">

    <h3 class="titulo-pagina">ADMINISTRACIÓN DE NOTICIAS &nbsp;&nbsp;&nbsp;

                <login style="font-size: 18px;">    
                    <a href="../noticias/crear" style="font-size: 18px; float:right;" class="colorPadelGO2">+ Registrar una Nueva Noticia</a>
                <login/>    
    </h3>
    
	<?php foreach($noticias as $noticia): ?>
            <div class="divMercadillo" style="width: 30%;float:left;">
                
                    <b>TITULAR: </b><?= $noticia->titular; ?><br>

                    <b>FECHA: </b><?= $noticia->fechaNoticia; ?><br><br>

                    <b>CONTENIDO: </b><?= $noticia->contenido; ?><br><br> 
           
           <div class="imagenNoticia">
                <img src="<?= URL; ?>img/noticias/noticia<?= $noticia->idNoticia; ?>.png" 
                alt="noticia<?= $noticia->idNoticia; ?>" height="150" /> 
            </div>
    			<p>
                    <h4>
    					<a href="../noticias/editar?idNoticia=<?= $noticia->idNoticia; ?>">
    						Editar la Noticia
    					</a> &nbsp;&nbsp;&nbsp;
    			   		<a href="../noticias/borrar?idNoticia=<?= $noticia->idNoticia; ?>"
                        onclick="return confirm('&#191;Confirmar borrado?')">
    			   			Borrar la Noticia
    			   		</a>
                    </h4>
				</p>
            </div>        
    <?php endforeach ?>
    <br>
    <button onclick="window.location.href='../login'" class="btnbutton1" style="clear:both;float:left">&#8592; Volver a Administración</button>
    <a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a>
</div>