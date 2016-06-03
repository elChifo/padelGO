<?php $this->layout('layout') ?>
<?php $idSession = Session::get('idUsuario'); ?>

<div class="container">
       
    <?php if(count($articulos) == 0): ?>

        <h6> .</h6>
        <h3>No se encuentran Artículos en la Base de Datos</h3>

    <?php else: ?>
        
        <h3>Disponemos de <?= count($articulos) ?> Artículos en la Base de Datos.</h3> 

         <?php foreach($articulos as $articulo): ?> 

            <?php if ($articulo->idUsuario == $idSession) : ?>                         

               <fieldset>
                   <ul> 
                        <li> 
                            <h3><?= $articulo->nombreArticulo; ?> </h3>      
                        </li>
                        
                        <li> 
                            <p><spam>Descrición:</spam>
                                <?= $articulo->descripcionArticulo ?>
                            </p>
                        </li>
                   </ul>

                <div class="imagenArticulo">
                    <img src="<?= URL; ?>img/articulos/articulo<?= $articulo->idArticulo; ?>.png" 
                    alt="articulo<?= $articulo->idArticulo; ?>" height="150" /> 
                </div> 
            
					<p>
                        <h4>
        					<a href="../mercadillo/editar?idArticulo=<?= $articulo->idArticulo; ?>">
        						Editar los datos de Usuario
        					</a> &nbsp;&nbsp;&nbsp;

        			   		<a href="../mercadillo/borrar?idArticulo=<?= $articulo->idArticulo; ?>">
        			   			Borrar los datos de Usuario
        			   		</a>
                        </h4>    
					</p>

                </fieldset> 

            <?php endif ?>               

        <?php endforeach ?> 

        <?php if ($articulo->idUsuario != $idSession) : ?>
                    
            <h3>No Tiene Artículos a la Venta <a href="../login/"> ...Volver </a></h3>
                
        <?php endif ?> 

    <?php endif ?>

    <?php if ($idSession == 1) : ?>
        <a href="../login/index"><h4>...Volver a Administración</h4></a>
    <?php endif ?>
</div>
