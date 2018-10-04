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
    	<!-- Sidebar user panel -->
      	<div class='user-panel'>
        	<div class='pull-left image'>
          		<img src='../../img/viga_account.png' alt='User Image'>
        	</div>
        	<div class='pull-left info'>
          		<p><?php echo $nombre; ?></p>
          		<i class='fa fa-circle text-success'></i> <?php echo $perfil; ?>
        	</div>
      	</div>
      	
      	<!-- sidebar menu: : style can be found in sidebar.less -->
      	<ul class='sidebar-menu' data-widget='tree'>
        	<li class='header'>MENÚ PRINCIPAL</li>
        	<?php 
        		if(canReadDashboards()) { ?>
        			<li class='treeview <?php if($activeMenu == "dashboards") echo "active" ?>'>
          				<a href='#'>
            				<i class='fa fa-dashboard'></i> <span>Dashboard</span>
            				<span class='pull-right-container'>
              					<i class='fa fa-angle-left pull-right'></i>
            				</span>
          				</a>
          				<ul class='treeview-menu'>
            				<li><a href='../dashboards/view_dashboard_1.php'><i class='fa fa-circle-o'></i> Dashboard 1</a></li>
          				</ul>
        			</li>
        	<?php 
        		} ?>
        		
        	<?php 
        		if(canReadCategories()) { ?>
        			<li class='treeview <?php if($activeMenu == "categories") echo "active" ?>'>
          				<a href='#'>
            				<i class='fa fa-bookmark-o'></i> <span>Categorias</span>
            				<span class='pull-right-container'>
                  				<i class='fa fa-angle-left pull-right'></i>
                			</span>
          				</a>
          				<ul class='treeview-menu'>
            				<li><a href='../categories/view_categories.php'><i class='fa fa-circle-o'></i> Ver Categorias</a></li>
          				</ul>
          				
          				
        			</li>
        	<?php 
        		} ?>
        	
        	<?php 
        		if(canReadProcedures()) { ?>
        			<li class='treeview <?php if($activeMenu == "procedures") echo "active" ?>'>
          				<a href='#'>
            				<i class='fa fa-suitcase'></i> <span>Trámites</span>
            				<span class='pull-right-container'>
                  				<i class='fa fa-angle-left pull-right'></i>
                			</span>
          				</a>
          				<ul class='treeview-menu'>
            				<li><a href='../procedures/view_procedures.php'><i class='fa fa-circle-o'></i> Ver Trámites</a></li>
            				<?php 
        						if(canCreateProcedures()) { ?>
        							<li><a href='../procedures/add_procedure.php'><i class='fa fa-plus'></i> Agregar Trámite</a></li>
        							<li><a href='../procedures/upload_procedure.php'><i class='fa fa-file-excel-o'></i> Cargar Trámite</a></li>
        					<?php 
        						} ?>
          				</ul>
          			</li>
        	<?php 
        		} ?>
        	
        	<?php 
        		if(canReadUsers()) { ?>
        			<li class='treeview <?php if($activeMenu == "users") echo "active" ?>'>
          				<a href='#'>
            				<i class='fa fa-user'></i> <span>Usuarios</span>
            				<span class='pull-right-container'>
                  				<i class='fa fa-angle-left pull-right'></i>
                			</span>
          				</a>
          				<ul class='treeview-menu'>
            				<li><a href='../users/view_users.php'><i class='fa fa-circle-o'></i> Ver Usuarios</a></li>
          				</ul>
        			</li>
        	<?php 
        		} ?>
        	
        	<?php 
        		if(canReadBeneficiaries()) { ?>
        			<li class='treeview <?php if($activeMenu == "beneficiaries") echo "active" ?>'>
          				<a href='#'>
            				<i class='fa fa-user'></i> <span>Beneficiarios</span>
            				<span class='pull-right-container'>
                  				<i class='fa fa-angle-left pull-right'></i>
                			</span>
          				</a>
          				<ul class='treeview-menu'>
            				<li><a href='../beneficiaries/view_beneficiaries.php'><i class='fa fa-circle-o'></i> Ver Beneficiarios</a></li>
            				<li><a href='../beneficiaries/view_requests.php'><i class='fa fa-circle-o'></i> Ver Solicitudes</a></li>
          				</ul>
        			</li>
        	<?php 
        		} ?>
        		
        		<li class='<?php if($activeMenu == "") echo "active" ?>'>
					<a>
						<i class='fa fa-area-chart'></i> <span>Estadísticas</span>
					</a>
				</li>
      	</ul>
	</section>
	<!-- /.sidebar -->
</aside>

