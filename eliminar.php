<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
		if(!empty($_POST['todosLosObjetos'])){
				$objetos = explode(',', $_POST['todosLosObjetos']);
			}
		if(isset($_POST['buscador']) && $_POST['buscarNombre'] != "" || !empty($_POST['buscarNombre'])){
			$listaObjetos = explode(',',$_POST['objetosAnteriores']);
			$posicion = array_search($_POST['buscarNombre'],$listaObjetos);
			if ($posicion == null) {
				print 'No se encontró el objeto en la lista';
			}else{
				print $_POST['buscarNombre'].' está en la posición '.$posicion.' de la lista y ha sido eliminado junto a sus datos.<br>';
				for($num = 0; $num <= 2; $num++){
					unset($listaObjetos[$posicion+$num]);
				}
			}
			?>
			<form name="volver" method="POST" action="compra.php">
				<input type="hidden" name="listaModificada" value="<?php echo implode(',',$listaObjetos);?>">
				<input type="submit" name="volver" value="Volver">
			</form>
			<?php
		}else{
			?>
				<form name="buscar" method="POST" action="eliminar.php">
					<table>
						<tr>
							<td>Artículo:</td>
							<td><input type="text" name="buscarNombre" placeholder="Nombre del artículo"></td>
							<input type="hidden" name="objetosAnteriores" value="<?php echo implode(',', $objetos);?>">
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