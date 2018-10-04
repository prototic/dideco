<?php
	if(!isset($_SESSION)){
		@session_start();
	}

	session_start();
	if($_SESSION["activo"] == 0) {
		header('Location: ../../index.php');
		return;
	}
	
	
	if( isset($_REQUEST['vg_version']) && isset($_REQUEST['vg_nombre']) && isset($_REQUEST['vg_categoria']) 
		&& isset($_REQUEST['vg_descripcion']) && isset($_REQUEST['vg_requisitos']) 
		&& isset($_REQUEST['vg_en_linea']) && isset($_REQUEST['vg_en_etapas']) 
		&& isset($_REQUEST['vg_valor']) && isset($_REQUEST['vg_lugar'])
		&& isset($_REQUEST['vg_contacto']) && isset($_REQUEST['vg_info_complementaria']) 
		&& isset($_REQUEST['vg_nombre_usuario']) ) {
		
		include_once("../../controller/procedures.php");
		
		$result = addProcedure($_REQUEST['vg_version'], $_REQUEST['vg_nombre'], $_REQUEST['vg_categoria'], 
			$_REQUEST['vg_descripcion'], $_REQUEST['vg_requisitos'], $_REQUEST['vg_en_linea'], 
			$_REQUEST['vg_en_etapas'], $_REQUEST['vg_valor'], $_REQUEST['vg_lugar'], 
			$_REQUEST['vg_contacto'], $_REQUEST['vg_info_complementaria'], $_REQUEST['vg_nombre_usuario']);
			
		if($result != null) { ?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				Trámite guardado correctamente.
			</div>
		<?php
		} else { ?>
			<div class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				El trámite que intenta agregar ya existe.
			</div>
		<?php
		}
	} else {
		echo "Falta info!";
	}
?>