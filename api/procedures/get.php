<?php
	
	header('Content-type: application/json');
	
	if( isset($_REQUEST['vg_id']) ) {
		
		$id = $_REQUEST['vg_id'];
		
		include("../../controller/procedures.php");
		
		$result = getProcedure($id);
				
		echo json_encode($result, JSON_PRETTY_PRINT);
		return;
	}	
	
?>