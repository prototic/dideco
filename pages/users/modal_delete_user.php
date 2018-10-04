<!-- Modal -->
<div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">
					<i class='glyphicon glyphicon-edit'></i> Eliminar Usuario
				</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="post" id="delete_user" name="delete_user">
					<?php echo "<input type='hidden' value='".$_SESSION['nombre_usuario']."' id='ht_nombre_usuario' name='ht_nombre_usuario' />"; ?>
					<?php echo "<input type='hidden' value='' id='ht_codigo' name='ht_codigo' />"; ?>
					
					<div class="form-group">
						<label id="mensaje" class="col-sm-12 text-center">Se eliminará el siguiente usuario:</label>
					</div>
					<div class="form-group">
						<label id="ht_nombre" class="col-sm-12 text-center">Nombre de Usuario</label>
						<label id="mensaje" class="col-sm-12 text-center">¿Continuar?</label>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary" id="delete_user">Si</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>