<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	
	$active_registro="";
	$active_materias="";
	$active_alumnos="";
	$active_profesores="";	
	$active_matriculas="active";	
	$title="Matriculas | PCA";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalabre=no, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<title></title>
</head>
<body>
<?php
	include("navbar.php");
?> 
<h1>ESTE ES MATRICULAS</h1>

<hr>
<?php
include("footer.php");
?>
</body>
</html>