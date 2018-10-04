<?php
	include("../../controller/categories.php");
	$categorias = getVisibleCategories();
	
	if( isset($_GET['vg_text']) || isset($_GET['vg_category']) ) {
		$vg_text = $_GET["vg_text"];
		$vg_category = $_GET["vg_category"];
		
		include("../../controller/procedures.php");
		$tramites = findProcedures($vg_text, $vg_category);
	}
?>

<!DOCTYPE html>
<html>
<?php include_once("../include/header.php")?>

<body class="skin-green sidebar-mini">
<div class="wrapper">
	<?php 
		$activeMenu = "procedures";
		include_once("../include/menu_side.php");
	?>
  
  	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    	<!-- Content Header (Page header) -->
    	<section class="content-header">
      		<h1>
        		Buscador
        		<small>de trámites</small>
      		</h1>
      		<ol class="breadcrumb">
        		<li><i class="fa fa-search"></i> Búsqueda</li>
      		</ol>
    	</section>

    	<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
    						<h3 class="box-title">Realizar Búsqueda</h3>
						</div>
						<!-- /.box-header -->
						
						<div class="box-body">
              				<div class="row">
              					<form id="search" name="search" method="GET">
              						<div class="col-xs-6">
                						<label for="dateFrom">Palabra clave</label>
                  						<input id="vg_text" name="vg_text" type="text" class="form-control" value="<?php echo $vg_text; ?>"
                  							placeholder="Nombre del trámite o palabra buscada" onchange="loadWithFilters();">
                					</div>
                					<div class="col-xs-3">
                						<label for="dateTo">Categoría</label>
                  						<select id="vg_category" name="vg_category" class="form-control" 
                  							placeholder=".col-xs-3" >
                  							<option value="" selected>Todas</option>
                  							<?php
                  								for($i=0; $i<sizeof($categorias); $i++){
                  									$nombreCategoria = $categorias[$i]['nombre'];
                  									if($vg_category == $nombreCategoria)
                  										echo "<option value='$nombreCategoria' selected>$nombreCategoria</option>";
                  									else
                  										echo "<option value='$nombreCategoria'>$nombreCategoria</option>";
                  								}
                  							?>
                  						</select>
                					</div>
                					<div class="col-xs-3">
                						<br>
                						<button type="submit" class="btn btn-primary">Buscar</button>
                					</div>
                				</form>
                			</div>
            			</div>
            			<!-- /.box-body -->
						<div class="box-body">
							<div id="mensaje_resultados"></div><!-- Carga los datos ajax -->
						</div>
						
						<div class="box-body">
							<?php
								if(sizeof($tramites) > 0) { ?>
									<table id="table" class="table table-bordered table-hover">
										<thead>
											<tr>
											  <th>Resultados</th>
											</tr>
										</thead>
										<tbody>
											<?php
												for($i=0 ; $i<sizeof($tramites) ; $i++) { 
													echo "<tr>";
													echo "<td><a href='show_procedure.php?data=" . base64_encode("data".$tramites[$i]['id']) . "'>" . $tramites[$i]['nombre'] . "</a></td>";
													echo "</tr>";   
												} ?>
							 
										</tbody>
									</table>
								<?php } ?>
						</div>
						
						<span id="loader"></span>
						<div id="resultados"></div><!-- Carga los datos ajax -->
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

<script>
	
</script>
</body>
</html>
