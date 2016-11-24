<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos

	$active_registro="active";
	$active_materias="";
	$active_alumnos="";
	$active_profesores="";	
	$active_matriculas="";	
	$title="Inicio | PCA";
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

<div class="page-header">
	<h1 align="center">BIENVENIDO AL SISTEMA DE MATRICULA ACADEMICA</h1>
	<h1 align="center"><small>Sistema Desarrollado para Parcial Electiva III</small></h1>
	<h1 align="center"><small>Politecnico Costa Atlantica</small></h1>
</div>
<div class="container" align="center">
	<div class="row">
	  <div class="col-sm-6 col-md-3">
	    <div class="thumbnail">
	      <img src="img/alumno.png" alt="Alumnos" height="100" width="100">
	      <div class="caption">
	        <h3>Alumnos</h3>
	        <p>Consulte y/o Agregue alumnos</p>
	        <p>
	          <a href="alumnos.php" class="btn btn-primary" role="button">Ir</a>
	        </p>
	      </div>
	    </div>
	  </div>

	 <div class="col-sm-6 col-md-3">
	    <div class="thumbnail">
	      <img src="img/profesor.png" alt="Alumnos" height="90" width="70">
	      <div class="caption">
	        <h3>Profesores</h3>
	        <p>Consulte y/o Agregue Profesores</p>
	        <p>
	          <a href="profesores.php" class="btn btn-primary" role="button">Ir</a>
	        </p>
	      </div>
	    </div>
	  </div>
	  
	  	<div class="col-sm-6 col-md-3">
	    <div class="thumbnail">
	      <img src="img/matricula.png" alt="Alumnos" height="100" width="100">
	      <div class="caption">
	        <h3>Matriculas</h3>
	        <p>Consulte y/o Agregue Matriculas</p>
	        <p>
	          <a href="matriculas.php" class="btn btn-primary" role="button">Ir</a>
	        </p>
	      </div>
	    </div>
	  </div>
	  
	    <div class="col-sm-6 col-md-3">
	    <div class="thumbnail">
	      <img src="img/materias.png" alt="Alumnos" height="100" width="100">
	      <div class="caption">
	        <h3>Materias</h3>
	        <p>Consulte y/o Agregue Materias</p>
	        <p>
	          <a href="materias.php" class="btn btn-primary" role="button">Ir</a>
	        </p>
	      </div>
	    </div>
	  </div>


	 
	</div>
</div>


<hr>
	<?php
	include("footer.php");
	?>
</body>
</html>