<?php
	
	function getConsideratedProfiles() {
		include_once("db_config.php");
		
		$datas = $db->select("viga_perfiles",
			[
				"id_perfil",
				"nombre"
			], [
				"id_perfil[<]" => 100
			]);
	
		return $datas;
	}
	
?>