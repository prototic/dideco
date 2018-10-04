<?php 
	include_once("../include/menu_top.php");
	include_once("../../utils/user_utils.php");
	
	if(!isset($_SESSION)){
		@session_start();
	}
	
	$nombre = $_SESSION["nombre"] . " " . $_SESSION["apellido"];
	$perfil = $_SESSION["perfil"];
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class='main-sidebar'>
	<!-- sidebar: style can be found in sidebar.less -->
    <section class='sidebar'>
    	
      	<!-- sidebar menu: : style can be found in sidebar.less -->
      	<ul class='sidebar-menu' data-widget='tree'>
        	<li class='header'>MENÚ PRINCIPAL</li>
        	<li class='<?php if($activeMenu == "home") echo "active" ?>'>
				<a href='../home/home.php'>
					<i class='fa fa-home'></i> <span>Inicio</span>
				</a>
			</li>
			<li class='<?php if($activeMenu == "procedures") echo "active" ?>'>
				<a href='../procedures/find_procedures.php'>
					<i class='fa fa-search'></i> <span>Buscar</span>
				</a>
			</li>
      	</ul>
	</section>
	<!-- /.sidebar -->
</aside>

