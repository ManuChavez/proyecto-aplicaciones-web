<?php
require('conexion.php');
$db= new Conexion();
$dato= $db->escape_string($_POST['dato']);
echo $dato;

    $registro= $db->query("SELECT idPedido,detallePedido,fechaInicioPedido,fechaTerminoPedido,nombreCliente
           FROM pedido
           WHERE idPedido like '$dato'
           INNER JOIN cliente
           ON pedido.rutCliente=cliente.rutCliente");
	
  echo '<table class="table table-hover table-bordered text-center">
    		<tr>
      			<th>id</th>
      			<th>Cliente</th>
      			<th>Fecha Inicio</th>
      			<th>Fecha Termino</th>
      			<th>Detalle</th>
    		</tr>';          
 	
 	 $nfilas = $db->rows($registro);
                       

                        if ($nfilas > 0){
                            for ($i=0; $i<$nfilas; $i++) {
                               
                                $datos = $db->recorrer($registro);
                            
                               echo '<tr id="filaDatosPedido'.$datos['idPedido'].'">
                                <td>'.$datos['idPedido'].'</td>
                                <td>'.$datos['nombreCliente'].'</td>
                                <td>'.$datos['fechaInicioPedido'].'</td>
                                <td>'.$datos['fechaTerminoPedido'].'</td>
                                <td>'.$datos['detallePedido'].'</td>

                          </tr>';
                            }
                        
 }else{
 	
  echo '<tr>
 			<td colspan="5">No se Encontraron Resultados</td>
 		  </tr>';
 }  	

echo '</table';

?>