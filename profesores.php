<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$active_registro="";
	$active_materias="";
	$active_alumnos="";
	$active_profesores="active";	
	$active_matriculas="";	
	$title="Profesores | PCA";
?>


<!DOCTYPE html>
<html lang="en">
<head>
<?php include("head.php");?>
</head>
<body>

<?php
	include("navbar.php");
?> 

<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
				<button type='button' class="btn btn-info" data-toggle="modal" data-target="#nuevoProfesor"><span class="glyphicon glyphicon-plus" ></span> Nuevo Profesor</button>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Buscar Profesores</h4>
		</div>
		<div class="panel-body">
		
			
			
			<?php
				include("modal/registro_profesor.php");
				include("modal/editar_profesor.php");
			?>
			<form class="form-horizontal" role="form" id="datos_profesor">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label">Profesor</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="Nombre del Profesor" onkeyup='load(1);'>
							</div>
							<div class="col-md-3">
								<button type="button" class="btn btn-default" onclick='load(1);'>
									<span class="glyphicon glyphicon-search" ></span> Buscar</button>
								<span id="loader"></span>
							</div>
							
						</div>
				
				
				
			</form>
			<div id="resultados"></div><!-- Carga los datos  -->
			<div class='outer_div'></div><!-- Carga los datos  -->		
			
  </div>
</div>
		 
	</div>

<hr>
<?php
include("footer.php");
?>
<script type="text/javascript" src="js/profesores.js"></script>
</body>
</html>