<?php include('config/setup.php'); ?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
	<?php $url= averiguaUrl();?>
    <title><?php if ($seccion == 'index'){echo 'cerrajeria';} else{echo 'cerrajeria/ '.$seccion;}; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link href="css/mi.css" rel="stylesheet" type="text/css">
</head>
	<body>
		<div <?php if( $seccion == 'index' ){ echo ' class="cover"';}
			else {echo ' class="hidden"'; };
			 ?>
            <div class="cover-image hidden-sm" style="background: url('img/logo.jpg') no-repeat left;">
			</div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="lead nav nav-justified nav-pills">
                            <li <?php if( $seccion == 'ventas' ){ echo ' class="active"';}; ?>>
                                <a href="index.php?c=ventas">ventas</a>
                            </li>
                            <li <?php if( $seccion == 'facturacion' ){ echo ' class="active"';}; ?>>
                                <a href="index.php?c=facturacion">facturacion</a>
                            </li>
                            <li <?php if( $seccion == 'clientes' ){ echo ' class="active"';}; ?>>
                                <a href="index.php?c=clientes#Todos">clientes</a>
                            </li>
                            <li <?php if( $seccion == 'proveedores' ){ echo ' class="active"';}; ?>>
                                <a href="index.php?c=proveedores#Todos">proveedores</a>
                            </li>
                            <li <?php if( $seccion == 'gastos' ){ echo ' class="active"';}; ?>>
                                <a href="index.php?c=gastos#Todos">gastos<br></a>
                            </li>
                            <li <?php if( $seccion == 'stock' ){ echo ' class="active"';}; ?>>
                                <a href="index.php?c=stock">stock<br></a>
                            </li>
                            <li <?php if( $seccion == 'cierre' ){ echo ' class="active"';}; ?>>
                                <a href="index.php?c=cierre">cierre<br></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
		<div>
		<?php
				$legueate= function(){ echo '<div class=container><div class="row pull-right" > <div> por favor ingrese usuario y contraseña</div></div></div>'; };
			switch( $seccion ){
				case 'ventas': (( isset( $_SESSION['tipo'] ))? include( 'modulos/ventas.php' ): $legueate() ); break;
				case 'facturacion': (( isset( $_SESSION['tipo'] ))? include( 'modulos/facturacion.php' ): $legueate() ); break;
				case 'clientes': (( isset( $_SESSION['tipo'] ))? include( 'modulos/clientes.php' ): $legueate() ); break;
				case 'proveedores': (( isset( $_SESSION['tipo'] ))? include( 'modulos/proveedores.php' ): $legueate() ); break;
				case 'gastos': (( isset( $_SESSION['tipo'] ))? include( 'modulos/gastos.php' ): $legueate() ); break;
				case 'stock': (( isset( $_SESSION['tipo'] ))? include( 'modulos/stock.php' ): $legueate() ); break;
				case 'cierre': (( isset( $_SESSION['tipo'] ))? include( 'modulos/cierre.php' ): $legueate() ); break;
				default: include( 'modulos/default.php' );
			};
			if( isset( $_SESSION['tipo'] )):
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