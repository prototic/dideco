<?php
	
	header('Content-type: application/json');
	
	if( isset($_REQUEST['vg_text']) && isset($_REQUEST['vg_category']) ) {
		
		$text = $_REQUEST['vg_text'];
		$category = $_REQUEST['vg_category'];
		
		include("../../controller/procedures.php");
		
		$result = findProcedures($text, $category);
				
		echo json_encode($result, JSON_PRETTY_PRINT);
		return;
	}	
	
?>