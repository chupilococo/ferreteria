<?php

include('../../../config/setup.php');
require_once 'html2pdf/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$consulta = "SELECT
				stock.nombre,
				venta.cantidad,
				venta.precioParcial,
				venta.precioProveedor,
				venta.formaPago
			  FROM
				rel_stock_clientes AS venta
			  JOIN stock
				on venta.stock_id=stock.id
			  WHERE
				facturas_id = '$id'";
	$query = mysqli_query($cnx, $consulta);
	$consultaFac = "SELECT
				nombre
			  FROM
				facturas
			  WHERE
				id = '$id'";
	$queryFac = mysqli_query($cnx, $consultaFac);
	$fac = mysqli_fetch_assoc($queryFac);
	$total = 0;
	$totalGastos = 0;
} else {
	//TODO
};


$content = "";

while ($fila = mysqli_fetch_assoc($query)) {
	$total += ($fila['precioParcial'] * $fila['cantidad']);
	$totalGastos += ($fila['precioProveedor'] * $fila['cantidad']);
	$content .= "<tr>
		<td> $fila[nombre]</td>
			<td> $fila[cantidad]</td>
			<td> $fila[precioParcial]</td>
			<td> $fila[precioProveedor]</td>
			<td>" . (($fila['formaPago'] == 1) ? 'Si' : 'No') . "</td>
			<td> " . $fila['precioParcial'] * $fila['cantidad'] . "</td>
		</tr>";
};

$sytle = "
<style type='text/css'>
	img{margin:0 0 0 80px;}
	.center{ text-align: center}
	.lead{ font-size:120%; }
	.bold{font-weight: bold}
	th{background-color:#aaaaaa;}
	td{border-bottom:1px solid black;}
	.derecha{text-align:right;}
</style>
";
$pageStart = "
<page>
";

// $logo = "
// 		<img src='" . getLogo($venta[direcc]) . "' alt='Logo' width=600 />
// ";
// $direccion = "
// 	<p class='center lead bold'> Insumos y prestaciones </p><p class='center lead bold'>" . getDirecc($venta[direcc]) . "</p>
// ";

$tableHeader = "
	<table border='0'>
	<tr>
		<th>nombre</th>
		<th>cantidad</th>
		<th>precioParcial</th>
		<th>precioProveedor</th>
		<th>Pago con tarjeta</th>
		<th>precio * cantidad</th>
		<th></th>
	</tr>
";

$tableFooter = "
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td class=''>Total Bruto:</td>
		<td class=''>$total</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td class=''>Total Gastos:</td>
		<td class=''>$totalGastos</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td class='lead'>Total Neto:</td>
		<td class='lead'>" . ($total - $totalGastos) . "</td>
	</tr>
</table>
";


$pageFooter = "
<page_footer>
</page_footer>
";

$pageEnd = "
</page>
";



$finalPage = $sytle . $pageStart . $tableHeader . $content . $tableFooter . $pageFooter . $pageEnd;

$html2pdf = new HTML2PDF('P', 'A4', 'es');
$html2pdf->WriteHTML($finalPage);
$html2pdf->Output(dirname(__FILE__) . '/presupuesto.pdf', 'F');
?>

<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Presupuesto</h4>
		</div>
		<div class="modal-body">
			<!-- <textarea readonly>
				<?= $finalPage; ?>
			</textarea> -->
			<hr />
			<object class='objectModal' data="modulos/fac/pdf/presupuesto.pdf" width="500" height="375" type="application/pdf"></object>
		</div>
		<div class="modal-footer">
			<a href="modulos/fac/pdf/presupuesto.pdf" target="_blank" class="btn btn-info">Abrir</a>
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
		</div>
	</div>
</div>

<?php
