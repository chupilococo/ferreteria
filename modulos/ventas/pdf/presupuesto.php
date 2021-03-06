<?php
//var_dump($_POST);
include('../../../config/setup.php');
$venta=$_POST;
var_dump($venta);
$content = "
<style type='text/css'>
	img{margin:0 0 0 80px;}
	.center{ text-align: center}
	.lead{ font-size:120%; }
	.bold{font-weight: bold}
	th{background-color:#aaaaaa;}
	td{border-bottom:1px solid black;}
	.derecha{text-align:right;}
</style>
<page>
	<img src='logo.jpg' alt='Logo' width=600 />
    <p class='center lead bold'>Servicio Integral de cerrajería y Sistemas de accesos Electrónicos</p><p class='center lead bold'>".getDirecc($venta['direcc'])."</p>
   	<table border='0'>
	<tr><th>Producto</th><th style='width: 20%;'>Descripcion</th><th style='width: 20%;'>Cantidad</th><th style='width: 20%;'>Precio</th><th style='width: 20%;'>Precio Parcial</th></tr>
	";
$total=0;
foreach ($venta as $indice => $valor){
		if($indice!='tipoVenta'&&$indice!='factura'&&$indice!='fechaVenta'&&$indice!='ClienteId'){
			//echo "{$indice} => {$val$content$contentor} <hr />";
			$producto=json_decode($valor,true);
			//var_dump($producto);
			$content.="
				<tr>
					<td style='width: 140px;'>$producto[CargaNombre]</td>
					<td style='width: 350px;'>$producto[CargaDesc]</td>
					<td style='width: 70px;'>$producto[CargaCantidad]</td>
					<td style='width: 70px;'>$producto[CargaPrecio]</td>
					<td style='width: 70px;'>$producto[CargaTotal]</td>
				</tr>";
			$total+=$producto['CargaTotal'];
		};
	};
$content.="
	<tr class='lead bold'><td></td><td style='width: 140px;'></td><td style='width: 140px;'>TOTAL:</td><td style='width: 140px;'>$total</td></tr>
	</table>
	<page_footer>
		<p class='derecha'> fecha:".$venta['fechaVenta']." \t pagina: [[page_cu]]/[[page_nb]]</p>
	</page_footer>
	</page>";

    require_once 'html2pdf/vendor/autoload.php';
    use Spipu\Html2Pdf\Html2Pdf;

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
			<!--?php echo $content;?-->
			<hr />
			<object class='objectModal' data="modulos/ventas/pdf/presupuesto.pdf" width="500" height="375" type="application/pdf"></object>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
		</div>
	</div>
</div>

<?php

function getDirecc($num){
    switch ($num){

        case "1":
            return "Mendoza 5017 CABA, Tel 4523-3957";
            break;
        case "2":
            return "Estrada 324, Trenque Lauquen - Tel: 495412";
            break;
        case "3":
            return "Echeverria 5099, CABA- Tel: 45219377";
            break;
    }
};

