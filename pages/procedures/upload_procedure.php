<?php
	if(!isset($_SESSION)){
		@session_start();
	}

	if($_SESSION["activo"] == 0) {
		header('Location: ../../index.php');
	}
	
	$nombre_usuario = $_SESSION["nombre_usuario"];
	
	include_once("../../utils/user_utils.php");
	
	if(!canCreateProcedures()) {
		return;
	}
?>

<!DOCTYPE html>
<html>
<?php include_once("../include/header.php")?>

<body class="hold-transition skin-blue sidebar-mini">
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
        		Trámites
        		<small>cargar tramité desde Excel</small>
      		</h1>
      		<ol class="breadcrumb">
        		<li><i class="fa fa-dashboard"></i> Inicio</li>
        		<li>Trámites</li>
        		<li class="active">Cargar Trámite</li>
      		</ol>
    	</section>

    	<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
    						<h3 class="box-title">Cargar Trámite</h3>
						</div>
						<!-- /.box-header -->
						
						<div class="box-body">
							<div class="alert alert-info alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								Para cargar un trámite debe utilizar la siguiente <a href="../../templates_upload/tramite.xlsx">plantilla</a>.
							</div>
						</div>
						<!-- /.box-body -->
						
						<form role="form" id="upload">
              				<div class="box-body">
              					<?php echo "<input type='hidden' value='".$_SESSION['nombre_usuario']."' id='vg_nombre_usuario' name='vg_nombre_usuario' />"; ?>
                				<div class="form-group">
                  					<label for="exampleInputFile">Seleccione archivo</label>
                  					<input type="file" id="vg_excel" name="vg_excel" accept=".xls,.xlsx">
                				</div>
                				<button type="submit" class="btn btn-primary">Subir</button>
			              	</div>
            			</form>
            
						<div id="results"></div><!-- Carga los datos ajax -->
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
	
	$("#upload").submit(function( event ) {
		var usuario = $("#ht_nombre_usuario").val();
		
		$('#upload').attr("disabled", true);
		var parametros = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "../ajax/upload_procedure.php",
			data: new FormData(this),
			processData: false,
			contentType: false,
			beforeSend: function(objeto) {
				$("#results").html('<img src="../../img/ajax-loader.gif"> Cargando...');
			},
			success: function(datos) {
				$('#upload').attr("disabled", false);
				$("#results").html(datos);
			},
			error: function() {
				$("#results").html("Error en el registro");
			}
		});
		
		event.preventDefault();
	})
	
</script>
</body>
</html>
