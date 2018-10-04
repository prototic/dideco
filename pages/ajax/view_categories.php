<?php
	if(!isset($_SESSION)){
		@session_start();
	}

	if($_SESSION["activo"] == 0) {
		header('Location: ../../index.php');
		return;
	}
	include("../../utils/user_utils.php");
	
	include("../../controller/categories.php");
	$datas = getVisibleCategories();
?>
    
    
    <div class="box-body">
    	<table id="table" class="table table-bordered table-hover">
        	<thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Autor</th>
                  <th>Fecha Creación</th>
                  <th>Acciones</th>
                </tr>
            </thead>
       		<tbody>
       			<?php
       				for($i=0 ; $i<sizeof($datas) ; $i++) { ?>
       					<tr>
                  			<td><?php echo $datas[$i]['id'];?></td>
                  			<td><?php echo $datas[$i]['nombre'];?></td>
                  			<td><?php echo $datas[$i]['autor'];?></td>
                  			<td><?php echo $datas[$i]['fecha_creacion'];?></td>
                  			<td>
                  				<?php 
                  					if(canUpdateCategories()) { ?>
										<a href="#" class='btn btn-default' title='Editar' 
											data-id='<?php echo base64_encode($datas[$i]['id']);?>'
											data-nombre='<?php echo $datas[$i]['nombre'];?>'
											data-nombre_usuario='<?php echo $_SESSION["nombre_usuario"];?>' 
											data-toggle="modal" data-target="#editCategory">
											<i class="glyphicon glyphicon-edit"></i></a>
								<?php 
									} ?>
								
								<?php 
                  					if(canDeleteCategories()) { ?>
										<a href="#" class='btn btn-default' title='Eliminar' 
											data-id='<?php echo base64_encode($datas[$i]['id']);?>'
											data-nombre='<?php echo $datas[$i]['nombre'];?>'
											data-nombre_usuario='<?php echo $_SESSION["nombre_usuario"];?>'  
											data-toggle="modal" data-target="#deleteCategory">
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
                  <th>Autor</th>
                  <th>Fecha Creación</th>
                  <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->