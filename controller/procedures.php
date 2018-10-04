<?php
	
	function getProcedure($id = null) {
		include("db_config.php");
		
		$datas = $db->select("viga_tramites",
			[
				"version",
				"categoria",
				"nombre",
				"descripcion",
				"requisitos",
				"en_linea",
				"en_etapas",
				"valor",
				"lugar",
				"contacto",
				"info_complementaria",
			],
			[
				"visible" => "1",
				"id" => $id
			]
		);
	
		return $datas;
	}
	
	function addProcedure($version = null, $nombre = null, $categoria = null, $descripcion = null,
		$requisitos = null, $en_linea = null, $en_etapas = null, $valor = null, $lugar = null, 
		$contacto = null, $info_complementaria = null, $autor = null) {
		include("db_config.php");
		
		$datas = $db->select("viga_tramites",["nombre"],["id" => $id]);
		if(sizeof($datas) > 0) return null;
		
		$db->insert("viga_tramites",
			[
				"version" => $version,
				"categoria" => $categoria,
				"nombre" => $nombre,
				"descripcion" => $descripcion,
				"requisitos" => $requisitos,
				"en_linea" => $en_linea,
				"en_etapas" => $en_etapas,
				"valor" => $valor,
				"lugar" => $lugar,
				"contacto" => $contacto,
				"info_complementaria" => $info_complementaria,
				"autor" => $autor
			]
		);
		
		$id = $db->id();
		$datas = $db->select("viga_tramites",["nombre"],["id" => $id]);
		if(sizeof($datas) == 1) {
			//include_once("logs.php");
			//logProducts($db, $id, $nombre, $descripcion, $stock, $precio, $autor, "1","add");
			return $datas;
		}return null;
	}
	
	function editProcedure($id = null, $nombre = null, $descripcion = null, $unidad = null, $autor = null) {
		include("db_config.php");
		
		$db->update("viga_tramites",
			[
				"nombre" => $nombre,
				"descripcion" => $descripcion,
				"unidad" => $unidad
			],
			[
				"id" => $id
			]
		);
		
		$datas = $db->select("viga_tramites", "*", ["id" => $id]);
		
		$verificator = 0;
		if($datas[0]["nombre"] == $nombre) $verificator++;
		if($datas[0]["descripcion"] == $descripcion) $verificator++;
		if($datas[0]["unidad"] == $unidad) $verificator++;
		
		if($verificator == 3) {
			include_once("logs.php");
			logProducts($db, $id, $nombre, $descripcion, $stock, $precio, $autor, "1","edit");
			return $datas;
		}return null;
	}
	
	function deleteProcedure($id = null, $nombre_usuario = null) {
		include("db_config.php");
		
		$db->update("viga_tramites",
			[
				"visible" => "-1",
			],
			[
				"id" => $id
			]
		);
		
		$datas = $db->select("viga_tramites", "*", ["id" => $id]);
		
		$verificator = 0;
		if($datas[0]["visible"] == "-1") $verificator++;
		if($verificator == 1) return $datas;
		return null;
	}
	
	function getVisibleProcedures() {
		include("db_config.php");
		
		$datas = $db->select("viga_tramites",
			[
				"id",
				"nombre",
				"descripcion",
				"categoria",
				"en_linea"
			],
			[
				"visible" => "1"
			]
		);
		
		return $datas;
	}
	
	function findProcedures($text = null, $category = null) {
		include("db_config.php");
		
		$conditions = [
				"visible" => "1",
				"ORDER" => [
					"fecha_creacion" => "DESC",
				],
				"LIMIT" => 15
			];
		if($text != "") {
			$extra = [
				"OR" => [
					"nombre[~]" => $text,
					"descripcion[~]" => $text
				]
			];
			$conditions = array_merge($conditions, $extra);
		}
		if($category != "") {
			$extra = [
				"categoria" => $category
			];
			$conditions = array_merge($conditions, $extra);
		}
		
		$datas = $db->select("viga_tramites",
			[
				"id",
				"categoria",
				"nombre",
				"descripcion",
			],
				$conditions
		);
	
		//echo "query: " . $db->last() . "<br><br>";
	
		return $datas;
	}
?>