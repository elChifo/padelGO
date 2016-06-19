<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container" style="margin-left: -30px;padding-left: 3%; padding-right: 3%;">
    <?php $this->insert('partials/feedback') ?>
    
    <h3 class="titulo-pagina">ADMINISTRACIÓN DE CLUBS &nbsp;&nbsp;&nbsp;  

                <login style="font-size: 18px;">    
                    <a href="../clubs/insertar" style="font-size: 18px; float:right;" class="colorPadelGO2">+ Registrar un Nuevo Club</a>
                <login/>    
    </h3>
    
	<?php foreach($clubs as $club): ?>

        <div class="divMercadillo1" style="width: 30%;float:left;">
            <ul style="text-align: left"> 
                <li> Nombre Club: <b><?= $club->nombreClub ?> &nbsp;&nbsp;&nbsp;</b> </li>                        
                        <li> Direccion : <b><?= $club->direccionClub ?></b>  </li>
                        <li> Nº Pistas: <b><?= $club->numPistas ?></b>  </li>
            </ul>
            <a href="../partidos/ver?idClub=<?= $club->idClub; ?>">Ver Partidos</a><br><br>
            <div style="text-align: center">
                <img src="<?= URL; ?>img/clubs/club<?= $club->idClub; ?>.png" 
                alt="club<?= $club->idClub; ?>" height="100" width="250" /> 
            </div>
   		
    			<p>
                    <h4>
    					<a href="../clubs/editar?idClub=<?= $club->idClub; ?>">
    						Editar Club
    					</a>&nbsp;&nbsp;&nbsp;
    			   		<a href="../clubs/borrar?idClub=<?= $club->idClub; ?>"
                        onclick="return confirm('&#191;Confirmar borrado?')">
    			   			Borrar Club
    			   		</a>
                        
                    </h4>
				</p>
        </div>        
    <?php endforeach ?>
    <button onclick="window.location.href='../login'" class="btnbutton1" style="clear:both;float:left">&#8592; Volver a Administración</button>
    <a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a> 
</div>