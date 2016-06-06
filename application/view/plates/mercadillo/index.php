<?php $this->layout('layout') ?>
<?php $idSession = Session::get('idUsuario'); ?>

<div class="container">
       
    <?php if(count($articulos) == 0): ?>

        <h6> .</h6>
        <h3>No se encuentran Artículos en la Base de Datos</h3>

    <?php else: ?>
        
        <h3>Disponemos de <?= count($articulos) ?> Artículos en la Base de Datos.</h3> 

        <?php if (isset($idSession)) : ?>   

                <login style="font-size: 18px;">    
                    <a href="mercadillo/vender">Vender un Artículo</a>
                <login/>
                
        <?php endif ?> 

         <?php foreach($articulos as $articulo): ?>   

            <?php foreach($usuarios as $usuario): ?>

            <?php if ($articulo->idUsuario == $usuario->idUsuario) : ?>                         

               <fieldset>
                   <ul> 
                        <li> 
                            <h3><?= $articulo->nombreArticulo; ?> </h3>      
                        </li>
                        <li>
                            <div class="vendedor">
                                <span>
                                    Vendido por: <?= $usuario->nombre . ' ' . $usuario->apellidos ?>
                                </span>                        
                            </div>
                        </li>
                        <li> 
                            <p><spam>Descrición:</spam>
                                <?= $articulo->descripcionArticulo ?>
                            </p>
                        </li>
                        <li> 
                            <p><spam>Teléfono de Contacto:</spam>
                                <?= $usuario->telefono ?>
                            </p>
                        </li>
                        
                   </ul>

           <div class="imagenArticulo">
                    <img src="<?= URL; ?>img/articulos/articulo<?= $articulo->idArticulo; ?>.png" 
                    alt="articulo<?= $articulo->idArticulo; ?>" height="150" /> 
            </div>
            
                </fieldset>
                <?php endif ?>           

            <?php endforeach ?> 

        <?php endforeach ?> 

    <?php endif ?>



    <?php if ($idSession == 1) : ?>
        <a href="../login/index"><h4>...Volver a Administración</h4></a>
    <?php endif ?>
</div>
