<?php
	
	function addRequest($rut = null, $tramite = null) {
		include("db_config.php");
		
		$db->insert("viga_solicitudes",
			[
				"rut_beneficiario" => $rut,
				"id_tramite" => $tramite
			]
		);
		
		//echo "query: " . $db->last();
		$id = $db->id();
		$datas = $db->select("viga_solicitudes",["id"],["id" => $id]);
		if(sizeof($datas) == 1) return $datas;
		return null;
	}
	
	function editRequest($id = null, $estado = null, $autor = null) {
		include("db_config.php");
		
		$db->update("viga_solicitudes",
			[
				"estado" => $estado
			],
			[
				"id" => $id
			]
		);
		
		$datas = $db->select("viga_solicitudes", "*", ["id" => $id]);
		
		$verificator = 0;
		if($datas[0]["estado"] == $estado) $verificator++;
		if($verificator == 1) return $datas;
		return null;
	}
	
	function deleteRequest($id = null, $autor = null) {
		include("db_config.php");
		
		$db->update("viga_solicitudes",
			[
				"visible" => "-1",
			],
			[
				"id" => $id
			]
		);
		
		$datas = $db->select("viga_solicitudes", "*", ["id" => $id]);
		
		$verificator = 0;
		if($datas[0]["visible"] == "-1") $verificator++;
		if($verificator == 1) return $datas;
		return null;
	}
	
	function getVisibleRequests() {
		include("db_config.php");
		
		$datas = $db->select("viga_solicitudes",
			[
				"[><]viga_beneficiarios" => ["rut_beneficiario" => "rut"],
				"[><]viga_tramites" => ["viga_solicitudes.id_tramite" => "id"]
			],
			[
				"viga_solicitudes.id(id)",
				"viga_beneficiarios.rut(rut)",
				"viga_beneficiarios.nombre(nombre_beneficiario)",
				"viga_tramites.id(id_tramite)",
				"viga_tramites.nombre(nombre_tramite)",
				"viga_solicitudes.estado(estado)",
				"viga_solicitudes.fecha_creacion(fecha_creacion)"
			],
			[
				"viga_solicitudes.visible" => "1"
			]
		);
		
		return $datas;
	}
	
?>