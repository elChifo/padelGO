<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>
  
<div class="container">
	<div class="col-md-12">
		<div class="col-md-4">
		
		<script>!window.jQuery && document.write(unescape('%3Cscript src="<?= URL; ?>jsjquery-1.7.1.min.js"%3E%3C/script%3E'))</script>

			<input type="button" value="Política de Cookies" class="button" data-type="zoom" />
			
			<div class="overlay-container">
				<div class="ventana zoom">

					<h3> POLÍTICA DE COOKIES </h3>
					
					<h4> ¿Qué son las Cookies?  </h4>    
				    <p> -Una cookie es un fichero que se descarga en su ordenador al acceder a 
						determinadas páginas web. Las cookies permiten a una página web, entre otras 
						cosas, almacenar y recuperar información sobre los hábitos de navegación de un
						usuario o de su equipo y, dependiendo de la información que contengan y de la
						forma en que utilice su equipo, pueden utilizarse para reconocer al usuario. 
				    </p>
				    <h4> Cookies de analisis estadístico </h4>  
				    <p> 
				     -Son aquellas que, bien tratadas por nosotros o por terceros, permiten 
					cuantificar el número de visitantes y analizar estadísticamente la utilización
					que hacen los usuarios de nuestros servicios. Gracias a ellas podemos estudiar
					la navegación por nuestra página web y mejorar así la oferta de productos o 
					servicios que ofrecemos. Estas cookies no irán asociadas a ningún dato de 
					carácter personal que pueda identificar al usuario, dando información sobre el 
					comportamiento de navegación de forma anónima.
					  </p>
				    <h4> Cookies técnicas </h4>  
				    <p> 
				     -Son aquéllas que permiten al usuario la navegación a través de una página 
						web, plataforma o aplicación y la utilización de las diferentes opciones 
						servicios que en ella existan como, por ejemplo, controlar el tráfico y la 
						comunicación de datos, identificar la sesión, acceder a partes de acceso 
						restringido, recordar los elementos que integran un pedido, realizar el proceso
						de compra de un pedido, realizar la solicitud de inscripción o participación en
						un evento, utilizar elementos de seguridad durante la navegación, almacenar 
						contenidos para la difusión de videos o sonido o compartir contenidos a través 
						de redes sociales
					</p>					
					<span class="close">Cerrar</span>
				</div>
			</div>	
		</div>
	</div> 
</div>

