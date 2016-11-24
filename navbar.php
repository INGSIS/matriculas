  <?php
    if (isset($title))
    {
  ?>
<nav class="navbar navbar-default ">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="registro.php">MATRICULAS</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php echo $active_matriculas;?>"><a href="matriculas.php"><i class='glyphicon glyphicon-list-alt'></i> Matriculas<span class="sr-only">(current)</span></a></li>
        <li class="<?php echo $active_materias;?>"><a href="materias.php"><i class='glyphicon glyphicon-barcode'></i> Materias</a></li>
    <li class="<?php echo $active_alumnos;?>"><a href="alumnos.php"><i class='glyphicon glyphicon-user'></i> Alumnos</a></li>
    <li class="<?php echo $active_profesores;?>"><a href="profesores.php"><i  class='glyphicon glyphicon-lock'></i> Profesores</a></li>
   <!-- configuracion -->
  
    </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="https://www.pca.edu.co/" target='_blank'><i class='glyphicon glyphicon-envelope'></i> Soporte</a></li>
    <li><a href="login.php?logout"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
      </ul>
    </div>
  </div><!-- /.container-fluid -->
</nav>
  <?php
    }
  ?>