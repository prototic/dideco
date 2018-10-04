<?php
	if(!isset($_SESSION)){
		@session_start();
	}

	if($_SESSION["activo"] == 0) {
		header('Location: ../../index.php');
		return;
	}
	include_once("../../utils/user_utils.php");
	
	include_once("../../controller/report1.php");
	
	$dateFrom = $_POST["dateFrom"];
	$dateTo = $_POST["dateTo"];
	$datas = getVisibleReportsWithFilters($dateFrom, $dateTo);
	
	//echo "<br>From: " . $_POST["dateFrom"];
	//echo "<br>To: " . $_POST["dateTo"];
?>
    
    <div class="box-body">
    	<table id="table" class="table table-bordered table-hover">
        	<thead>
                <tr>
                  <th>ID</th>
                  <th>Número Cliente</th>
                  <th>Nombre Cliente</th>
                  <th>Enviado por</th>
                  <th>Tipo de Visita</th>
                  <th>Fecha</th>
                  <th>Acciones</th>
                </tr>
            </thead>
       		<tbody>
       			<?php
       				for($i=0 ; $i<sizeof($datas) ; $i++) { ?>
       					<tr>
                  			<td><a href="../reports/detail_report1.php?data=<?php echo base64_encode("data" . $datas[$i]['id']);?>"><?php echo $datas[$i]['id'];?></a></td>
                  			<td><?php echo $datas[$i]['cliente_numero'];?></td>
                  			<td><?php echo $datas[$i]['cliente_nombre'];?></td>
                  			<td><?php echo $datas[$i]['autor_nombre'] . " " . $datas[$i]['autor_apellido'];?></td>
                  			<td><?php echo $datas[$i]['tipo_visita'];?></td>
                  			<td><?php echo $datas[$i]['fecha_creacion'];?></td>
                  			<td>
                  				<?php 
                  					if(canDeleteReports()) { ?>
										<a href="#" class='btn btn-default' title='Eliminar' 
											data-codigo='<?php echo $datas[$i]['id'];?>'
											data-nombre_usuario='<?php echo $_SESSION["nombre_usuario"];?>' 
											data-toggle="modal" data-target="#deleteReport1">
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
                  <th>Número Cliente</th>
                  <th>Nombre Cliente</th>
                  <th>Enviado por</th>
                  <th>Tipo de Visita</th>
                  <th>Fecha</th>
                  <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->