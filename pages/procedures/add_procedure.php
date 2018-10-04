<?php
	if(!isset($_SESSION)){
		@session_start();
	}

	if($_SESSION["activo"] == 0) {
		header('Location: ../../index.php');
	}
	
	$nombre_usuario = $_SESSION["nombre_usuario"];
	
	include_once("../../utils/user_utils.php");
	
	include_once("../../controller/categories.php");
	$categories = getVisibleCategories();
?>

<!DOCTYPE html>
<html>
<?php include_once("../include/header.php")?>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
	<?php 
		$activeMenu = "procedures";
		include_once("../include/menu_side.php");
		//include_once("modal_add_procedure.php");
		//include_once("modal_edit_procedure.php");
		//include_once("modal_delete_procedure.php");
	?>
  
  	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    	<!-- Content Header (Page header) -->
    	<section class="content-header">
      		<h1>
        		Trámites
        		<small>agregar trámite</small>
      		</h1>
      		<ol class="breadcrumb">
        		<li><i class="fa fa-dashboard"></i> Inicio</li>
        		<li>Trámites</li>
        		<li class="active">Agregar Trámites</li>
      		</ol>
    	</section>

    	<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
    						<h3 class="box-title">Nuevo trámite</h3>
						</div>
						<!-- /.box-header -->
						
						<div class="box-body">
							<div id="mensaje_resultados"></div><!-- Carga los datos ajax -->
							
    						<form class="form-horizontal" method="post" id="add_procedure" name="add_procedure">
								<?php echo "<input type='hidden' value='".$nombre_usuario."' id='vg_nombre_usuario' name='vg_nombre_usuario' />"; ?>
								
								<div class="row">
									<div class="col-xs-4">
                						<label for="fa_rut">Version</label>
                						<input type="text" class="form-control" id="vg_version" name="vg_version" 
											placeholder="Version" maxlength="100" required>
                					</div>
									<div class="col-xs-4">
                						<label for="fa_nombre">Nombre</label>
                  						<input type="text" class="form-control" id="vg_nombre" name="vg_nombre" 
											placeholder="Nombre" maxlength="500" required>
                					</div>
                					<div class="col-xs-4">
                						<label for="fa_apellido">Categoría</label>
                  						<select class="form-control" name='vg_categoria' id='vg_categoria' 
											title="Seleccione una categoría" required>
											<option></option>
											<?php
												for($i = 0 ; $i<sizeof($categories); $i++) { ?>
													<option><?php echo $categories[$i]["nombre"];?></option>
											<?php } ?>
										</select>
                					</div>
								</div>
								
								<div class="row">
									<div class="col-xs-6">
                						<label for="fa_direccion">Descripción</label>
                  						<textarea class="form-control textarea" placeholder="Descripción" id="vg_descripcion" name="vg_descripcion" required 
											style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd;"></textarea>
                					</div>
                					<div class="col-xs-6">
                						<label for="fa_ciudad">Requisitos</label>
                  						<textarea class="form-control textarea" placeholder="Requisitos" id="vg_requisitos" name="vg_requisitos" required 
											style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd;"></textarea>
                					</div>
                				</div>
                				
                				<div class="row">
									<div class="col-xs-4">
                						<label for="fa_direccion">En Línea</label>
                  						<textarea class="form-control textarea" placeholder="En Línea" id="vg_en_linea" name="vg_en_linea" required 
											style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd;"></textarea>
                					</div>
                					<div class="col-xs-4">
                						<label for="fa_ciudad">En Etapas</label>
                  						<textarea class="form-control textarea" placeholder="En Etapas" id="vg_en_etapas" name="vg_en_etapas" required 
											style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd;"></textarea>
                					</div>
                					<div class="col-xs-4">
                						<label for="fa_apellido">Valor</label>
                  						<input type="number" class="form-control" id="vg_valor" name="vg_valor" 
											placeholder="Valor" maxlength="100" required>
                					</div>
                				</div>
                				
                				<div class="row">
									<div class="col-xs-6">
                						<label for="fa_direccion">Lugar</label>
                  						<textarea class="form-control textarea" placeholder="Lugar" id="vg_lugar" name="vg_lugar" required 
											style="width: 100%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd;"></textarea>
                					</div>
                					<div class="col-xs-6">
                						<label for="fa_ciudad">Contacto</label>
                  						<textarea class="form-control textarea" placeholder="Contacto" id="vg_contacto" name="vg_contacto" required 
											style="width: 100%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd;"></textarea>
                					</div>
                				</div>
								
								<div class="row">
									<div class="col-xs-12">
                						<label for="fa_telefono">Información Complementaria</label>
                  						<textarea class="form-control textarea" placeholder="Información Complementaria" 
                  							id="vg_info_complementaria" name="vg_info_complementaria" required 
											style="width: 100%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd;"></textarea>
                					</div>
                				</div>
								
								<div class="row" id="buttons" visible">
									<br>
									<div class="col-xs-1">
										<button type="submit" class="btn btn-primary pull-left">Guardar</button>
									</div>
									<div class="col-xs-1">
										<a href="view_procedures.php" class="btn btn-default pull-left" data-dismiss="modal">Ir al listado</a>
									</div>
								</div>
							</form>
							
							<div id="loader">
    							
    						</div>
							
    					</div>
    					<!-- /.box-body -->
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
	$(document).ready(function(){
		load();
	});
	
	$("#add_procedure").submit(function( event ) {
		$('#add_procedure').attr("disabled", true);
		var parametros = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "../ajax/add_procedure.php",
			data: parametros,
			beforeSend: function(objeto) {
				$("#mensaje_resultados").html("Cargando...");
			},
			success: function(datos) {
				$('#add_procedure').attr("disabled", false);
				$("#mensaje_resultados").html(datos);
				load();
			},
			error: function() {
				$("#mensaje_resultados").html("Error en el registro");
			}
		});
		
		event.preventDefault();
	})
	
</script>
</body>
</html>
