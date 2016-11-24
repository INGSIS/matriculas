<?php


	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$id_profesor=intval($_GET['id']);
		
		$count= 0;
		if ($count==0){
			if ($delete1=mysqli_query($con,"DELETE FROM profesores WHERE ID='".$id_profesor."'")){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente.
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
			<?php
			
		}
			
		} else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> No se pudo eliminar éste  cliente. 
			</div>
			<?php
		}
		
		
		
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('NOMBRE');//Columnas de busqueda
		 $sTable = "profesores";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		$sWhere.=" order by NOMBRE";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './profesores.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th>Nombre</th>
					<th>Cedula</th>
					<th>Edad</th>
					<th>Telefono</th>
					<th>Estado</th>
					<th class='text-right'>Acciones</th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_profesor=$row['ID'];
						$nombre_profesor=$row['NOMBRE'];
						$edad_profesor=$row['EDAD'];
						$cedula_profesor=$row['CEDULA'];
						$telefono_profesor=$row['TELEFONO'];
						$status_profesor=$row['ESTADO'];
						if ($status_profesor==1){$estado="Activo";}
						else {$estado="Inactivo";}
												
					?>
					
					<input type="hidden" value="<?php echo $nombre_profesor;?>" id="nombre_profesor<?php echo $id_profesor;?>">
					<input type="hidden" value="<?php echo $cedula_profesor;?>" id="cedula_profesor<?php echo $id_profesor;?>">
					<input type="hidden" value="<?php echo $edad_profesor;?>" id="edad_profesor<?php echo $id_profesor;?>">
					<input type="hidden" value="<?php echo $telefono_profesor;?>" id="telefono_profesor<?php echo $id_profesor;?>">
									
					<input type="hidden" value="<?php echo $status_profesor;?>" id="status_profesor<?php echo $id_profesor;?>">
					
					<tr>
						
						<td><?php echo $nombre_profesor; ?></td>
						<td ><?php echo $cedula_profesor; ?></td>
						<td><?php echo $edad_profesor;?></td>
						<td><?php echo $telefono_profesor;?></td>
						<td><?php echo $estado;?></td>
						
						
					<td ><span class="pull-right">
					<a href="#" class='btn btn-default' title='Editar Profesor' onclick="obtener_datos('<?php echo $id_profesor;?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 
					<a href="#" class='btn btn-default' title='Borrar Profesor' onclick="eliminar('<?php echo $id_profesor; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td>
						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=7><span class="pull-right">
					<?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>