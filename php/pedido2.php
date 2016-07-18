						<?php 
						
						require('conexion.php');
						
						$db = new Conexion();   
						
						$id = $_POST['in-id'];
						$detalle = $_POST['detalle'];
						$fechaini = $_POST['in-fechaini'];
						$fechater = $_POST['in-fechater'];
						$nombres = $_POST['nombres'];
						
						$db->query("INSERT INTO pedido VALUES ('$id','$detalle','$fechaini','$fechater','$nombres');");
						

						header("location: pedido.php");
						?>