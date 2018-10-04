<?php
	if(!isset($_SESSION)){
		@session_start();
	}

	session_start();
	if($_SESSION["activo"] == 0) {
		header('Location: ../../index.php');
		return;
	}
	
	
	if( isset($_REQUEST['vg_nombre_usuario']) ) {
		
		$fileType = $_FILES["vg_excel"]["type"];
		
		$uploadFilePath = '../../uploads/'.basename($_FILES['vg_excel']['name']);
    	move_uploaded_file($_FILES['vg_excel']['tmp_name'], $uploadFilePath);
		
		require('../../libs/spreadsheet-reader/php-excel-reader/excel_reader2.php');
		require('../../libs/spreadsheet-reader/SpreadsheetReader.php');
		
		require("../../controller/categories.php");
		require("../../controller/procedures.php");
		
		$Reader = new SpreadsheetReader($uploadFilePath);
    	
    	$arraySinCategroria = array();
    	$arrayAgregados = array();
    	$arrayNoAgregados = array();

		$Reader->ChangeSheet(0);
		$row = 0;
		foreach ($Reader as $Row)
      	{
      		if($row > 0) {
      			$tramiteVersion = isset($Row[0]) ? $Row[0] : '';
      			$tramiteCategoria = isset($Row[1]) ? $Row[1] : '';
      			$tramiteNombre = isset($Row[2]) ? $Row[2] : '';
      			$tramiteDescripcion = isset($Row[3]) ? $Row[3] : '';
      			$tramiteRequisitos = isset($Row[4]) ? $Row[4] : '';
      			$tramiteEnLinea = isset($Row[5]) ? $Row[5] : '';
      			$tramiteEnEtapas = isset($Row[6]) ? $Row[6] : '';
      			$tramiteValor = isset($Row[7]) ? $Row[7] : '';
      			$tramiteLugar = isset($Row[8]) ? $Row[8] : '';
      			$tramiteContacto = isset($Row[9]) ? $Row[9] : '';
      			$tramiteInfoComplementaria = isset($Row[10]) ? $Row[10] : '';
      			
      			$resultCategory = getCategoryByName($tramiteCategoria);
      			if(sizeof($resultCategory) > 0) {
      				$result = addProcedure($tramiteVersion, $tramiteNombre, $tramiteCategoria, $tramiteDescripcion,
							$tramiteRequisitos, $tramiteEnLinea, $tramiteEnEtapas, $tramiteValor, $tramiteLugar, 
							$tramiteContacto, $tramiteInfoComplementaria, $_SESSION['nombre_usuario']);
					if($result == null) {
						$arrayNoAgregados = array();
					}  else {
						$arrayAgregados = array();
					}    			
				} else {
					$arraySinCategroria[] = $Row;
				}
				break;
      		}
      		$row++;
       	}
       	
       	if(sizeof($arraySinCategroria) == 0 && sizeof($arrayNoAgregados) == 0) { ?>
			<div class="box-body">
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					Trámite cargado correctamente.
				</div>
			</div>
			<!-- /.box-body -->
		<?php
		
		} else { 
			if(sizeof($arraySinCategroria) > 0 ){ ?>
				<div class="box-body">
					<div class="alert alert-warning alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						El siguiente trámite no se pudo agregar ya que la categoría no se encuentra registrada en el sistema:
					</div>
				
					<table id="table" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Versión</th>
								<th>Categoría</th>
								<th>Nombre</th>
								<th>Descripción</th>
							</tr>
						</thead>
						<tbody>
							<?php
								for($i=0 ; $i<sizeof($arraySinCategroria) ; $i++) { ?>
									<tr>
										<td><?php echo $arraySinCategroria[$i][0];?></td>
										<td><?php echo $arraySinCategroria[$i][1];?></td>
										<td><?php echo $arraySinCategroria[$i][2];?></td>
										<td><?php echo $arraySinCategroria[$i][3];?></td>
									</tr>   
							<?php
								} ?> 
						</tbody>
					</table>
				</div>
				<!-- /.box-body -->
			<?php
			}
			
			if(sizeof($arrayNoAgregados) > 0 ){ ?>
				<div class="box-body">
					<div class="alert alert-warning alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						El siguiente trámite no se pudo agregar debido a un error en el formato del archivo seleccionado:
					</div>
				
					<table id="table" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Versión</th>
								<th>Categoría</th>
								<th>Nombre</th>
								<th>Descripción</th>
							</tr>
						</thead>
						<tbody>
							<?php
								for($i=0 ; $i<sizeof($arrayNoAgregados) ; $i++) { ?>
									<tr>
										<td><?php echo $arrayNoAgregados[$i][0];?></td>
										<td><?php echo $arrayNoAgregados[$i][1];?></td>
										<td><?php echo $arrayNoAgregados[$i][2];?></td>
										<td><?php echo $arrayNoAgregados[$i][3];?></td>
									</tr>   
							<?php
								} ?> 
						</tbody>
					</table>
				</div>
				<!-- /.box-body -->
			<?php
			}
		}
		return;
	}	
	
?>