 <h2 class="text-center"> <a href="./"> no estas logueado </a></h2>
<div class='container'>
<div class='row pull-right'>
	<div>
		<form class="form-inline" action="modulos/acciones/login.php" method='POST'>
		<div class='form-group'>
			<input class="form-control" autocomplete="off" name='nombre' type="text" />
			<input class="form-control" autocomplete="off" name='password' type="password" />
			<input type="hidden" name='url-prev' value="<?php echo $url?>" />
			<input class="form-control btn" value='>>' type="submit" />
		</div>
		</form>
	</div>
</div>
</div>