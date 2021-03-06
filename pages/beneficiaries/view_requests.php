<?php
	if(!isset($_SESSION)){
		@session_start();
	}

	if($_SESSION["activo"] == 0) {
		header('Location: ../../index.php');
	}
	
	$nombre_usuario = $_SESSION["nombre_usuario"];
	
	include_once("../../utils/user_utils.php");
?>

<!DOCTYPE html>
<html>
<?php include_once("../include/header.php")?>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
	<?php 
		$activeMenu = "beneficiaries";
		include_once("../include/menu_side.php");
		//include_once("modal_add_procedure.php");
		include_once("modal_edit_request.php");
		include_once("modal_delete_request.php");
	?>
  
  	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    	<!-- Content Header (Page header) -->
    	<section class="content-header">
      		<h1>
        		Solicitudes
        		<small>todos las solicitudes</small>
      		</h1>
      		<ol class="breadcrumb">
        		<li><i class="fa fa-dashboard"></i> Inicio</li>
        		<li>Beneficiarios</li>
        		<li class="active">Ver Solicitudes</li>
      		</ol>
    	</section>

    	<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
    						<h3 class="box-title">Listado de solicitudes</h3>
    						
    						<?php
    							if(canCreateProcedures() && false) {?>
    								<div class="btn-group pull-right">
										<button id="exportButton" name="exportButton" class="btn btn-success pull-right" 
											data-toggle="modal" 
											data-usuario='<?php echo $_SESSION["nombre_usuario"];?>'  
											data-target="#addProcedure">
											<span class="fa fa-plus-circle"></span> Agregar Trámite
										</button>
									</div>
							<?php
								} ?>
						</div>
						<!-- /.box-header -->
						
						<div id="mensaje_resultados"></div><!-- Carga los datos ajax -->
						
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
	$(document).ready(function(){
		load();
	});
	
	function load() {
		$.ajax({
			type: "POST",
            url:'../ajax/view_requests.php',
            data:  '',
            beforeSend: function () {
                $('#loader').html('<img src="../../img/ajax-loader.gif"> Cargando...');
                $("#resultados").html("Obteniendo información, espere por favor.");           
            },
            success:  function (response) {
                $('#loader').html('');
                $("#resultados").html(response);
                
                $('#table').DataTable({
    				'language': {
    					"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
					},
      				'paging'      : true,
      				'lengthChange': true,
      				'searching'   : true,
      				'ordering'    : true,
      				'info'        : true,
      				'autoWidth'   : true
    			})
            },
			error: function() {
				$('#loader').html('');
				$("#resultados").html(response);  
			}
        });
	}
	
	$("#edit_request").submit(function( event ) {
		$('#edit_request').attr("disabled", true);
		var parametros = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "../ajax/edit_request.php",
			data: parametros,
			beforeSend: function(objeto) {
				$("#resultados_modal_editar").html("Cargando...");
			},
			success: function(datos) {
				$('#edit_request').attr("disabled", false);
				$("#resultados_modal_editar").html(datos);
				load();
			},
			error: function() {
				$("#resultados_modal_editar").html("Error en el registro");
			}
		});
		
		event.preventDefault();
	})
	
	$('#editRequest').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget); // Button that triggered the modal
		var idSolicitud = button.data('id_solicitud');
		var nombreUsuario = button.data('nombre_usuario');
		var nombreTramite = button.data('nombre_tramite');
		var nombreBeneficiario = button.data('nombre_beneficiario');
		var estado = button.data('estado');
		
		var modal = $(this);
		modal.find('.modal-body #vg_id_solicitud').val(idSolicitud);
		modal.find('.modal-body #vg_nombre_usuario').val(nombreUsuario);
		modal.find('.modal-body #vg_estado').val(estado);
		
		modal.find('.modal-body #tramite').html(nombreTramite);
		modal.find('.modal-body #vg_nombre_beneficiario').html(nombreBeneficiario);
		
		$("#resultados_modal_editar").html("");
	})
	
	$("#delete_request").submit(function( event ) {
		$('#delete_request').attr("disabled", true);
		var parametros = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "../ajax/delete_request.php",
			data: parametros,
			beforeSend: function(objeto) {
				$("#mensaje_resultados").html("Cargando...");
			},
			success: function(datos) {
				$('#delete_request').attr("disabled", false);
				$('#deleteRequest').modal('hide');
				$("#mensaje_resultados").html(datos);
				load();
			},
			error: function() {
				$("#mensaje_resultados").html("Error en el registro");
			}
		});
		
		event.preventDefault();
	})
	
	$('#deleteRequest').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget); // Button that triggered the modal
		var idSolicitud = button.data('id_solicitud');
		var nombreUsuario = button.data('nombre_usuario');
		var nombreTramite = button.data('nombre_tramite');
		var nombreBeneficiario = button.data('nombre_beneficiario');
		
		var modal = $(this);
		modal.find('.modal-body #vg_id_solicitud').val(idSolicitud);
		modal.find('.modal-body #vg_nombre_usuario').val(nombreUsuario);
		modal.find('.modal-body #vg_nombre_tramite').html(nombreTramite);
		modal.find('.modal-body #vg_nombre_beneficiario').html(nombreBeneficiario);
	})
	
</script>
</body>
</html>
