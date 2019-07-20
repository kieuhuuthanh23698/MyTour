<!DOCTYPE html>
<html>
    <head>
        <title>My Tour</title>
        <link type="image/x-icon" rel="shortcut icon" href="images/logo/logo-face.png" />
        <link type="image/x-icon" rel="icon" href="images/logo/logo-face.png"/>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/bootstrap.css"/>
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/fontawesome-all.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/animate.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/jquery-ui.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/style.css"/>

        <script src="<?php echo base_url() ?>public/js/jquery-3.3.1.min.js"></script>
        <script src="<?php echo base_url() ?>public/js/jquery-ui.min.js"></script>
        <script src="<?php echo base_url() ?>public/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>/public/js/app.js"></script>
<!--         <link rel="stylesheet" href="https://twitter.github.io/typeahead.js/css/examples.css" /> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
 <script src="https://twitter.github.io/typeahead.js/js/handlebars.js"></script>
 <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
 -->
        <script src="<?php echo base_url() ?>/public/js/bootstrap3-typeahead.js"></script>        
    </head>
    <body>
        
<!--        -------------------------------- HEADER ------------------------------------------>
        <?php echo isset($header)?$header:"" ?>

<!--        -------------------------------- BANNER ------------------------------------------>
        <?php echo isset($banner)?$banner:"" ?>
<!--        -------------------------------- SEARCH ------------------------------------------>
        <?php echo isset($search)?$search:"" ?>
<!--        -------------------------------- BODY ------------------------------------------>
        <?php echo isset($body)?$body:"" ?>
<!--        -------------------------------- FOOTER ------------------------------------------>
        <?php echo isset($footer)?$footer:"" ?>
        
        
    </body>
</html>