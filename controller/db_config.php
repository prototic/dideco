<?php
	require_once("Medoo.php");
	
	use Medoo\Medoo;
	
	if(!isset($db)) {
	
		$db = new Medoo(array(
			'database_type' => 'mysql',
			'database_name' => 'offiplanet_dideco1',
			'server' => 'localhost',
			//'server' => 'mysql', 
			'username' => 'offiplanet_user',
			'password' => '+vUTSb!P&VXh'
		));
	}
?>