<?php
	if(!isset($_SESSION)){
		@session_start();
	}

	if(isset($_POST['ht_nombre_usuario']) && isset($_POST['ht_contrasenia'])) {
	
		$nombre_usuario = $_POST['ht_nombre_usuario'];
		$contrasenia = $_POST['ht_contrasenia'];
		
		//echo "<br>usuario: " . $nombre_usuario;
		//echo "<br>pass: " . $contrasenia;
		
		if(empty($nombre_usuario) || empty($contrasenia)) {
			$_SESSION["tieneError"] = "1";
			$_SESSION["mensaje"] = "Información insuficiente.";
			$_SESSION["activo"] = 0;
			
			echo "<br>".$_SESSION["mensaje"];
			//header('Location: ../index.php');
			return;
		}
		
		include_once("../controller/users.php");
		
		$datas = validateUser($nombre_usuario, $contrasenia);
		//echo sizeof($datas);
		
		if(sizeof($datas) == 0 || sizeof($datas) > 1) {
    		$_SESSION["tieneError"] = "1";
			$_SESSION["mensaje"] = "Credenciales incorrectas.";
			$_SESSION["activo"] = 0;
			
			//echo "<br>".$_SESSION["mensaje"];
			header('Location: ../index.php');
    	} else {
    		if(sizeof($datas) == 1) {
    			$_SESSION["tieneError"] = "0";
				$_SESSION["mensaje"] = "Sesión iniciada correctamente.";
				$_SESSION["activo"] = 1;
    			
    			$_SESSION["nombre_usuario"] = $datas[0]["nombre_usuario"];
    			$_SESSION["nombre"] = $datas[0]["nombre"];
				$_SESSION["apellido"] = $datas[0]["apellido"];
				$_SESSION["perfil"] = $datas[0]["perfil"];
			
				$_SESSION["permiso_usuarios"] = $datas[0]["permiso_usuarios"];
				$_SESSION["permiso_categorias"] = $datas[0]["permiso_categorias"];
				$_SESSION["permiso_tramites"] = $datas[0]["permiso_tramites"];
				$_SESSION["permiso_beneficiarios"] = $datas[0]["permiso_beneficiarios"];
				$_SESSION["permiso_tableros"] = $datas[0]["permiso_tableros"];
			
				//echo "<br>".$_SESSION["mensaje"];
				header('Location: ../index.php');
    		}
    	}
			
	}
	
?>