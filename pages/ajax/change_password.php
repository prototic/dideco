<?php
	if(!isset($_SESSION)){
		@session_start();
	}

	if($_SESSION["activo"] == 0) {
		header('Location: ../../index.php');
		return;
	}
	
	if( isset($_REQUEST['ht_nombre_usuario']) && isset($_REQUEST['ht_contrasenia_1']) 
		&& isset($_REQUEST['ht_contrasenia_2']) ) {
		
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
			$result = changePassword($_REQUEST['ht_nombre_usuario'], $_REQUEST['ht_contrasenia_1']);
				
			if($result != null) { ?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					Contraseña cambiada correctamente.
				</div>
			<?php
			} else { ?>
				<div class="alert alert-warning alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					No pudimos cambiar la contraseña.
				</div>
			<?php
			}
	
		}
	}	
?>