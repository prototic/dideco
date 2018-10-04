<!-- Modal -->
<div class="modal fade" id="deleteBeneficiary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">
					<i class='glyphicon glyphicon-edit'></i> Eliminar Beneficiario
				</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="post" id="delete_beneficiary" name="delete_beneficiary">
					<?php echo "<input type='hidden' value='".$_SESSION['nombre_usuario']."' id='vg_nombre_usuario' name='vg_nombre_usuario' />"; ?>
					<?php echo "<input type='hidden' value='' id='vg_rut_beneficiario' name='vg_rut_beneficiario' />"; ?>
					
					<div class="form-group">
						<label id="mensaje" class="col-sm-12 text-center">Se eliminará el siguiente beneficiario:</label>
					</div>
					<div class="form-group">
						<div id="vg_nombre_beneficiario" class="col-sm-12 text-center">Nombre de Beneficiario</div>
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