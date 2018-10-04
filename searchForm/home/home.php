<!DOCTYPE html>
<html>
<?php include_once("../include/header.php")?>

	<body class="skin-green sidebar-mini">
		<div class="wrapper">
			<?php 
				$activeMenu = "home";
				include_once("../include/menu_side.php");
			?>
  
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						Inicio
					</h1>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i> Inicio</li>
					</ol>
				</section>

				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-xs-12">
							<div class="box">
								<div class="jumbotron">
									  <div class="container">
											<h1>Buscador de Trámites</h1>
											<p>Este buscador le permite encontrar trámites disponibles desde cualquier lugar
											<p><a href="../procedures/find_procedures.php" class="btn btn-primary btn-lg" role="button">Ir al buscador</a></p>
									  </div>
								</div>
							</div>
							<!-- /.box -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
  
			<?php include_once("../include/footer.php")?>
		</div>
	<!-- ./wrapper -->
	</body>
</html>
