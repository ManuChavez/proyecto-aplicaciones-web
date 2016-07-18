<?php
session_start();
if ($_SESSION["session"] != true){
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Entrega</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/entrega.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <p class="navbar-brand">Costurería Virtual</p>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="inicio.php"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
        <li><a href="cliente.php"><span class="glyphicon glyphicon-plus-sign"></span> Clientes</a></li>
        <li><a href="pedido.php"><span class="glyphicon glyphicon-book"></span> Pedidos</a></li>
        <li class="active"><a href="entrega.php">Entregas</a></li>
      </ul> 
      <ul class="nav navbar-nav navbar-right">
        <li><h4><span class="glyphicon glyphicon-user"></span><?php echo " Bienvenido ".$_SESSION['nombre']."" ;?></h4></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>

    
</body>
</html>

