<?php
	$id = str_replace("data", "", base64_decode($_GET["data"]));
	
	include("../../controller/procedures.php");
	
	//echo "id: " . $id;
		
	$tramite = getProcedure($id);
?>

<!DOCTYPE html>
<html>
<?php include_once("../include/header.php")?>

<body class="skin-green sidebar-mini">
<div class="wrapper">
	<?php 
		$activeMenu = "procedures";
		include_once("../include/menu_side.php");
		include_once("modal_like.php");
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
        		<li><i class="fa fa-search"></i> <a href="find_procedures.php">Búsqueda</a></li>
        		<li class="active">Resultado</li>
      		</ol>
    	</section>

    	<!-- Main content -->
		<section class="content">
			 <a href="javascript:history.back(1)">Volver Atrás</a>
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
    						<h3 class="page-header"><?php echo $tramite[0]['nombre']; ?> 
    							<span class="label label-warning pull-right"><?php echo $tramite[0]['categoria']; ?></span>
    						</h3>
						</div>
						
						<div class="box-body">
							<div class="col-md-8">
    							<h4>¿En qué consiste el servicio?</h4>
    							<p><?php echo $tramite[0]['descripcion']; ?></p>
    							
    							<h4>Requisitos y Antecedentes</h4>
    							<p><?php echo $tramite[0]['requisitos']; ?></p>
    							
    							<h4>En Línea</h4>
    							<p><?php echo $tramite[0]['en_linea']; ?></p>
    							
    							<h4>Trámites a realizar o Etapas</h4>
    							<p><?php echo $tramite[0]['en_etapas']; ?></p>
    							
    							<h4>Valor</h4>
    							<p><?php echo $tramite[0]['valor']; ?></p>
    							
    							<h4>Lugar</h4>
    							<p><?php echo $tramite[0]['lugar']; ?></p>
    							
    							<h4>Información Complementariaa</h4>
    							<p><?php echo $tramite[0]['info_complementaria']; ?></p>
							</div>
							<div class="col-md-4">
								<div class="well">
    								<h4>Contacto</h4>
    								<p><?php echo $tramite[0]['contacto']; ?></p>
								</div>
								
								<div>
    								<button type="button" class="btn btn-default btn-lg" 
    									data-toggle="modal" data-target="#addLike" 
    									data-id_tramite='<?php echo base64_encode($id);?>'  >
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span> Me interesa
									</button>
								</div>
							</div>
						</div>
						<!-- /.box-header -->
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
		
	});
	
	$("#add_like").submit(function( event ) {
		$('#add_like').attr("disabled", true);
		var parametros = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "../ajax/add_like.php",
			data: parametros,
			beforeSend: function(objeto) {
				$("#resultados_modal_like").html("Cargando...");
			},
			success: function(datos) {
				$('#add_like').attr("disabled", false);
				$("#resultados_modal_like").html(datos);
				load();
			},
			error: function() {
				$("#resultados_modal_like").html("Error en el registro");
			}
		});
		
		event.preventDefault();
	})
	
	$('#addLike').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget); // Button that triggered the modal
		var idTramite = button.data('id_tramite');
		
		var modal = $(this);
		modal.find('.modal-body #vg_id_tramite').val(idTramite);
		modal.find('.modal-body #vg_nombre').val("");
		modal.find('.modal-body #vg_rut').val("");
		modal.find('.modal-body #vg_correo_electronico').val("");
		modal.find('.modal-body #vg_telefono').val("");
		modal.find('.modal-body #vg_genero').val("");
		modal.find('.modal-body #vg_edad').val("");
		
		$("#resultados_modal_like").html("");
	})
	
	function checkRut(rut) {
		// Despejar Puntos
		var valor = rut.value.replace('.','');
		// Despejar Guión
		valor = valor.replace('-','');
	
		// Aislar Cuerpo y Dígito Verificador
		cuerpo = valor.slice(0,-1);
		dv = valor.slice(-1).toUpperCase();
	
		// Formatear RUN
		rut.value = cuerpo + '-'+ dv
	
		// Si no cumple con el mínimo ej. (n.nnn.nnn)
		if(cuerpo.length < 7) { rut.setCustomValidity("Rut incompleto"); return false;}
	
		// Calcular Dígito Verificador
		suma = 0;
		multiplo = 2;
	
		// Para cada dígito del Cuerpo
		for(i=1;i<=cuerpo.length;i++) {
	
			// Obtener su Producto con el Múltiplo Correspondiente
			index = multiplo * valor.charAt(cuerpo.length - i);
		
			// Sumar al Contador General
			suma = suma + index;
		
			// Consolidar Múltiplo dentro del rango [2,7]
			if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
  
		}
	
		// Calcular Dígito Verificador en base al Módulo 11
		dvEsperado = 11 - (suma % 11);
	
		// Casos Especiales (0 y K)
		dv = (dv == 'K')?10:dv;
		dv = (dv == 0)?11:dv;
	
		// Validar que el Cuerpo coincide con su Dígito Verificador
		if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }
	
		// Si todo sale bien, eliminar errores (decretar que es válido)
		rut.setCustomValidity('');
	}
	
</script>
</body>
</html>
