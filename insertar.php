<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			//Controlo si ya traía objetos antiguos
			if(!empty($_POST['todosLosObjetos'])){
				$objetos = explode(',', $_POST['todosLosObjetos']);
			}
			//Controlo si he pulsado enviarInsertar, nombreInsertar, cantidadInsertar y precioInsertar estén vacíos
			if(!isset($_POST['enviarInsertar']) && empty($_POST['nombreInsertar']) && empty($_POST['cantidadInsertar']) && empty($_POST['precioInsertar'])){
				
				?>
				<form name="insertacion" method="POST" action="insertar.php">
					<table>
						<tr>
							<td>Artículo:</td>
							<td><input type="text" name="nombreInsertar" placeholder="Nombre del artículo"></td>
						</tr>
						<tr>
							<td>Cantidad:</td>
							<td><input type="number" name="cantidadInsertar" min="0" step=".01" placeholder="Cantidad"></td>
						</tr>
						<tr>
							<td>Precio:</td>
							<td>
								<input type="number" name="precioInsertar" min="0" step=".01" placeholder="Precio unitario del articulo">
								<?php
								if(!empty($objetos)){
									?>
									<input type="hidden" name="objetosAnteriores" value="<?php echo implode(',', $objetos);?>">
									<?php
								}
								?>
								<input type="hidden" name="listaInsertar" value="<?php echo implode(",",$arrayObjetos);?>">
							</td>
						</tr>
						<tr>
							<td><input type="submit" name="enviarInsertar" value="Guardar artículo"></td>
						</tr>
					</table>
				</form>
				<?php
			}//Sino lo están controlo si la lista de objetos está vacía, y si se ha introducido algún articulo
			elseif(isset($_POST['enviarInsertar']) && !empty($_POST['nombreInsertar']) && !empty($_POST['nombreInsertar']) != "" && $_POST['cantidadInsertar'] > 0 && !empty($_POST['cantidadInsertar']) && $_POST['precioInsertar'] > 0&& !empty($_POST['precioInsertar'])){
				if(empty($_POST['listaInsertar'])){
					if($_POST['nombreInsertar'] != "" && $_POST['cantidadInsertar'] != "" && $_POST['precioInsertar'] != ""){
						//Y lo añado a la lista arrayObjetos los datos introducidos
						$arrayObjetos[] = $_POST['nombreInsertar'];
						$arrayObjetos[] = $_POST['cantidadInsertar'];
						$arrayObjetos[] = $_POST['precioInsertar'];
						//Y los muestro
						print 'Ha comprado '.$arrayObjetos[1].' '.$arrayObjetos[0].' a '.$arrayObjetos[2].'&euro; cada unidad.';
					}else{
						//Sino creo una lista y le digo que no ha introducido un dato correcto.
						$arrayObjetos = array();
						print 'No ha introducido nombre/cantidad/precio correctamente.';
					}
				}
				//Si hay articulos en la lista, los fusiono para que se añada el nuevo articulo a la lista de articulos
				if(!empty($_POST['objetosAnteriores'])){
					$todosLosObjetos2 = array_merge((explode(',', $_POST['objetosAnteriores'])),$arrayObjetos );
				}else{
					//Sino hay articulos antiguos, cambio de nombre la lista
					$todosLosObjetos2 = $arrayObjetos;
				}				
				?>
				<form method="POST" action="compra.php">
					<input type="hidden" name="objetoIntroducido" value="<?php echo implode(",",$todosLosObjetos2);?>">
					<input type="submit" name="volver" value="Volver">
				</form>
				<?php
			}else{
				print 'No ha introduco los datos del artículo correctamente.';
				?>
				<form method="POST" action="compra.php">
					<input type="hidden" name="objetoIntroducido" value="<?php echo $_POST['objetosAnteriores'];?>">
					<input type="submit" name="volver" value="Volver">
				</form>
				<?php
			}
		?>
	</body>
</html>