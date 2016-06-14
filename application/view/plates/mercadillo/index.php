<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container" style="margin-left: -30px;padding-left: 3%; padding-right: 3%;">
       
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
            <div class="divMercadillo" style="width: 30%;float:left;"> 
            <?php foreach($usuarios as $usuario): ?>

            <?php if ($articulo->idUsuario == $usuario->idUsuario) : ?>  

                <h3 class="tituloanuncio"><?= $articulo->nombreArticulo; ?> </h3>
                <img src="<?= URL; ?>img/articulos/articulo<?= $articulo->idArticulo; ?>.png" 
                    alt="articulo<?= $articulo->idArticulo; ?>" height="150" /><br><br>
                <p><span>Descrición:</span>
                    <?= $articulo->descripcionArticulo ?>
                </p>    
                <div class="vendedor">
                    <span>
                    Publicado por: <b><?= $usuario->nombre .' '. $usuario->apellidos ?></b>
                    </span><br><br>             
                </div>
                <p><span>PRECIO:</span>
                    <b><?= $articulo->precio ?> €</b>
                </p>
                <p><span>Teléfono de Contacto:</span>
                    <b><?= $usuario->telefono ?></b>
                </p>

                <?php endif ?>           

            <?php endforeach ?> 
            </div>
        <?php endforeach ?> 

    <?php endif ?>
<a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a>
</div>
