<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container">
       
    <?php if(count($monitores) == 0): ?>

        <h3 class="titulo-pagina">No se encuentran Monitores en la Base de Datos</h3>

    <?php else: ?>
        
        <h3 class="titulo-pagina">MONITORES</h3> 

        <?php if (isset($idSession)) : ?>   

            <login style="font-size: 18px;">Eres Monitor? Anunciate 
                <a href="../monitores/solicitar">AQUI</a>
            <login/>
                
        <?php endif ?> 

         <?php foreach($monitores as $monitor): ?>   

            <?php foreach($usuarios as $usuario): ?>

            <?php if ($monitor->idUsuario == $usuario->idUsuario) : ?>                         

               <fieldset style="border: 2px solid navy; width: 100rem; padding: 1rem;">
                
                <table border="1" class="tablapartidos">
                    <tr>
                        <td>
                             <ul> 
                                <li> 
                                    <h3>
                                    <img src="<?= URL; ?>img/usuarios/usuario<?= $usuario->idUsuario; ?>.png" 
                                        alt="usuario<?= $usuario->idUsuario; ?>" height="60" />
                                    <?= $usuario->nombre . ' ' . $usuario->apellidos; ?>
                                    
                                    </h3> <br>     
                                </li>
                                <ul>
                                    <li>
                                        Categoría: <?= $usuario->idCategoria . 'ª Categoría'; ?>
                                    </li>
                                    <li>
                                        Teléfono: <?= $usuario->telefono; ?>
                                    </li>
                                    <li>
                                        Horario de Clases: <?= $monitor->horarioClases; ?>
                                    </li>
                                    <li>
                                        Anuncio: <?= $monitor->anuncio; ?>
                                    </li>
                                </ul>                        
                            </ul>
                        </td>
                    </tr>
                </table>

                </fieldset>

                <?php endif ?>           

            <?php endforeach ?> 

        <?php endforeach ?> 

    <?php endif ?>

</div>
