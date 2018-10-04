<?php
	
	function addBeneficiary($rut = null, $nombre = null, $correo_electronico = null, $telefono = null, 
		$genero = null, $edad = null) {
		include("db_config.php");
		
		$datas = $db->select("viga_beneficiarios",["nombre"],["rut" => $rut]);
		if(sizeof($datas) > 0) return null;
		
		$db->insert("viga_beneficiarios",
			[
				"rut" => $rut,
				"nombre" => $nombre,
				"correo_electronico" => $correo_electronico,
				"telefono" => $telefono,
				"genero" => $genero,
				"edad" => $edad
			]
		);
		
		//echo "query: " . $db->last();
		//$id = $db->id();
		$datas = $db->select("viga_beneficiarios",["nombre"],["rut" => $rut]);
		if(sizeof($datas) == 1) return $datas;
		return null;
	}
	
	function editBeneficiary($rut = null, $nombre = null, $correo_electronico = null, $telefono = null, 
		$genero = null, $edad = null) {
		include("db_config.php");
		
		$db->update("viga_beneficiarios",
			[
				"nombre" => $nombre,
				"correo_electronico" => $correo_electronico,
				"telefono" => $telefono,
				"genero" => $genero,
				"edad" => $edad
			],
			[
				"rut" => $rut
			]
		);
		
		$datas = $db->select("viga_beneficiarios", "*", ["rut" => $rut]);
		
		$verificator = 0;
		if($datas[0]["nombre"] == $nombre) $verificator++;
		if($datas[0]["correo_electronico"] == $correo_electronico) $verificator++;
		if($datas[0]["telefono"] == $telefono) $verificator++;
		if($datas[0]["genero"] == $genero) $verificator++;
		if($datas[0]["edad"] == $edad) $verificator++;
		if($verificator == 5) return $datas;
		return null;
	}
	
	function deleteBeneficiary($rut = null, $autor = null) {
		include("db_config.php");
		
		$db->update("viga_beneficiarios",
			[
				"visible" => "-1",
			],
			[
				"rut" => $rut
			]
		);
		
		$datas = $db->select("viga_beneficiarios", "*", ["rut" => $rut]);
		
		$verificator = 0;
		if($datas[0]["visible"] == "-1") $verificator++;
		if($verificator == 1) return $datas;
		return null;
	}
	
	function getBeneficiary($rut = null) {
		include("db_config.php");
		
		$datas = $db->select("viga_beneficiarios",
			[
				"rut",
				"nombre",
				"correo_electronico",
				"telefono",
				"genero",
				"edad",
				"fecha_creacion"
			],
			[
				"rut" => $rut,
				"visible" => "1"
			]
		);
	
		return $datas;
	}
	
	function getVisibleBeneficiaries() {
		include("db_config.php");
		
		$datas = $db->select("viga_beneficiarios",
			[
				"rut",
				"nombre",
				"correo_electronico",
				"telefono",
				"genero",
				"edad",
				"fecha_creacion"
			],
			[
				"visible" => "1"
			]
		);
	
		return $datas;
	}
	
?>