<?php
	if(!isset($_SESSION)){
		@session_start();
	}

	if($_SESSION["activo"] == 0) {
		header('Location: ../../index.php');
		return;
	}
	include_once("../../utils/user_utils.php");
	
	include_once("../../controller/requests.php");
	$datas = getVisibleRequests();
?>
    
    
    <div class="box-body">
    	<table id="table" class="table table-bordered table-hover">
        	<thead>
                <tr>
                  <th>ID</th>
                  <th>Rut</th>
                  <th>Nombre</th>
                  <th>Trámite</th>
                  <th>Estado</th>
                  <th>Fecha Creación</th>
                  <th>Acciones</th>
                </tr>
            </thead>
       		<tbody>
       			<?php
       				for($i=0 ; $i<sizeof($datas) ; $i++) { ?>
       					<tr>
                  			<td><?php echo $datas[$i]['id'];?></td>
                  			<td><?php echo $datas[$i]['rut'];?></td>
                  			<td><?php echo $datas[$i]['nombre_beneficiario'];?></td>
                  			<td><?php echo $datas[$i]['nombre_tramite'];?></td>
                  			<td><?php echo $datas[$i]['estado'];?></td>
                  			<td><?php echo $datas[$i]['fecha_creacion'];?></td>
                  			<td>
                  				<?php 
                  					if(canUpdateBeneficiaries() ) { ?>
										<a href="#" class='btn btn-default' title='Editar' 
											data-id_solicitud='<?php echo base64_encode($datas[$i]['id']);?>'
											data-nombre_tramite='<?php echo $datas[$i]['nombre_tramite'];?>'
											data-nombre_beneficiario='<?php echo $datas[$i]['nombre_beneficiario'];?>'
											data-estado='<?php echo $datas[$i]['estado'];?>'
											data-nombre_usuario='<?php echo $_SESSION["nombre_usuario"];?>' 
											data-toggle="modal" data-target="#editRequest">
											<i class="glyphicon glyphicon-edit"></i></a>
								<?php 
									} ?>
									
								<?php 
                  					if(canDeleteBeneficiaries() ) { ?>
										<a href="#" class='btn btn-default' title='Eliminar' 
											data-id_solicitud='<?php echo base64_encode($datas[$i]['id']);?>'
											data-nombre_tramite='<?php echo $datas[$i]['nombre_tramite'];?>'
											data-nombre_beneficiario='<?php echo $datas[$i]['nombre_beneficiario'];?>'
											data-nombre_usuario='<?php echo $_SESSION["nombre_usuario"];?>' 
											data-toggle="modal" data-target="#deleteRequest">
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
                  <th>Rut</th>
                  <th>Nombre</th>
                  <th>Trámite</th>
                  <th>Estado</th>
                  <th>Fecha Creación</th>
                  <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->