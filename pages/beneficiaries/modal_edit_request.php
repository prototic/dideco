<!-- Modal -->
<div class="modal fade" id="editRequest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">
					<i class='glyphicon glyphicon-edit'></i> Editar Solicitud
				</h4>
			</div>
			<div class="modal-body">
				<div id="resultados_modal_editar"></div>
				<form class="form-horizontal" method="post" id="edit_request" name="edit_request">
					<?php echo "<input type='hidden' value='' id='vg_nombre_usuario' name='vg_nombre_usuario' />"; ?>
					<?php echo "<input type='hidden' value='' id='vg_id_solicitud' name='vg_id_solicitud' />"; ?>
					
					<div class="form-group">
						<label class="col-sm-12 text-center">Beneficiario:</label>
						<div id="vg_nombre_beneficiario" class="col-sm-12 text-center">Nombre de Beneficiario</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-12 text-center">Trámite:</label>
						<div id="tramite" class="col-sm-12 text-center">Nombre de Trámite</div>
					</div>
					
					<div class="form-group">
						<label for="vg_estado" class="col-sm-4 control-label">Estado</label>
						<div class="col-sm-8">
							<select type="text" class="form-control" id="vg_estado" name="vg_estado" 
								placeholder="Estado" maxlength="100" required>
								<option></option>
								<option>Pendiente</option>
								<option>Atendida</option>
							</select>
						</div>
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>