<?php

// Consulta de clientes
$consultaClientes = "SELECT id, nombre FROM clientes";
$query_clientes = mysqli_query($cnx, $consultaClientes);

// Filtro predeterminado
$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : 'todo';
$cliente = isset($_GET['cliente']) ? $_GET['cliente'] : '';
$fechaInicio = isset($_GET['fecha_inicio']) ? $_GET['fecha_inicio'] : '';
$fechaFin = isset($_GET['fecha_fin']) ? $_GET['fecha_fin'] : '';


// Construir consulta dinámica según filtro
$consulta = "
    SELECT
      Fac.id,
      Fac.tipo_de_factura_id,
      Fac.nombre,
      Fac.fecha,
      Fac.estado,
      Fac.pago,
      SUM(rsc.precioParcial * rsc.cantidad) AS bruto_factura,
      SUM(rsc.precioProveedor * rsc.cantidad) AS gasto_factura,
      SUM(rsc.precioParcial * rsc.cantidad) - SUM(rsc.precioProveedor * rsc.cantidad) AS neto_factura,
      tipo.tipo
    FROM
      facturas AS Fac
    INNER JOIN rel_stock_clientes rsc ON
      rsc.facturas_id = Fac.id
    LEFT JOIN tipo_de_factura AS tipo ON
      Fac.tipo_de_factura_id = tipo.id
";

// Añadir condiciones de filtro
$conditions = [];
if ($filtro == 'impagas') {
  $conditions[] = "Fac.pago = 0";
} elseif ($filtro == 'pagas') {
  $conditions[] = "Fac.pago = 1";
}
if ($cliente) {
  $conditions[] = "rsc.clientes_id = '$cliente'";
}
if ($fechaInicio) {
  $conditions[] = "Fac.fecha >= '$fechaInicio'";  // Filtrar por fecha de inicio
}
if ($fechaFin) {
  $conditions[] = "Fac.fecha <= '$fechaFin'";  // Filtrar por fecha de fin
}

if (count($conditions) > 0) {
  $consulta .= " WHERE " . implode(' AND ', $conditions);
}

$consulta .= " 
              GROUP BY Fac.id 
              ORDER BY
                  Fac.estado,
                  Fac.fecha DESC
";

$totalBruto = 0;
$totalGasto = 0;
$totalNeto = 0;
// var_dump($consulta);
// die();

$query = mysqli_query($cnx, $consulta);
?>

<!-- Formulario de filtro -->
<div class='container'>
  <div class="row">
    <div class="col-md-12">
      <form class="form" action="" method="get">
        <input type="hidden" name="c" id="inputc" class="form-control" value="facturacion">
        <div class="col-xs-3">
          <label>Estado
            <select class="form-control" name="filtro" id="filtro">
              <?php
              $options = ['todo', 'impagas', 'pagas'];
              foreach ($options as $option) {
                echo '<option value="' . $option . '" ' . ($filtro == $option ? 'selected' : '') . '>' . ucfirst($option) . '</option>';
              }
              ?>
            </select>
          </label>
        </div>
        <div class="col-xs-3">
          <label>Cliente
            <select class="form-control" name="cliente" id="cliente">
              <option value="" selected="selected">Todos</option>
              <?php while ($cliente = mysqli_fetch_assoc($query_clientes)) { ?>
                <option value="<?= $cliente['id'] ?>" <?= ($cliente['id'] == $cliente ? 'selected' : '') ?>>
                  <?= $cliente['nombre'] ?>
                </option>
              <?php } ?>
            </select>
          </label>
        </div>
        <div class="col-xs-3">
          <label>Fecha Inicio
            <input type="date" class="form-control" name="fecha_inicio" value="<?= $fechaInicio ?>">
          </label>
        </div>
        <div class="col-xs-3">
          <label>Fecha Fin
            <input type="date" class="form-control" name="fecha_fin" value="<?= $fechaFin ?>">
          </label>
        </div>
        <div class="col-xs-6">
          <input type="submit" class="form-control btn-primary" value="Filtrar">
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Tabla de Facturas -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="stockTable">
        <table class='table derecha table-striped text-right'>
          <thead>
            <tr>
              <th>Tipo</th>
              <th>Nombre</th>
              <th>Fecha</th>
              <!-- <th>Bruto</th> -->
              <!-- <th>Gasto</th> -->
              <th>Neto</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($fila = mysqli_fetch_assoc($query)) {
              $totalBruto += $fila['bruto_factura'];
              $totalGasto += $fila['gasto_factura'];
              $totalNeto += $fila['neto_factura'];
              ?>
              <tr class="<?= ($fila['pago'] == 0) ? 'danger' : '' ?>">
                <td><?= htmlspecialchars($fila['tipo']) ?></td>
                <td><?= htmlspecialchars($fila['nombre']) ?></td>
                <td><?= htmlspecialchars($fila['fecha']) ?></td>
                <!-- <td><?= htmlspecialchars($fila['bruto_factura']) ?></td> -->
                <!-- <td><?= htmlspecialchars($fila['gasto_factura']) ?></td> -->
                <td><?= htmlspecialchars($fila['neto_factura']) ?></td>
                <td><?= $fila['estado'] == 0 ? 'Abierta' : 'Cerrada' ?></td>
                <td>
                  <?php if ($fila['pago'] == 0) { ?>
                    <button data-toggle="modal" data-target="#modal" onclick='facTogglePago(<?= $fila["id"] ?>)'
                      class="btn btn-primary">Marcar Paga</button>
                  <?php } ?>
                  <button data-toggle="modal" data-target="#modal" onclick='facDetalle(<?= $fila["id"] ?>)'
                    class="btn btn-primary">Detalles</button>
                  <button data-toggle="modal" data-target="#modal" onclick='facAbrir(<?= $fila["id"] ?>)'
                    class="btn btn-success <?= ($fila['estado'] == 1) ? '' : 'hidden' ?>">Abrir</button>
                  <button data-toggle="modal" data-target="#modal" onclick='facEditar(<?= $fila["id"] ?>)'
                    class="btn btn-success <?= ($fila['estado'] == 0) ? '' : 'hidden' ?>">Editar</button>
                  <button data-toggle="modal" data-target="#modal" onclick='facBorrar(<?= $fila["id"] ?>)'
                    class="btn btn-danger <?= ($fila['estado'] == 0) ? '' : 'hidden' ?>">Borrar</button>
                  <button data-toggle="modal" data-target="#modal" onclick='facCerrar(<?= $fila["id"] ?>)'
                    class="btn btn-warning <?= ($fila['estado'] == 0) ? '' : 'hidden' ?>">Cerrar</button>
                </td>
              </tr>
            <?php } ?>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td>Total Bruto: <?= $totalBruto ?></td>
              <td>Total Gastos: <?= $totalGasto ?></td>
              <td>Total Neto: <?= $totalNeto ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script src="js/facturas.js"></script>