<!-- Modal -->
<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">
					<i class='glyphicon glyphicon-edit'></i> Editar Usuario
				</h4>
			</div>
			<div class="modal-body">
				<div id="resultados_modal_editar"></div>
				<form class="form-horizontal" method="post" id="edit_user" name="edit_user">
					<?php echo "<input type='hidden' value='".$_SESSION['nombre_usuario']."' id='usuario' name='usuario' />"; ?>
					<?php echo "<input type='hidden' id='ht_nombre_usuario' name='ht_nombre_usuario' />"; ?>
					<div class="form-group">
						<label for="ht_nombre" class="col-sm-3 control-label">Código</label>
						<div class="col-sm-8">
							<label id="nombre_usuario" class="col-sm-3 control-label">Código</label>
						</div>
					</div>
					<div class="form-group">
						<label for="ht_nombre" class="col-sm-3 control-label">Nombre</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="ht_nombre" name="ht_nombre" 
								placeholder="Nombre" maxlength="100" required>
						</div>
					</div>
					<div class="form-group">
						<label for="ht_apellido" class="col-sm-3 control-label">Apellido</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="ht_apellido" name="ht_apellido" 
								placeholder="Apellido" maxlength="100" required>
						</div>
					</div>
					<div class="form-group">
						<label for="ht_telefono" class="col-sm-3 control-label">Teléfono</label>
						<div class="col-sm-8">
							<input type="tel" class="form-control" id="ht_telefono" name="ht_telefono" 
								placeholder="Teléfono" maxlength="100">
						</div>
					</div>
					<div class="form-group">
						<label for="ht_correo_electronico" class="col-sm-3 control-label">Correo Electrónico</label>
						<div class="col-sm-8">
							<input type="email" class="form-control" id="ht_correo_electronico" name="ht_correo_electronico" 
							placeholder="Correo Electrónico" maxlength="100">
						</div>
					</div>
					<div class="form-group">
						<label for="ht_perfil" class="col-sm-3 control-label">Perfil Usuario</label>
						<div class="col-sm-8">
							<select class="form-control" id="ht_perfil" name="ht_perfil" required>
								<?php
									foreach($profiles as $profile) {
										echo "<option value=" . $profile['id_perfil'] .">" . $profile['nombre']. "</option>";
									}
								?>
                  			</select>
						</div>
					</div>
					<div class="form-group">
						<label for="ht_perfil" class="col-sm-3 control-label">Estado</label>
						<div class="col-sm-8">
							<select class="form-control" id="ht_estado" name="ht_estado" required>
								<option value="1">Activo</option>";
								<option value="0">Inactivo</option>";
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