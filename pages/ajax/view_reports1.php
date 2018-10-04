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
	$datas = getVisibleReports();
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
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->