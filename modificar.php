<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
		//Controlo si trae objetos antiguos
		if(!empty($_POST['todosLosObjetos'])){
				$objetos = explode(',', $_POST['todosLosObjetos']);
		}
		//Controlo si se ha pulsado modificadorFinal y si los datos del articulo a modificar son correctos
		if(isset($_POST['modificadorFinal']) && $_POST['nombreArticulo'] != "" || !empty($_POST['nombreArticulo']) && $_POST['cantidadArticulo'] != "" || !empty($_POST['cantidadArticulo']) && $_POST['precioArticulo'] != "" || !empty($_POST['precioArticulo'])){
			if($_POST['nombreArticulo'] != "" && !empty($_POST['nombreArticulo']) && !empty($_POST['cantidadArticulo']) && $_POST['cantidadArticulo'] > 0 && !empty($_POST['precioArticulo']) &&$_POST['precioArticulo'] > 0){
				//var_dump($_POST['listaModificada']);
				//Si lo son, actualizo los datos de la lista
				$cosas = explode(',',$_POST['listaModificada']);
				$posicionesFinal = explode(',',$_POST['posicionesObjetos']);
				$contador = 0;
				foreach ($posicionesFinal as $value) {
					if($contador == 0){
						$cosas[$value] = $_POST['nombreArticulo'];
					}elseif($contador == 1){
						$cosas[$value] = $_POST['cantidadArticulo'];
					}elseif($contador == 2){
						$cosas[$value] = $_POST['precioArticulo'];
					}
					$contador++;
					
				}
				print 'El artículo ha sido actualizado correctamente';
				?>
				<form name="volver" method="POST" action="compra.php">
					<input type="hidden" name="listaModificadaFinal" value="<?php echo implode(',',$cosas);?>">
					<input type="submit" name="volver" value="Volver">
				</form>
				<?php
			}else{//Sino son correctos los datos del articulo a modificar advierto del error y lo mando a la página principal
				print 'No ha introducido un nombre, una cantidad o un precio correctos.';
				?>
				<form name="volver" method="POST" action="compra.php">
					<input type="hidden" name="listaModificadaFinal" value="<?php echo $_POST['listaModificada'];?>">
					<input type="submit" name="volver" value="Volver">
				</form>
				<?php
			}
		}elseif(isset($_POST['buscador']) && $_POST['buscarNombre'] != "" || !empty($_POST['buscarNombre'])){//Sino se ha pulsado modificadorFinal y los datos son correctos
			$listaObjetos = explode(',',$_POST['objetosAnteriores']);//Este elseif es el buscador del articulo en la lista de objetos que le entra desde la página principal
			$posicion = array_search($_POST['buscarNombre'],$listaObjetos);//Obtengo la posicion del articulo a buscar
			if(is_numeric($posicion)){//Si está en la lista devuelve un entero, que significa que está en la lista
				print $_POST['buscarNombre'].' está en la posición '.$posicion.' de la lista y ha sido eliminado junto a sus datos.<br>';
				$articulo = $listaObjetos[$posicion];
				$cantidad = $listaObjetos[$posicion+1];
				$precio = $listaObjetos[$posicion+2];
				$posiciones[] = $posicion;
				$posiciones[] = $posicion+1;
				$posiciones[] = $posicion+2;
				//Si está en la lista obtengo sus datos y sus posiciones para guardarlas
				//Y en este formulario cargo sus datos y en los hidden paso las posiciones y la lista de objetos antiguos
				?>
				<form name="modificar" method="POST" action="modificar.php">
					<table>
						<tr>
							<td>Artículo:</td>
							<td><input type="text" name="nombreArticulo" value="<?php echo $articulo;?>"></td>
						</tr>
						<tr>
							<td>Cantidad:</td>
							<td><input type="text" name="cantidadArticulo" value="<?php echo $cantidad;?>"></td>
						</tr>
						<tr>
							<td>Precio:</td>
							<td><input type="text" name="precioArticulo" value="<?php echo $precio;?>"></td>
						</tr>
						<tr>
							<td>
								<input type="hidden" name="posicionesObjetos" value="<?php echo implode(',',$posiciones);?>">
								<input type="hidden" name="listaModificada" value="<?php echo implode(',',$listaObjetos);?>">
								<input type="submit" name="modificadorFinal" value="Buscar artículos">
							</td>
						</tr>
					</table>
				</form>
			<?php
			}else{
				//En el caso de que devuelva algo no númerico (bool(false) o NULL) significa que la lista no contiene el articulo
				print 'No se encontró el artículo.';

			?>
			<form name="volver" method="POST" action="compra.php">
				<input type="hidden" name="listaModificadaNO" value="<?php echo $_POST['objetosAnteriores'];?>">
				<input type="submit" name="volver" value="Volver">
			</form>
			<?php
			}//En caso de no tener nada en la lista de objetos y no haber pulsado buscador significa que aun no tiene articulos en la cesta
		}elseif(empty($_POST['todosLosObjetos']) && !isset($_POST['buscador'])){
			print 'Aun no ha realizado ninguna compra.'
			?>
			<form name="volver" method="POST" action="compra.php">
				<input type="submit" name="volver" value="Volver">
			</form>
			<?php
		}else{//Si tiene articulos en la cesta, en este formulario introduce el articulo a buscar
			?>
				<form name="buscar" method="POST" action="modificar.php">
					<table>
						<tr>
							<td>Artículo:</td>
							<td><input type="text" name="buscarNombre" placeholder="Nombre del artículo"></td>
							<input type="hidden" name="objetosAnteriores" value="<?php if(!empty($_POST['todosLosObjetos'])){echo implode(',', $objetos);}elseif(!empty($_POST['objetosAnteriores'])){echo $_POST['objetosAnteriores'];}?>">
							<input type="hidden" name="objetosPrincipal" value="<?php echo implode(',',$objetos);?>">
						</tr>
						<tr>
							<td>
								<input type="submit" name="buscador" value="Buscar artículos">
							</td>
						</tr>
					</table>
				</form>
			<?php
		}
		?>
	</body>
</html>