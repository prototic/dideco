<?php
	if(!isset($_SESSION)){
		@session_start();
	}

	if($_SESSION["activo"] == 0) {
		header('Location: ../../index.php');
		return;
	}
	include_once("../../utils/user_utils.php");
	
	include_once("../../controller/procedures.php");
	$datas = getVisibleProcedures();
?>
    
    
    <div class="box-body">
    	<table id="table" class="table table-bordered table-hover">
        	<thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Categoria</th>
                  <th>En línea</th>
                  <th>Acciones</th>
                </tr>
            </thead>
       		<tbody>
       			<?php
       				for($i=0 ; $i<sizeof($datas) ; $i++) { ?>
       					<tr>
                  			<td><?php echo $datas[$i]['id'];?></td>
                  			<td><?php echo $datas[$i]['nombre'];?></td>
                  			<td><?php echo $datas[$i]['descripcion'];?></td>
                  			<td><?php echo $datas[$i]['categoria'];?></td>
                  			<td><?php echo $datas[$i]['en_linea'];?></td>
                  			<td>
                  				<?php 
                  					if(canUpdateProcedures() && false) { ?>
										<a href="#" class='btn btn-default' title='Editar' 
											data-id='<?php echo base64_encode($datas[$i]['codigo']);?>'
											data-nombre='<?php echo $datas[$i]['nombre'];?>'
											data-descripcion='<?php echo $datas[$i]['descripcion'];?>'
											data-unidad='<?php echo $datas[$i]['unidad'];?>'
											data-nombre_usuario='<?php echo $_SESSION["nombre_usuario"];?>' 
											data-toggle="modal" data-target="#editProcedure">
											<i class="glyphicon glyphicon-edit"></i></a>
								<?php 
									} ?>
									
								<?php 
                  					if(canDeleteProcedures() && false) { ?>
										<a href="#" class='btn btn-default' title='Eliminar' 
											data-id='<?php echo base64_encode($datas[$i]['codigo']);?>'
											data-nombre='<?php echo $datas[$i]['nombre'];?>'
											data-nombre_usuario='<?php echo $_SESSION["nombre_usuario"];?>' 
											data-toggle="modal" data-target="#deleteProduct">
											<i class="glyphicon glyphicon-trash"></i></a>
								<?php 
									} ?>
                  			</td>
                		</tr>   
       			<?php
       				} ?>
                             
            </tbody>
            <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Categoria</th>
                  <th>En línea</th>
                  <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->