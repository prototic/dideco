<?php
	if(!isset($_SESSION)){
		@session_start();
	}

	if($_SESSION["activo"] == 0) {
		header('Location: ../../index.php');
		return;
	}
	include_once("../../utils/user_utils.php");
	
	include_once("../../controller/beneficiaries.php");
	$datas = getVisibleBeneficiaries();
?>
    
    
    <div class="box-body">
    	<table id="table" class="table table-bordered table-hover">
        	<thead>
                <tr>
                  <th>Rut</th>
                  <th>Nombre</th>
                  <th>Correo Electrónico</th>
                  <th>Teléfono</th>
                  <th>Género</th>
                  <th>Edad</th>
                  <th>Acciones</th>
                </tr>
            </thead>
       		<tbody>
       			<?php
       				for($i=0 ; $i<sizeof($datas) ; $i++) { ?>
       					<tr>
                  			<td><?php echo $datas[$i]['rut'];?></td>
                  			<td><?php echo $datas[$i]['nombre'];?></td>
                  			<td><?php echo $datas[$i]['correo_electronico'];?></td>
                  			<td><?php echo $datas[$i]['telefono'];?></td>
                  			<td><?php echo $datas[$i]['genero'];?></td>
                  			<td><?php echo $datas[$i]['edad'];?></td>
                  			<td>
                  				<?php 
                  					if(canUpdateProcedures() && false) { ?>
										<a href="#" class='btn btn-default' title='Editar' 
											data-rut='<?php echo base64_encode($datas[$i]['rut']);?>'
											data-nombre='<?php echo $datas[$i]['nombre'];?>'
											data-descripcion='<?php echo $datas[$i]['descripcion'];?>'
											data-unidad='<?php echo $datas[$i]['unidad'];?>'
											data-nombre_usuario='<?php echo $_SESSION["nombre_usuario"];?>' 
											data-toggle="modal" data-target="#editProcedure">
											<i class="glyphicon glyphicon-edit"></i></a>
								<?php 
									} ?>
									
								<?php 
                  					if(canDeleteProcedures()) { ?>
										<a href="#" class='btn btn-default' title='Eliminar' 
											data-rut_beneficiario='<?php echo base64_encode($datas[$i]['rut']);?>'
											data-nombre_beneficiario='<?php echo $datas[$i]['nombre'];?>'
											data-nombre_usuario='<?php echo $_SESSION["nombre_usuario"];?>' 
											data-toggle="modal" data-target="#deleteBeneficiary">
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
                  <th>Rut</th>
                  <th>Nombre</th>
                  <th>Correo Electrónico</th>
                  <th>Teléfono</th>
                  <th>Género</th>
                  <th>Edad</th>
                  <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->