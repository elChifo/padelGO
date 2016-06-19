<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container" style="margin-left: -30px;padding-left: 3%; padding-right: 3%;">
    <?php $this->insert('partials/feedback') ?>

    <?php if(count($articulos) == 0): ?>

        <h3 class="titulo-pagina">No se encuentran Artículos en la Base de Datos</h3>

    <?php else: ?>
        
       <h3 class="titulo-pagina">ARTÍCULOS EN VENTA

        <?php if (isset($idSession)) : ?>   

            <login style="font-size: 18px;">    
                    <a href="../mercadillo/vender" style="font-size: 18px; float:right;" class="colorPadelGO2">+ Vender un Artículo</a>
            <login/>
                
        <?php endif ?> 

        </h3> 

         <?php foreach($articulos as $articulo): ?> 
         
            <?php if ($articulo->idUsuario == $idSession) : ?>                         
            <div class="divMercadillo" style="width: 30%;float:left;"> 
                    <h3 class="tituloanuncio"><?= $articulo->nombreArticulo; ?> </h3>
                <img src="<?= URL; ?>img/articulos/articulo<?= $articulo->idArticulo; ?>.png" 
                    alt="articulo<?= $articulo->idArticulo; ?>" height="150" /><br><br>
                <p><span>Descrición:</span>
                    <?= $articulo->descripcionArticulo ?>
                </p> 
            
					<p>
                        <h4>
        					<a href="../mercadillo/editar?idArticulo=<?= $articulo->idArticulo; ?>">
        						Editar Artículo
        					</a><br>

        			   		<a href="../mercadillo/borrar?idArticulo=<?= $articulo->idArticulo; ?>" onclick="return confirm('&#191;Confirmar borrado?')">
        			   			Borrar Artículo
        			   		</a>
                        </h4>    
					</p>                  
            </div>
            <?php endif ?>               
        
        <?php endforeach ?> 

    <?php endif ?>

    <?php if ($idSession == 1) : ?>
        <button onclick="window.location.href='../login'" class="btnbutton1" style="clear:both;float:left">&#8592; Volver a Administración</button>
        <a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a> 
    <?php endif ?>
</div>
