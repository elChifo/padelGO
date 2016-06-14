<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>

	<?php if(count($clubs) == 0): ?>

        <h3 class="titulo-pagina">No se encuentran Clubs en la Base de Datos</h3>

    <?php else: ?> 

        <h3 class="titulo-pagina">CLUBS</h3>  

		<?php foreach($clubs as $club): ?>

		   <div class="divClub" style="width: 30%;float:left;"> Nombre Club:
					   			<strong> 
					   				<?= $club->nombreClub ?> &nbsp;&nbsp;&nbsp; 
					   				
					   			</strong> 			
				   					<p> Direccion : <?= $club->direccionClub ?>  </p>
				   					<p> Nº Pistas: <?= $club->numPistas ?>  </p>	
						<a href="../partidos/ver?idClub=<?= $club->idClub; ?>">Ver Partidos</a>
				<div class="imagenClub">
	                <img src="<?= URL; ?>img/clubs/club<?= $club->idClub; ?>.png" 
	                title="Club<?= $club->nombreClub; ?>" height="150" width="325" /> 
	            </div>
			</div>

		<?php endforeach ?>

	<?php endif ?>
	<input type="button" class="btnimprimir" value="Imprimir página" onclick="window.print()">
	<a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a>
</div>
