<?php
	if(!isset($_SESSION)){
		@session_start();
	}

	if($_SESSION["activo"] == 1) {
		header('Location: ./pages/users/view_users.php');
	} else {
		header('Location: ./pages/login/login.php');
	}
?>