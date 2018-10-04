<?php
	if(!isset($_SESSION)){
		@session_start();
	}

	if($_SESSION["activo"] == 0) {
		header('Location: ../../index.php');
		return;
	}
	
	if( isset($_REQUEST['vg_id_solicitud']) && isset($_REQUEST['vg_estado']) 
		&& isset($_REQUEST['vg_nombre_usuario']) ) {
		
		include_once("../../controller/requests.php");
		$result = editRequest(base64_decode($_REQUEST['vg_id_solicitud']), $_REQUEST['vg_estado'], $_REQUEST['vg_nombre_usuario']);
		
		if($result != null) { ?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				Solicitud guardada correctamente.
			</div>
		<?php
		} else { ?>
			<div class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				No pudimos actualizar la solicitud.
			</div>
		<?php
		}
	} else {
		echo "Falta info!";
	}
		
?>