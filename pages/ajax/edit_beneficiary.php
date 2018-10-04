<?php
	if(!isset($_SESSION)){
		@session_start();
	}

	if($_SESSION["activo"] == 0) {
		header('Location: ../../index.php');
		return;
	}
	
	if( isset($_REQUEST['ht_codigo']) && isset($_REQUEST['ht_nombre']) && isset($_REQUEST['ht_descripcion']) 
		&& isset($_REQUEST['ht_unidad']) && isset($_REQUEST['ht_nombre_usuario']) ) {
		
		include_once("../../controller/products.php");
		$result = editProduct($_REQUEST['ht_codigo'], $_REQUEST['ht_nombre'], $_REQUEST['ht_descripcion'], 
			$_REQUEST['ht_unidad'], $_REQUEST['ht_nombre_usuario']);
				
		if($result != null) { ?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				Producto guardado correctamente.
			</div>
		<?php
		} else { ?>
			<div class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				No pudimos actualizar la información.
			</div>
		<?php
		}
	}
		
?>