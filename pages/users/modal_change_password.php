<!-- Modal -->
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">
					<i class='glyphicon glyphicon-edit'></i> Cambiar Contraseña
				</h4>
			</div>
			<div class="modal-body">
				<div id="resultados_modal_change"></div>
				<form class="form-horizontal" method="post" id="change_password" name="change_password">
					<?php echo "<input type='hidden' value='".$_SESSION['nombre_usuario']."' id='ht_nombre_usuario' name='ht_nombre_usuario' />"; ?>
					<div class="form-group">
						<label for="ht_nombre" class="col-sm-3 control-label">Código</label>
						<div class="col-sm-8">
							<label id="nombre_usuario" class="col-sm-3 control-label">Código</label>
						</div>
					</div>
					<div class="form-group">
						<label for="ht_contrasenia_1" class="col-sm-3 control-label">Nueva Contraseña</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="ht_contrasenia_1" name="ht_contrasenia_1" 
								placeholder="Nueva Contraseña" minlength="4" maxlength="100" required>
						</div>
					</div>
					<div class="form-group">
						<label for="ht_contrasenia_2" class="col-sm-3 control-label">Repetir Contraseña</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="ht_contrasenia_2" name="ht_contrasenia_2" 
								placeholder="Reperir Contraseña" minlength="4" maxlength="100" required>
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