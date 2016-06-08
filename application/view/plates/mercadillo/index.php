<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container">
       
    <?php if(count($articulos) == 0): ?>

        <h3 class="titulo-pagina">No se encuentran Artículos en la Base de Datos</h3>

    <?php else: ?>
        
        <h3 class="titulo-pagina">ARTÍCULOS</h3> 

        <?php if (isset($idSession)) : ?>   

            <login style="font-size: 18px;">    
                <a href="../mercadillo/vender">Vender un Artículo</a>
            <login/>
                
        <?php endif ?> 

         <?php foreach($articulos as $articulo): ?>   

            <?php foreach($usuarios as $usuario): ?>

            <?php if ($articulo->idUsuario == $usuario->idUsuario) : ?>                         

               <fieldset style="border: 2px solid navy; width: 100rem; padding: 1rem;"> 
                
                <table border="1" class="tablapartidos">
                    <tr>
                        <td>
                           <ul> 
                                <li> 
                                    <h3 class="tituloanuncio"><?= $articulo->nombreArticulo; ?> </h3>
                                </li>
                                <li>
                                    <div class="vendedor">
                                        <span>
                                        Vendido por: <?= $usuario->nombre .' '. $usuario->apellidos ?>
                                        </span>                        
                                    </div>
                                </li>
                                <li> 
                                    <p><spam>Descrición:</spam>
                                        <?= $articulo->descripcionArticulo ?>
                                    </p>
                                </li>
                                <li> 
                                    <p><spam>PRECIO:</spam>
                                        <?= $articulo->precio ?> €
                                    </p>
                                </li><br>
                                <li> 
                                    <p><spam>Teléfono de Contacto:</spam>
                                        <?= $usuario->telefono ?>
                                    </p>
                                </li>
                                
                           </ul>
                        </td>
                    </tr>
                </table>
           <div class="imagenArticulo">
                    <img src="<?= URL; ?>img/articulos/articulo<?= $articulo->idArticulo; ?>.png" 
                    alt="articulo<?= $articulo->idArticulo; ?>" height="150" /> 
            </div>
            
                </fieldset>

                <?php endif ?>           

            <?php endforeach ?> 

        <?php endforeach ?> 

    <?php endif ?>
<a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a>
</div>
