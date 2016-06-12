<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $titulo ?></title>
    <meta name="description" content="">
    <link rel="shortcut icon" href="<?= URL; ?>img/padelgoico.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
   
            <!-- script JS -->
    <?php $this->insert('partials/js') ?> 

            <!-- link CSS -->
    <?php $this->insert('partials/css') ?>

</head>
<body>
    <div class="container">    
            
            <!-- cabecera -->
        <div class="col-md-12 cabecera">
            <?php $this->insert('partials/cabecera') ?>
        </div>
            
            <!-- contenido -->
        <div class="col-md-12 contenido">
            <?= $this->section('content') ?>
        </div>
        
            <!-- fancybox -->
        <div>            
            <?php $this->insert('partials/fancybox') ?>
        </div>

            <!-- footer -->
        <div class="footer">        
            <?php $this->insert('partials/footer') ?> 
        </div>

    </div>
  
</body>
</html>



