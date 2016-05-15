<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $titulo ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
    <script>
        var url = "<?php echo URL; ?>";
    </script>

    <!-- our JavaScript -->

        <!-- BOOTSTRAP -->
    <script type="text/javascript" src="<?php echo URL; ?>js/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?php echo URL; ?>js/jcalendar/calendar.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/jcalendar/calendar-es.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/jcalendar/calendar-setup.js"></script>
        
    <!-- CSS -->

    <!-- BOOTSTRAP 
        <link rel="stylesheet" type="text/css" 
                href="<?php echo URL; ?>css/bootstrap.css"> 

        <link rel="stylesheet" type="text/css" 
                href="<?php echo URL; ?>css/bootstrap.min.css"> 
    -->

    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/jcalendar/theme.css">
</head>
<body>
    <!-- logo -->
    <div class="logo">Padel GO!
    </div>

    <!-- navigation -->
<?php $this->insert('partials/menu') ?> 

<?= $this->section('content') ?>

    <!-- jQuery, loaded in the recommended protocol-less way -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
    
</body>
</html>

