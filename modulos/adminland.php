<?php
if (isset($_SESSION['tipo']) && $_SESSION['tipo'] != 1) {
    header('location:./');
}
$usuarios_qry = "select * from usuario;";
$usuarios = mysqli_query($cnx, $usuarios_qry);
?>
<pre>

</pre>
<div class=container>
    <div class="usuarios" id="usuarios">
        <div class="row">
            <h3>usuarios</h3>
            <a data-toggle="modal" data-target="#modal" href="#" id="new_user_btn" class='btn btn-primary'>nuevo usuario</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>usuario</th>
                    <th>es admin</th>
                    <th>permisos</th>
                    <th>acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($usuario = mysqli_fetch_assoc($usuarios)) {
                ?>
                    <tr>
                        <td><?=$usuario['nombre']?></td>
                        <td><?=($usuario['tipo'])?'Si':'No'?></td>
                        <td><?=ucwords(str_replace(',',' ',$usuario['permisos']))?></td>
                        <td>
                            <a data-toggle="modal" data-target="#modal" href="#" onclick='usuarioDel(<?php echo $usuario['id']?>)' class='btn btn-danger'>borrar</a>
                            <a data-toggle="modal" data-target="#modal" href="#" onclick='usuarioEditar(<?php echo $usuario['id']?>)' class='btn btn-warning'>editar</a>
                        </td>
                    </tr>
                <?php
                };
                ?>
            </tbody>
        </table>
    </div>
</div>




<script src="js/adminland.js"></script>