<?php
include('funciones/funciones.php');
include('config/setup.php');
?>
<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <?php $url = averiguaUrl(); ?>
    <title>
        <?= $titulo . (($seccion == 'index') ? '' : '/' . ucwords($seccion)); ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="icon" href="img/favicon.png" type="image/x-icon">
    <link href="css/mi.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/adminland.css">
</head>

<body>
    <div <?= (($seccion == 'index') ? ' class="cover"' : ' class="hidden"'); ?>>
        <div class="cover-image hero">
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="lead nav nav-justified nav-pills">
                        <?php
                        if (isset($_SESSION['tipo'])):
                            foreach (getPermisos() as $llave => $valor) {
                                ?>
                                <li <?= ($seccion == $valor) ? 'class="active"' : '' ?>>
                                    <a href="index.php?c=<?= $valor ?>"><?= ucfirst($valor) ?></a>
                                </li>
                                <?php
                            }
                        endif;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div>
        <?php
        if (isset($_SESSION['tipo'])):
            include getSection($seccion);
            include('modulos/logout.php');
        else:
            include('modulos/login.php');
        endif;
        ?>
    </div>
    <div class="modal fade" id="modal" role="dialog">
    </div>

    <script type="text/javascript" src="js/my.js"></script>
</body>

</html>