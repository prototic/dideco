<!-- Modal -->
<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">
					<i class='glyphicon glyphicon-edit'></i> Editar Categoria
				</h4>
			</div>
			<div class="modal-body">
				<div id="resultados_modal_editar"></div>
				<form class="form-horizontal" method="post" id="edit_category" name="edit_category">
					<?php echo "<input type='hidden' value='".$_SESSION['nombre_usuario']."' id='vg_nombre_usuario' name='vg_nombre_usuario' />"; ?>
					<?php echo "<input type='hidden' value='' id='vg_id' name='vg_id' />"; ?>
					
					<div class="form-group">
						<label for="vg_nombre" class="col-sm-3 control-label">Nombre</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="vg_nombre" name="vg_nombre" 
								placeholder="Nombre" maxlength="100" required>
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