<?php
	
	function logProducts($db = null, $codigo = null, $nombre = null, $descripcion = null, $stock = null, 
		$precio = null, $autor = null, $visible = null, $tipo = null) {
		
		$db->insert("hidro_log_productos",
			[
				"codigo" => $codigo,
				"nombre" => $nombre,
				"descripcion" => $descripcion,
				"stock" => $stock,
				"precio" => $precio,
				"autor" => $autor,
				"visible" => $visible,
				"tipo" => $tipo
			]
		);
	}
	
?>