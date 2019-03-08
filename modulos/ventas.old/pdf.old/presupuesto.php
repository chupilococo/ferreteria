<?php
//var_dump($_POST);
include('../../../config/setup.php');
$venta=$_POST;

$content = "
<style type='text/css'>
	img{margin:0 0 0 80px;}
	.center{ text-align: center}
	.lead{ font-size:120%; }
	.bold{font-weight: bold}
	.derecha{text-align:right;}
</style>
<page>
	<img src='logo.jpg' alt='Logo' width=600 />
    <p class='center lead bold'>Servicio Integral de cerrajería y Sistemas de accesos Electrónicos</p>
    <p class='center lead bold'>Mendoza 5017 CABA, Tel 4523-3957</p>
   	<table cellspacing='50' cellpadding='111' border='0'>
	<tr><th>Producto</th><th style='width: 20%;'>Cantidad</th><th style='width: 20%;'>Precio</th><th style='width: 20%;'>Precio Parcial</th></tr>
	";
$total=0;
foreach ($venta as $indice => $valor){
		if($indice!='tipoVenta'&&$indice!='factura'&&$indice!='fechaVenta'&&$indice!='ClienteId'){
			//echo "{$indice} => {$valor} <hr />";
			$producto=json_decode($valor,true);
			//var_dump($producto);
			$content.="
				<tr>
					<td>$producto[CargaNombre]</td>
					<td>$producto[CargaCantidad]</td>
					<td>$producto[CargaPrecio]</td>
					<td>$producto[CargaTotal]</td>
				</tr>";
			$total+=$producto['CargaTotal'];
		};
	};
$content.="
	<tr class='lead bold'><th></th><th style='width: 20%;'></th><th style='width: 20%;'>TOTAL:</th><th style='width: 20%;'>$total</th></tr>
	</table>
	<page_footer>
		<p class='derecha'> fecha:".$venta['fechaVenta']." \t pagina: [[page_cu]]/[[page_nb]]</p>
	</page_footer>
	</page>";

    require_once('../../../html2pdf/vendor/autoload.php');
    require_once('../../../html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','es');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output(dirname(__FILE__).'/presupuesto.pdf','F');
?>
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Presupuesto</h4>
      </div>
		<div class="modal-body">
			<object class='objectModal' data="modulos/ventas/pdf/presupuesto.pdf" width="500" height="375" type="application/pdf"></object>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
		</div>
	</div>
</div>