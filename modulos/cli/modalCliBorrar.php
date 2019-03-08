 <?php
	include('../../config/setup.php');	
	$provQuery="
			SELECT
				a.id,
				a.nombre
			FROM
				clientes a
			WHERE
				a.id = '$_GET[id]'
			LIMIT 1
	";
	$provConsulta=mysqli_query($cnx,$provQuery);
	$row=mysqli_fetch_assoc($provConsulta);
 ?> 
 <div class="modal-dialog alert">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Esta a punto de borrar el Cliente "<?php echo $row['nombre']?>"</h4>
      </div>
		<div class="modal-body">
			<p class='lead'>¿Esta seguro?</p>
		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <a href='modulos/cli/delete.php?id=<?php echo $row['id']?>' class="btn btn-success" >Borrar</a>
      </div>
    </div>
  </div>