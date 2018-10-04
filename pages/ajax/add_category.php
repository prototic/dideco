<?php
	if(!isset($_SESSION)){
		@session_start();
	}

	session_start();
	if($_SESSION["activo"] == 0) {
		header('Location: ../../index.php');
		return;
	}
	
	
	if( isset($_REQUEST['vg_nombre']) && isset($_REQUEST['vg_nombre_usuario']) ) {
		
		include("../../controller/categories.php");
		$result = addCategory($_REQUEST['vg_nombre'], $_REQUEST['vg_nombre_usuario']);
				
		if($result != null) { ?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				Categoria guardada correctamente.
			</div>
		<?php
		} else { ?>
			<div class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				El id de la categoria que intenta agregar ya existe.
			</div>
		<?php
		}
	}	
?>