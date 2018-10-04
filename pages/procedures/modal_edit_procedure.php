<!-- Modal -->
<div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">
					<i class='glyphicon glyphicon-edit'></i> Editar Producto
				</h4>
			</div>
			<div class="modal-body">
				<div id="resultados_modal_editar"></div>
				<form class="form-horizontal" method="post" id="edit_product" name="edit_product">
					<?php echo "<input type='hidden' value='".$_SESSION['nombre_usuario']."' id='ht_nombre_usuario' name='ht_nombre_usuario' />"; ?>
					<?php echo "<input type='hidden' value='' id='ht_codigo' name='ht_codigo' />"; ?>
					<div class="form-group">
						<label for="ht_codigo" class="col-sm-3 control-label">Código</label>
						<div class="col-sm-8">
							<label id="codigo" class="col-sm-3 control-label">Código</label>
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
						<label for="ht_descripcion" class="col-sm-3 control-label">Descripción</label>
						<div class="col-sm-8">
							<textarea type="text" class="form-control" id="ht_descripcion" name="ht_descripcion" 
								placeholder="Descripción" maxlength="500" rows="4"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="ht_unidad" class="col-sm-3 control-label">Unidad de Medida</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="ht_unidad" name="ht_unidad" 
								placeholder="Unidad de Medida" maxlength="100" required>
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