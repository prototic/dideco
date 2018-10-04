<?php
	
	function getUser($username = null) {
		include("db_config.php");
		
		$datas = $db->select("viga_usuarios",
		[
			"viga_usuarios.nombre",
			"viga_usuarios.apellido",
			"viga_usuarios.correo_electronico",
			"viga_usuarios.telefono"
		],
		[
			"nombre_usuario" => $username
		]);
	
		return $datas;
	}
	
	function addUser($nombre = null, $apellido = null, $correo = null, $telefono = null,
		$perfil = null, $username = null, $contrasenia = null, $estado = null) {
		include_once("db_config.php");
		
		$datas = $db->select("viga_usuarios",["nombre_usuario"],["nombre_usuario" => $username]);
		if(sizeof($datas) > 0) return null;
		
		$db->insert("viga_usuarios",
			[
				"nombre_usuario" => $username,
				"nombre" => $nombre,
				"apellido" => $apellido,
				"correo_electronico" => $correo,
				"telefono" => $telefono,
				"contrasenia" => hash("sha256", $contrasenia),
				"id_perfil" => $perfil,
				"estado" => $estado
			]
		);
		$datas = $db->select("viga_usuarios",["nombre_usuario"],["nombre_usuario" => $username]);
		if(sizeof($datas) == 1) return $datas;
		return null;
	}
	
	function editUser($nombre = null, $apellido = null, $correo = null, $telefono = null,
		$perfil = null, $username = null, $estado = null) {
		include_once("db_config.php");
		
		$db->update("viga_usuarios",
			[
				"nombre" => $nombre,
				"apellido" => $apellido,
				"correo_electronico" => $correo,
				"telefono" => $telefono,
				"id_perfil" => $perfil,
				"estado" => $estado
			],
			[
				"nombre_usuario" => $username
			]
		);
		
		$datas = $db->select("viga_usuarios", "*", ["nombre_usuario" => $username]);
		
		$verificator = 0;
		if($datas[0]["nombre"] == $nombre) $verificator++;
		if($datas[0]["apellido"] == $apellido) $verificator++;
		if($datas[0]["correo_electronico"] == $correo) $verificator++;
		if($datas[0]["telefono"] == $telefono) $verificator++;
		if($datas[0]["id_perfil"] == $perfil) $verificator++;
		
		if($verificator == 5) return $datas;
		return null;
	}
	
	function deleteUser($codigo = null, $nombre_usuario = null) {
		include("db_config.php");
		
		$db->update("viga_usuarios",
			[
				"visible" => "-1",
			],
			[
				"nombre_usuario" => $codigo
			]
		);
		
		$datas = $db->select("viga_usuarios", "*", ["nombre_usuario" => $codigo]);
		
		$verificator = 0;
		if($datas[0]["visible"] == "-1") $verificator++;
		if($verificator == 1) return $datas;
		return null;
	}
	
	function changePassword($username = null, $contrasenia = null) {
		include_once("db_config.php");
		
		$db->update("viga_usuarios",
			[
				"contrasenia" => hash("sha256", $contrasenia)
			],
			[
				"nombre_usuario" => $username
			]
		);
		
		$datas = $db->select("viga_usuarios","*",["nombre_usuario" => $username]);
		$verificator = 0;
		if($datas[0]["contrasenia"] == hash("sha256", $contrasenia)) $verificator++;
		if($verificator == 1) return $datas;
		return null;
	}
	
	function getVisibleUsers() {
		include_once("db_config.php");
		
		$datas = $db->select("viga_usuarios",
		[
			"[><]viga_perfiles" => ["id_perfil" => "id_perfil"]
		],
		[
			"viga_usuarios.nombre",
			"viga_usuarios.nombre_usuario",
			"viga_usuarios.apellido",
			"viga_usuarios.correo_electronico",
			"viga_usuarios.telefono",
			"viga_usuarios.estado",
			"viga_perfiles.id_perfil(id_perfil)",
			"viga_perfiles.nombre(perfil)"
		],
		[
			"visible" => "1"
		]);
	
		return $datas;
	}
	
	function validateUser($username = null, $contrasenia = null) {
		include("db_config.php");
		
		$datas = $db->select("viga_usuarios", 
		[
			"[><]viga_perfiles" => ["id_perfil" => "id_perfil"]
		],
		[
			"viga_usuarios.nombre_usuario",
			"viga_usuarios.nombre",
			"viga_usuarios.apellido",
			"viga_usuarios.correo_electronico",
			"viga_usuarios.telefono",
			"viga_perfiles.nombre(perfil)",
			"viga_perfiles.permiso_usuarios(permiso_usuarios)",
			"viga_perfiles.permiso_categorias(permiso_categorias)",
			"viga_perfiles.permiso_tramites(permiso_tramites)",
			"viga_perfiles.permiso_beneficiarios(permiso_beneficiarios)",
			"viga_perfiles.permiso_tableros(permiso_tableros)",
		], [
			"nombre_usuario" => $username,
			"contrasenia" => hash("sha256", $contrasenia),
			"estado" => "1"
		]);
	
		return $datas;
	}
	
	
	
	
?>