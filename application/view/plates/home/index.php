<?php $this->layout('layout') ?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <!--
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
        <li data-target="#myCarousel" data-slide-to="5"></li>
        <li data-target="#myCarousel" data-slide-to="6"></li>
        <li data-target="#myCarousel" data-slide-to="7"></li>
        <li data-target="#myCarousel" data-slide-to="8"></li>
        <li data-target="#myCarousel" data-slide-to="9"></li>
      </ol>
      -->
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="<?= URL; ?>img/slider/slider1.jpg" alt="slider1" >
        </div>
        <div class="item">
          <a href="<?= URL; ?>usuarios"><img src="<?= URL; ?>img/slider/slider2.jpg" alt="slider2" ></a>
        </div>
        <div class="item">
          <img src="<?= URL; ?>img/slider/slider3.jpg" alt="slider3" >
        </div>
        <div class="item">
          <a href="<?= URL; ?>partidos"><img src="<?= URL; ?>img/slider/slider4.jpg" alt="slider4" ></a>
        </div>
        <div class="item">
          <a href="<?= URL; ?>partidos"><img src="<?= URL; ?>img/slider/slider5.jpg" alt="slider5" ></a>
        </div>
        <div class="item">
          <a href="<?= URL; ?>noticias"><img src="<?= URL; ?>img/slider/slider6.jpg" alt="slider6" ></a>
        </div>
        <div class="item">
          <img src="<?= URL; ?>img/slider/slider7.jpg" alt="slider7" >
        </div>
        <div class="item">
          <img src="<?= URL; ?>img/slider/slider8.jpg" alt="slider8" >
        </div>
        <div class="item">
          <a href="<?= URL; ?>monitores"><img src="<?= URL; ?>img/slider/slider9.jpg" alt="slider9" ></a>
        </div>
        <div class="item">
          <a href="<?= URL; ?>mercadillo"><img src="<?= URL; ?>img/slider/slider10.jpg" alt="slider10" ></a>
        </div>
      </div>
      <!-- Left and right controls -->
      <!--
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      -->
    </div>
<div class="col-md-12">
	<div class="col-md-4">
		<h3> PRESENTACIÓN </h3>
		<p><?= $presentacion ?></p>
  </div>
  <div class="col-md-4">  
    <h3> OBJETIVOS Y DESARROLLO </h3>
      <p><?= $objetivos ?></p>    
      <p><?= $desarrollo ?></p>
  </div>
  <div class="col-md-4">  
    <h3> QUIÉNES SOMOS </h3>    
      <p> El equipo de 'PADEL GO!' esta integrado por un grupo humano con amplia experiencia en todos los  ámbitos referentes al mundo del pádel. 
      </p>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sollicitudin vestibulum purus, sed viverra purus tristique suscipit. Quisque ullamcorper nunc congue mi porttitor posuere. Nam sem lectus, commodo elementum porta non, suscipit ac dui. Donec pellentesque felis magna, vel varius purus venenatis ac. Phasellus eu diam vel elit gravida fringilla a sed sem. Duis aliquet a nibh non vehicula. Nullam fringilla euismod justo, vel interdum quam elementum ac. 
      </p>
  </div>
</div>