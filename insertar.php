<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			if($_POST['todosLosObjetos'] != null){
				var_dump($_POST['todosLosObjetos']);
			}
			if(!empty($_POST['todosLosObjetos'])){
				print 'todosLosObjetos no está vacía.';
				$objetos = explode(',', $_POST['todosLosObjetos']);
			}else{
				print 'todosLosObjetos está vacía.';
			}
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
									print "objetos NO esta vacia";
									?>
									<input type="hidden" name="objetosAnteriores" value="<?php echo implode(',', $objetos);?>">
									<?php
								}else{
									print "objetos SI esta vacia";
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
			}else{
				if(empty($_POST['listaInsertar'])){

					$arrayObjetos[] = $_POST['nombreInsertar'];
					$arrayObjetos[] = $_POST['cantidadInsertar'];
					$arrayObjetos[] = $_POST['precioInsertar'];
					
				}

				print "Ha insertado:<br>";
				print 'Ha comprado '.$arrayObjetos[1].' '.$arrayObjetos[0].' a '.$arrayObjetos[2].'&euro; cada unidad.';

				if(!empty($_POST['objetosAnteriores'])){
					$todosLosObjetos2 = array_merge( (explode(',', $_POST['objetosAnteriores'])),$arrayObjetos );
				}else{
					$todosLosObjetos2 = $arrayObjetos;
				}
				
				?>
				<form method="POST" action="index.html">
					<input type="hidden" name="objetoIntroducido" value="<?php echo implode(",",$todosLosObjetos2);?>">
					<input type="submit" name="volver" value="Volver">
				</form>
				<?php
			}
		?>
	</body>
</html>