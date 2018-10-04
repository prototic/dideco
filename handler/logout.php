<?php
	@session_start();
	
	unset($_SESSION["tieneError"]);
	unset($_SESSION["mensaje"]);
	$_SESSION["activo"] = 0;
    			
    unset($_SESSION["nombre_usuario"]);
	unset($_SESSION["nombre"]);
	unset($_SESSION["apellido"]);
	unset($_SESSION["perfil"]);
			
	unset($_SESSION["permiso_usuarios"]);
	unset($_SESSION["permiso_categorias"]);
	unset($_SESSION["permiso_tramites"]);
	unset($_SESSION["permiso_beneficiarios"]);
	unset($_SESSION["permiso_tableros"]);
	
	header('Location: ../index.php');
?>