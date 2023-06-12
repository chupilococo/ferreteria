<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $from = (isset($_GET['from'])) ? $_GET['from'] : date('Y-m-d', strtotime('-7 days'));
    $to = (isset($_GET['to'])) ? $_GET['to'] : date('Y-m-d');

?>
    <div class='container'>
        <div class="row">
            <div class="col-md-12">
                <?php
                $prducto_consulta = "SELECT * FROM stock where id=$id";
                $rsProducto = mysqli_query($cnx, $prducto_consulta);
                if (mysqli_num_rows($rsProducto)) {
                ?>
                    <h2><?= mysqli_fetch_assoc($rsProducto)['nombre'] ?></h2>
                    <form class='' action="" method='GET'>
                        <input type="hidden" name='c' value='stock_ventas'>
                        <input type="hidden" name='id' value=<?= $id ?>>
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="from">Desde</label>
                                <input type="date" class='form-control' name="from" id="from" value=<?= $from ?> />
                            </div>
                            <div class="col-xs-6">
                                <label for="to">Hasta</label>
                                <input type="date" class='form-control' name="to" id="to" value=<?= $to ?> />
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="submit" class="form-control btn-primary" value="Buscar">
                            </div>
                        </div>
                    </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php
                    $ventas_consulta = "SELECT s.nombre item,f.nombre factura,rsc.cantidad cantidad,f.fecha fecha
                FROM stock s
                JOIN rel_stock_clientes rsc 
                    ON rsc.stock_id = s.id
                JOIN facturas f 
                    ON rsc.facturas_id = f.id
                where
                    s.id = $id
                    AND f.fecha BETWEEN  '$from' and '$to'
                    order by f.fecha";
                    $rsVentas = mysqli_query($cnx, $ventas_consulta);
                    if (mysqli_num_rows($rsVentas)) {
                        $cantidadVentas = 0;
                ?>
                    <br>
                    <h2>Resumen</h2>

                    <table class='table text-center'>
                        <tr>
                            <th style="text-align: center;">Fecha</th>
                            <th style="text-align: center;">Factura</th>
                            <th style="text-align: center;">Cantidad</th>
                        </tr>
                        <?php
                        while ($fila = mysqli_fetch_assoc($rsVentas)) {
                        ?>
                            <tr>
                                <td><?= $fila['fecha'] ?></td>
                                <td><?= $fila['factura'] ?></td>
                                <td><?= $fila['cantidad'] ?></td>
                            </tr>
                        <?php
                            $cantidadVentas += $fila['cantidad'];
                        }
                        ?>
                        <tr style="font-size:2rem; font-weight: bold;">
                            <td></td>
                            <td style="text-align: end;">Cantidad de ventas:</td>
                            <td><?= $cantidadVentas ?></td>
                        </tr>
                    </table>
                <?php
                    } else {
                ?>
                    <h2>No se registran ventas para este producto</h2>
                <?php
                    }
                } else {
                ?>
                <h2>Id de producto incorrecto</h2>
            <?php
                }
            } else {
            ?>
            <h2>No se selecciono un producto</h2>
        <?php
            };
        ?>
            </div>
        </div>
    </div>
    </div>