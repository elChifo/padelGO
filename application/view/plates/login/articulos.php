<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>

    <h4>
        <a href="../mercadillo/vender">Vender un Artículo</a>
    </h4>
       
    <?php if(count($articulos) == 0): ?>

        <h3 class="titulo-pagina">No se encuentran Artículos en la Base de Datos</h3>

    <?php else: ?>
        
       <h3 class="titulo-pagina">MIS ARTÍCULOS</h3> 

         <?php foreach($articulos as $articulo): ?> 

            <?php if ($articulo->idUsuario == $idSession) : ?>                         

               <fieldset>
                <table border="1" class="tablapartidos">
                <tr><td>
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
                    <br />
                    <div class="imagenArticulo">
                        <img src="<?= URL; ?>img/articulos/articulo<?= $articulo->idArticulo; ?>.png" 
                        alt="articulo<?= $articulo->idArticulo; ?>" height="150" /> 
                    </div> 
            
					<p>
                        <h4>
        					<a href="../mercadillo/editar?idArticulo=<?= $articulo->idArticulo; ?>">
        						Editar los datos del Artículo
        					</a> &nbsp;&nbsp;&nbsp;

        			   		<a href="../mercadillo/borrar?idArticulo=<?= $articulo->idArticulo; ?>">
        			   			Borrar los datos del Artículo
        			   		</a>
                        </h4>    
					</p>
                    </td></tr>
                    </table>
                </fieldset>                     

            <?php endif ?>               

        <?php endforeach ?> 

    <?php endif ?>

    <?php if ($idSession == 1) : ?>
        <a href="../login/index"><h4>...Volver a Administración</h4></a>
        <a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a> 
    <?php endif ?>
</div>
