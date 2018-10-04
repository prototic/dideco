<?php
	if(!isset($_SESSION)){
		@session_start();
	}

	if($_SESSION["activo"] == 0) {
		header('Location: ../../index.php');
		return;
	}
	include_once("../../utils/user_utils.php");
	
	include_once("../../controller/users.php");
	$datas = getVisibleUsers();
?>
    
    <div class="box-body">
    	<table id="table" class="table table-bordered table-hover">
        	<thead>
                <tr>
                  <th>Nombre Completo</th>
                  <th>Código</th>
                  <th>Teléfono</th>
                  <th>Correo Electrónico</th>
                  <th>Perfil</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
            </thead>
       		<tbody>
       			<?php
       				for($i=0 ; $i<sizeof($datas) ; $i++) { ?>
       					<tr>
                  			<td><?php echo $datas[$i]['nombre'] . " " . $datas[$i]['apellido'];?></td>
                  			<td><?php echo $datas[$i]['nombre_usuario'];?></td>
                  			<td><?php echo $datas[$i]['telefono'];?></td>
                  			<td><?php echo $datas[$i]['correo_electronico'];?></td>
                  			<td><?php echo $datas[$i]['perfil'];?></td>
                  			<td><?php echo ($datas[$i]['estado'] == 1) ? "Activo" : "Inactivo";?></td>
                  			<td>
                  				<?php 
                  					if(canUpdateUsers()) { ?>
										<a href="#" class='btn btn-default' title='Editar' 
											data-nombre_usuario='<?php echo $datas[$i]['nombre_usuario'];?>'
											data-nombre='<?php echo $datas[$i]['nombre'];?>'
											data-apellido='<?php echo $datas[$i]['apellido'];?>'
											data-telefono='<?php echo $datas[$i]['telefono'];?>' 
											data-correo_electronico='<?php echo $datas[$i]['correo_electronico'];?>' 
											data-id_perfil='<?php echo $datas[$i]['id_perfil'];?>' 
											data-estado='<?php echo $datas[$i]['estado'];?>' 
											data-usuario='<?php echo $_SESSION["nombre_usuario"];?>' 
											data-toggle="modal" data-target="#editUser">
											<i class="glyphicon glyphicon-edit"></i></a>
										<a href="#" class='btn btn-default' title='Cambiar contraseña' 
											data-nombre_usuario='<?php echo $datas[$i]['nombre_usuario'];?>'
											data-nombre='<?php echo $datas[$i]['nombre'];?>'
											data-apellido='<?php echo $datas[$i]['apellido'];?>'
											data-telefono='<?php echo $datas[$i]['telefono'];?>' 
											data-correo_electronico='<?php echo $datas[$i]['correo_electronico'];?>' 
											data-id_perfil='<?php echo $datas[$i]['id_perfil'];?>' 
											data-usuario='<?php echo $_SESSION["nombre_usuario"];?>' 
											data-toggle="modal" data-target="#changePassword">
											<i class="glyphicon glyphicon-option-horizontal"></i></a>
								<?php 
									} ?>
									
								<?php 
                  					if(canDeleteUsers()) { ?>
										<a href="#" class='btn btn-default' title='Eliminar' 
											data-codigo='<?php echo $datas[$i]['nombre_usuario'];?>'
											data-nombre='<?php echo $datas[$i]['nombre'];?>' 
											data-apellido='<?php echo $datas[$i]['apellido'];?>'
											data-nombre_usuario='<?php echo $_SESSION["nombre_usuario"];?>' 
											data-toggle="modal" data-target="#deleteUser">
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
                  <th>Nombre Completo</th>
                  <th>Código</th>
                  <th>Teléfono</th>
                  <th>Correo Electrónico</th>
                  <th>Perfil</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->