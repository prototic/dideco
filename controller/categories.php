<?php
	
	function getCategoryByName($nombre = null) {
		include("db_config.php");
		
		$datas = $db->select("viga_categorias",
			[
				"id",
				"nombre",
				"autor"
			],
			[
				"nombre" => $nombre
			]
		);
		
		return $datas;
	}
	
	function addCategory($nombre = null, $autor = null) {
		include("db_config.php");
		
		$datas = $db->select("viga_categorias",["nombre"],["id" => $id]);
		if(sizeof($datas) > 0) return null;
		
		$db->insert("viga_categorias",
			[
				"nombre" => $nombre,
				"autor" => $autor
			]
		);
		$id = $db->id();
		$datas = $db->select("viga_categorias",["nombre"],["id" => $id]);
		if(sizeof($datas) == 1) return $datas;
		return null;
	}
	
	function editCategory($id = null, $nombre = null, $autor = null) {
		include("db_config.php");
		
		$db->update("viga_categorias",
			[
				"nombre" => $nombre
			],
			[
				"id" => $id
			]
		);
		
		$datas = $db->select("viga_categorias", "*", ["id" => $id]);
		
		$verificator = 0;
		if($datas[0]["nombre"] == $nombre) $verificator++;
		if($verificator == 1) return $datas;
		return null;
	}
	
	function deleteCategory($id = null, $autor = null) {
		include("db_config.php");
		
		$db->update("viga_categorias",
			[
				"visible" => "-1",
			],
			[
				"id" => $id
			]
		);
		
		$datas = $db->select("viga_categorias", "*", ["id" => $id]);
		
		$verificator = 0;
		if($datas[0]["visible"] == "-1") $verificator++;
		if($verificator == 1) return $datas;
		return null;
	}
	
	function getVisibleCategories() {
		include("db_config.php");
		
		$datas = $db->select("viga_categorias",
			[
				"id",
				"nombre",
				"autor",
				"fecha_creacion"
			],
			[
				"visible" => "1"
			]
		);
	
		return $datas;
	}
	
?>