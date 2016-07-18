<?php
session_start();
if ($_SESSION["on"] != true){
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
		<title>Pedidos</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/pedido.css">
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
      <a class="navbar-brand">Costurería Virtual</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="inicio.php"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
        <li><a href="cliente.php"><span class="glyphicon glyphicon-plus-sign"></span> Clientes</a></li>
        <li class="active"><a href="pedido.php"><span class="glyphicon glyphicon-book"></span> Pedidos</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><h4><span class="glyphicon glyphicon-user"></span><?php echo " Bienvenido ".$_SESSION['nombre']."" ;?></h4></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>
    
<div class="container">    
    <div class="col-sm-4" >
    	<form role="form" method="POST" action="pedido2.php">
        <h3>Ingreso de pedidos</h3>
                    
                    <div class="form-group">
                        
                        <label for="exampleInputEmail1">
                            Cliente:
                        </label>
						
						
						<?php
                        require('conexion.php');
                        $db = new Conexion();   
						$sentencia = $db->query("SELECT * FROM cliente");
						$filas= $db->rows($sentencia);
						?>
						<select class="btn btn-default" name="nombres" size="0">
						<?php if($filas>0){
	                        	 	for($i=0 ; $i<$filas ; $i++){ 
	                        	 		$datoss= $db->recorrer($sentencia); 
	                        ?>
	                        			<option value=<?php echo $datoss['rutCliente']; ?> > <?php echo $datoss['nombreCliente'] ?></option>
							<?php 	} 
								  } 
							?>
						</select>
						
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Ingrese Fecha Inicio:   
                        </label>
                        <input name="in-fechaini" type="date" placeholder="Fecha Inicio" class="form-control" required  />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Ingrese Fecha Termino:
                        </label>
                        <input name="in-fechater" type="date" placeholder="Fecha Termino" class="form-control" required  />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Ingrese Detalle:
                        </label>
                        <textarea name="detalle">Escribe aquí el Detalle</textarea>
                    </div>
                    <div class="col-sm-4"></div>
                   <button class="btn btn-lg btn-success" type="submit" ><span class="glyphicon glyphicon-plus-sign"></span> Agregar</button>
                </form>
      
    </div>

    <div class="col-sm-8">
        <div class="row">
            <h3>Lista de Pedidos</h3>
        </div>
            <div class="row" id="formu">
                <!-- TABLA -->
                <table class="table table-hover table-bordered text-center" >
                    <!-- Cabeza tabla -->
                    <thead>
                        <tr>
                          <th>Id</th>
                          <th>Cliente</th>
                          <th>Fecha Inicio</th>
                          <th>Fecha Termino</th>
                          <th>Detalle</th>
                          <th>Opciones</th>
                        </tr>
                    </thead>
                    <!-- Cuerpo tabla -->
                    <tbody>
                      <?php 
						//$sql = $db->query("SELECT * FROM pedido");
						$sql=$db->query("SELECT idPedido,detallePedido,fechaInicioPedido,fechaTerminoPedido,nombreCliente
										FROM pedido
										INNER JOIN cliente
										ON pedido.rutCliente=cliente.rutCliente");
                        $nfilas = $db->rows($sql);
                       

                        if ($nfilas > 0){
                            for ($i=0; $i<$nfilas; $i++) {
                               
                                $datos = $db->recorrer($sql);
                            
                                echo '<tr>';
                                echo '<td>'. $datos['idPedido'] . '</td>';
                                echo '<td>'. $datos['nombreCliente'] . '</td>';
                                echo '<td>'. $datos['fechaInicioPedido'] . '</td>';
                                echo '<td>'. $datos['fechaTerminoPedido'] . '</td>';
                                echo '<td>'. $datos['detallePedido'] . '</td>';
                                echo '<td>'. '<a href="eliminar.php?idPedido='. $datos ['idPedido'] .'">Eliminar</a>' .'</td>';
                            }
                        }
                      ?>
                    </tbody>
                </table>
            </div>  
    </div> 
    
 
 </div>   
    
        
    

</body>
</html>
