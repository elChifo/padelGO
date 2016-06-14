<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container" style="margin-left: -30px;padding-left: 3%; padding-right: 3%;">

	<?php if(count($clubs) == 0): ?>

        <h3 class="titulo-pagina">No se encuentran Clubs en la Base de Datos</h3>

    <?php else: ?> 

        <h3 class="titulo-pagina">CLUBS</h3>  

		<?php foreach($clubs as $club): ?>
		    <div class="divClub" style="width: 30%;float:left;"> 
		    	<h4><b><?= $club->nombreClub ?> &nbsp;&nbsp;&nbsp;</b></h4>	
	            <img src="<?= URL; ?>img/clubs/club<?= $club->idClub; ?>.png" title="Club<?= $club->nombreClub; ?>" height="125" width="275" style="border: 1px solid #333"/> <br><br>		
				<p> <b>Direccion:</b> <?= $club->direccionClub ?>  </p>
				<p> Nº Pistas: <b><?= $club->numPistas ?></b>  </p>	
				<a class="colorPadelGO2" href="../partidos/ver?idClub=<?= $club->idClub; ?>">Ver Partidos</a>
			</div>

		<?php endforeach ?>

	<?php endif ?>
	<input type="button" class="btnimprimir" value="Imprimir página" onclick="window.print()">
	<a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a>
</div>
