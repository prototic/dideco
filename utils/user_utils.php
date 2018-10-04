<?php

	/* Permissions related to Users */	
	function canCreateUsers() {
		return containsPermission($_SESSION["permiso_usuarios"], "c");
	}
	function canReadUsers() {
		return containsPermission($_SESSION["permiso_usuarios"], "r");
	}
	function canUpdateUsers() {
		return containsPermission($_SESSION["permiso_usuarios"], "u");
	}
	function canDeleteUsers() {
		return containsPermission($_SESSION["permiso_usuarios"], "d");
	}
	
	/* Permissions related to Clients */	
	function canCreateCategories() {
		return containsPermission($_SESSION["permiso_categorias"], "c");
	}
	function canReadCategories() {
		return containsPermission($_SESSION["permiso_categorias"], "r");
	}
	function canUpdateCategories() {
		return containsPermission($_SESSION["permiso_categorias"], "u");
	}
	function canDeleteCategories() {
		return containsPermission($_SESSION["permiso_categorias"], "d");
	}
	
	/* Permissions related to Procedures */	
	function canCreateProcedures() {
		return containsPermission($_SESSION["permiso_tramites"], "c");
	}
	function canReadProcedures() {
		return containsPermission($_SESSION["permiso_tramites"], "r");
	}
	function canUpdateProcedures() {
		return containsPermission($_SESSION["permiso_tramites"], "u");
	}
	function canDeleteProcedures() {
		return containsPermission($_SESSION["permiso_tramites"], "d");
	}
	
	/* Permissions related to Beneficiaries */	
	function canCreateBeneficiaries() {
		return containsPermission($_SESSION["permiso_beneficiarios"], "c");
	}
	function canReadBeneficiaries() {
		return containsPermission($_SESSION["permiso_beneficiarios"], "r");
	}
	function canUpdateBeneficiaries() {
		return containsPermission($_SESSION["permiso_beneficiarios"], "u");
	}
	function canDeleteBeneficiaries() {
		return containsPermission($_SESSION["permiso_beneficiarios"], "d");
	}
	
	/* Permissions related to Dashboards */	
	function canCreateDashboards() {
		return containsPermission($_SESSION["permiso_tableros"], "c");
	}
	function canReadDashboards() {
		return containsPermission($_SESSION["permiso_tableros"], "r");
	}
	function canUpdateDashboards() {
		return containsDashboards($_SESSION["permiso_tableros"], "u");
	}
	function canDeleteDashboards() {
		return containsPermission($_SESSION["permiso_tableros"], "d");
	}
	
	/* Extra utils */
	function containsPermission($main, $substring) {
    	return strpos($main, $substring) !== false;
	}

?>