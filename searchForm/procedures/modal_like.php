<!-- Modal -->
<div class="modal fade" id="addLike" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">
					<i class='glyphicon glyphicon-star'></i> Me Interesa
				</h4>
			</div>
			<div class="modal-body">
				<div id="resultados_modal_like"></div>
				<form class="form-horizontal" method="post" id="add_like" name="add_like">
					<?php echo "<input type='hidden' id='vg_id_tramite' name='vg_id_tramite' />"; ?>
					<div class="form-group">
						<label for="ht_codigo" class="col-sm-3 control-label">Rut</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="vg_rut" name="vg_rut" 
								placeholder="Rut" maxlength="100" required oninput="checkRut(this)">
						</div>
					</div>
					<div class="form-group">
						<label for="ht_codigo" class="col-sm-3 control-label">Nombre</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="vg_nombre" name="vg_nombre" 
								placeholder="Nombre" maxlength="100" required>
						</div>
					</div>
					<div class="form-group">
						<label for="ht_nombre" class="col-sm-3 control-label">Correo Electrónico</label>
						<div class="col-sm-8">
							<input type="email" class="form-control" id="vg_correo_electronico" name="vg_correo_electronico" 
								placeholder="Correo Electrónico" maxlength="100" required>
						</div>
					</div>
					<div class="form-group">
						<label for="ht_descripcion" class="col-sm-3 control-label">Teléfono</label>
						<div class="col-sm-8">
							<input type="phone" class="form-control" id="vg_telefono" name="vg_telefono" 
								placeholder="Teléfono" maxlength="100" required>
						</div>
					</div>
					<div class="form-group">
						<label for="ht_unidad" class="col-sm-3 control-label">Género</label>
						<div class="col-sm-8">
							<select type="text" class="form-control" id="vg_genero" name="vg_genero" 
								placeholder="Género" maxlength="100" required>
								<option></option>
								<option>Mujer</option>
								<option>Hombre</option>
								<option>Otro</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="ht_unidad" class="col-sm-3 control-label">Edad</label>
						<div class="col-sm-8">
							<input type="number" class="form-control" id="vg_edad" name="vg_edad" 
								placeholder="Edad" maxlength="100" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Me interesa</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>