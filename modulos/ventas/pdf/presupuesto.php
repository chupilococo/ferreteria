<?php
//var_dump($_POST);
include('../../../config/setup.php');
$venta = $_POST;
//var_dump($venta);
$content = "
<style type='text/css'>
	img{margin:0 0 0 80px;}
	.center{ text-align: center}
	.lead{ font-size:120%; }
	.bold{font-weight: bold}
	th{background-color:#aaaaaa;}
	td{border-bottom:1px solid black; word-wrap: break-word; }
	.derecha{text-align:right;}
	.izquierda{text-align:left;}
</style>
<page>
	<img src='" . getLogo($venta['direcc']) . "' alt='Logo' width=600 />
    <!--<p class='center lead bold'>Servicio Integral de cerrajería y Sistemas de accesos Electrónicos</p><p class='center lead bold'>" . getDirecc($venta['direcc']) . "</p>-->
    <p class='center lead bold'> Insumos y prestaciones </p><p class='center lead bold'>" . getDirecc($venta['direcc']) . "</p>
   	<table  class='derecha' border='0'>
	<tr><th>Producto</th><th >Descripción</th><th style='width: 10px;'>Cantidad</th><th>Precio unitario</th><th>Precio total</th></tr>
	";
$total = 0;
foreach ($venta as $indice => $valor) {
	if ($indice != 'tipoVenta' && $indice != 'factura' && $indice != 'fechaVenta' && $indice != 'ClienteId') {
		//echo "{$indice} => {$val$content$contentor} <hr />";
		$producto = json_decode($valor, true);
		//var_dump($producto);
		if (empty(trim($producto))) {
			$content .= "
			<tr>
				<td class='izquierda' style='width: 100px;'>" . $producto['CargaNombre'] . "</td>
				<td class='izquierda' style='width: 200px;'>" . $producto['CargaDesc'] . "</td>
				<td style='width: 10px'>" . $producto['CargaCantidad'] . "</td>
				<td >" . number_format($producto['CargaPrecio'], 2, ",", ".") . "</td>
				<td >" . number_format($producto['CargaTotal'], 2, ",", ".") . "</td>
			</tr>";
			$total += $producto['CargaTotal'];
		}
	};
};
$content .= "
	<tr class='lead bold'>
		<td></td>
		<td></td>
		<td style='width: 140px;'></td>
		<td style='width: 140px;'>TOTAL:</td>
		<td style='width: 140px;'>" . number_format($total, 2, ",", ".") . "</td>
	</tr>
	</table>
	" . getSocilaMedia($venta['direcc']) . "
	<page_footer>
		<p class='derecha'> fecha:" . $venta['fechaVenta'] . " \t pagina: [[page_cu]]/[[page_nb]]</p>
	</page_footer>
	</page>
";

require_once __DIR__ . '/html2pdf/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new HTML2PDF('P', 'A4', 'es');
$html2pdf->WriteHTML($content);
$html2pdf->Output(dirname(__FILE__) . '/presupuesto.pdf', 'F');
?>

<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Presupuesto</h4>
		</div>
		<div class="modal-body">
			<!--?php echo $content;?-->
			<hr />
			<object class='objectModal' data="modulos/ventas/pdf/presupuesto.pdf" width="500" height="375" type="application/pdf">
			</object>
		</div>
		<div class="modal-footer">
			<a href="modulos/ventas/pdf/presupuesto.pdf" target="_blank" class="btn btn-info">Abrir</a>
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
		</div>
	</div>
</div>

<?php

function getDirecc($num)
{
	switch ($num) {
		case "1":
			return "Mendoza 5017 CABA";
			break;
		case "2":
			return "Estrada 324, Trenque Lauquen - Tel: 495412";
			break;
		case "3":
			return "Echeverria 5099, CABA";
			break;
	}
};

function getSocilaMedia($num)
{
	switch ($num) {

		case "1":
			return "
				<h3>Contacto:</h3>
				<p>
					<img src='img/ws.jpg' width='30'>1138836755<br/>
					<img src='img/mail.jpg' width='30'> Cerratrenque@gmail.com<br/>
					<img src='img/web.jpg' width='30'>trenquesrl.com.ar<br/>
					<img src='img/ecomerce.jpg' width='30'>tiendatrenque.com.ar<br/>
					<img src='img/inst.jpg' width='30'>@Trenque_insumos_y_prestaciones
				</p>
				";
			break;
		case "2":
			return;
			break;
		case "3":
			return "
			<h3>Contacto:</h3>
			<p>
				<img src='img/tel.jpg' width='30'>45219377<br/>
				<img src='img/ws.jpg' width='30'>1150024497<br/>
				<img src='img/mail.jpg' width='30'>ferreteriatrenque@gmail.com<br/>
				<img src='img/web.jpg' width='30'>trenquesrl.com.ar<br/>
				<img src='img/ecomerce.jpg' width='30'>tiendatrenque.com.ar<br/>
				<img src='img/inst.jpg' width='30'>@Trenque_insumos_y_prestaciones
			</p>
			";
			break;
	}
};

function getLogo($num)
{
	switch ($num) {

		case "1":
			return "logo_cerrajeria.jpg";
			break;
		case "2":
			return "logo_cerrajeria.jpg";
			break;
		case "3":
			return "logo_ferreteria.jpg";
			break;
	}
};
