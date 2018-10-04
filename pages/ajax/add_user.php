<?php
	if(!isset($_SESSION)){
		@session_start();
	}

	if($_SESSION["activo"] == 0) {
		header('Location: ../../index.php');
		return;
	}
	
	if( isset($_REQUEST['ht_nombre']) && isset($_REQUEST['ht_apellido']) 
		&& isset($_REQUEST['ht_telefono']) && isset($_REQUEST['ht_correo_electronico'])
		&& isset($_REQUEST['ht_perfil']) && isset($_REQUEST['ht_nombre_usuario']) 
		&& isset($_REQUEST['ht_contrasenia_1']) && isset($_REQUEST['ht_contrasenia_2']) && isset($_REQUEST['ht_estado']) ) {
		
		if($_REQUEST['ht_contrasenia_1'] != $_REQUEST['ht_contrasenia_2']) { ?>
			
			<div class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				Las contraseñas ingresadas deben ser iguales.
			</div>
		<?php	
			return;
		} else {
			include_once("../../controller/users.php");
			$result = addUser($_REQUEST['ht_nombre'], $_REQUEST['ht_apellido'], $_REQUEST['ht_correo_electronico'], 
				$_REQUEST['ht_telefono'], $_REQUEST['ht_perfil'], $_REQUEST['ht_nombre_usuario'], 
				$_REQUEST['ht_contrasenia_1'], $_REQUEST['ht_estado']);
				
			if($result != null) { ?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					Usuario guardado correctamente.
				</div>
			<?php
			} else { ?>
				<div class="alert alert-warning alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					El usuario que intenta agregar ya existe.
				</div>
			<?php
			}
	
		}
	}	
?>