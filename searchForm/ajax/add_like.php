<?php
	if(!isset($_SESSION)){
		@session_start();
	}

	session_start();
	if($_SESSION["activo"] == 0) {
		header('Location: ../../index.php');
		return;
	}
	
	
	if( isset($_REQUEST['vg_id_tramite']) && isset($_REQUEST['vg_nombre']) && isset($_REQUEST['vg_rut'])  
		&& isset($_REQUEST['vg_correo_electronico']) && isset($_REQUEST['vg_telefono'])
		&& isset($_REQUEST['vg_genero']) && isset($_REQUEST['vg_edad']) ) {
		
		include("../../controller/beneficiaries.php");
		$resultCheck = getBeneficiary($_REQUEST['vg_rut']);
		
		if($resultCheck == null) { // No se encuentra el rut ingresado
			$result = addBeneficiary($_REQUEST['vg_rut'], $_REQUEST['vg_nombre'], $_REQUEST['vg_correo_electronico'], 
				$_REQUEST['vg_telefono'], $_REQUEST['vg_genero'], $_REQUEST['vg_edad']);
			if($result != null) { 
				include("../../controller/requests.php");
				addRequest($_REQUEST['vg_rut'], base64_decode($_REQUEST['vg_id_tramite']));
				?>
				
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					Información guardada correctamente.
				</div>
			<?php
			} else { ?>
				<div class="alert alert-warning alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					No se pudo registrar tu información.
				</div>
			<?php
			}
		
		} else { // Se encuentra el rut ingresado
			$result = editBeneficiary($_REQUEST['vg_rut'], $_REQUEST['vg_nombre'], $_REQUEST['vg_correo_electronico'], $_REQUEST['vg_telefono'], 
				$_REQUEST['vg_genero'], $_REQUEST['vg_edad']);
			
			
			if($result != null) { 
				include("../../controller/requests.php");
				addRequest($_REQUEST['vg_rut'], base64_decode($_REQUEST['vg_id_tramite']));
				?>
				
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					Información actualizada correctamente.
				</div>
			<?php
			} else { ?>
				<div class="alert alert-warning alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					No se pudo actualizar tu información.
				</div>
			<?php
			}
		}
		
	} else {
		echo "Falta info!";
	}	
?>