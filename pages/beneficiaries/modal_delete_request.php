<!-- Modal -->
<div class="modal fade" id="deleteRequest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">
					<i class='glyphicon glyphicon-edit'></i> Eliminar Solicitud
				</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="post" id="delete_request" name="delete_request">
					<?php echo "<input type='hidden' value='".$_SESSION['nombre_usuario']."' id='vg_nombre_usuario' name='vg_nombre_usuario' />"; ?>
					<?php echo "<input type='hidden' value='' id='vg_id_solicitud' name='vg_id_solicitud' />"; ?>
					
					<div class="form-group">
						<label id="mensaje" class="col-sm-12 text-center">Se eliminará la siguiente solicitud:</label>
					</div>
					<div class="form-group">
						<label class="col-sm-12 text-center">Beneficiario:</label>
						<div id="vg_nombre_beneficiario" class="col-sm-12 text-center">Nombre de Beneficiario</div>
					</div>
					<div class="form-group">
						<label class="col-sm-12 text-center">Trámite:</label>
						<div id="vg_nombre_tramite" class="col-sm-12 text-center">Nombre de Trámite</div>
					</div>
					<div class="form-group">
						<label class="col-sm-12 text-center">¿Continuar?</label>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary" id="delete_product">Si</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>