<?php
	if(!isset($_SESSION)){
		@session_start();
	}

	session_start();
	if($_SESSION["activo"] == 0) {
		header('Location: ../../index.php');
		return;
	}
	
	
	if( isset($_REQUEST['ht_codigo']) && isset($_REQUEST['ht_nombre_usuario']) ) {
		
		include("../../controller/users.php");
		$result = deleteUser($_REQUEST['ht_codigo'], $_REQUEST['ht_nombre_usuario']);
				
		if($result != null) { ?>
			<div class="box-body">
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					Usuario eliminado correctamente.
				</div>
			</div>
		<?php
		} else { ?>
			<div class="box-body">
				<div class="alert alert-warning alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					El usuario que intenta eliminar no existe.
				</div>
			</div>
		<?php
		}
	}	
?>