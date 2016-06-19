<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container" style="margin-left: -30px;padding-left: 3%; padding-right: 3%;">
    
    <h3 class="titulo-pagina">ADMINISTRACIÓN DE USUARIOS 

                <login style="font-size: 18px;">    
                    <a href="../registro" style="font-size: 18px; float:right;" class="colorPadelGO2">+ Registrar un Nuevo Usuario</a>
                <login/>    
    </h3>
    
		<?php foreach($usuarios as $usuario): ?>

            <?php if ($usuario->email != 'admin@padelgo.com') : ?>

           <div class="divMercadillo2" style="width: 30%;float:left;text-align: left;">
           <ul> 
                <li> 
                	NOMBRE: <b> <?= $usuario->nombre; ?> </b><br><br>
                </li>
                <li> 
                	APELLIDOS: <b> <?= $usuario->apellidos; ?> </b><br><br>
                </li>
                <li> 
                	SEXO: <b> <?= $usuario->sexo; ?> </b><br><br>
                </li>
                <li> 
                	FECHA NACIMIENTO: <b> <?= $usuario->fechaNac; ?> </b><br><br>
                </li>
                <li> 
                	DIRECCIÓN: <b> <?= $usuario->direccion; ?> </b><br><br>
                </li>
                <li> 
                	TELÉFONO: <b> <?= $usuario->telefono; ?> </b><br><br>
                </li>
                <li> 
                	CATEGORÍA: <b> <?= $usuario->idCategoria . 'ª Categoría'; ?> </b><br><br>
                </li>
       		       
                <div class="imagenUsuario">
                    <img src="<?= URL; ?>img/usuarios/usuario<?= $usuario->idUsuario; ?>.png" 
                            alt="usuario<?= $usuario->idUsuario; ?>" height="100" /> 
                </div>   
        			<p>
                        <h4>
        					<a href="../usuarios/editar?idUsuario=<?= $usuario->idUsuario; ?>">
        						Editar Usuario
        					</a> &nbsp;&nbsp;&nbsp;

        			   		<a href="../usuarios/borrar?idUsuario=<?= $usuario->idUsuario; ?>"
                            onclick="return confirm('&#191;Confirmar borrado?')">
        			   			Borrar Usuario
        			   		</a>
                        </h4>    
					</p>
        		
           </ul>
           </div>
           <?php endif ?>

        <?php endforeach ?>
        
        <button onclick="window.location.href='../login'" class="btnbutton1" style="clear:both;float:left">&#8592; Volver a Administración</button>
        <a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a> 
</div>