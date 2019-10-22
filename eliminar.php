<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
		//Controlo si la lista de objetos que entra está llena o no hay nada, en caso de haber algo la pasa a lista con explode para que cargue en el hidden
		if(!empty($_POST['todosLosObjetos'])){
				$objetos = explode(',', $_POST['todosLosObjetos']);
		}
		//Controlo si he pulsado buscador y el nombre que busco no es nada o si no está vacío, si verdad, busca el objeto en el array y si está lo elimina
		if(isset($_POST['buscador']) && $_POST['buscarNombre'] != "" || !empty($_POST['buscarNombre'])){
			$listaObjetos = explode(',',$_POST['objetosAnteriores']);
			$posicion = array_search($_POST['buscarNombre'],$listaObjetos);
			if(!is_numeric($posicion)){
				print 'No se encontró el objeto en la lista';
			}else{
				print $_POST['buscarNombre'].' ha sido eliminado junto a sus datos.<br>';
				for($num = 0; $num <= 2; $num++){
					unset($listaObjetos[$posicion+$num]);
				}
			}//Volver a la página principal con la lista sin el articulo eliminado
			?>
			<form name="volver" method="POST" action="compra.php">
				<input type="hidden" name="listaEliminada" value="<?php echo implode(',',$listaObjetos);?>">
				<input type="submit" name="volver" value="Volver">
			</form>
			<?php
			//Si entro a la opcion eliminar pero sin nigún articulo en la lista se advierte de que no hay nada y volver a la página principal
		}elseif(empty($_POST['todosLosObjetos']) && !isset($_POST['buscador'])){
			print 'Aun no ha realizado ninguna compra.'
			?>
			<form name="volver" method="POST" action="compra.php">
				<input type="submit" name="volver" value="Volver">
			</form>
			<?php
		}else{//Esto es la parte del formulario donde pones el nombre del articulo a borrar, entra aquí si no he pulsado buscador y trae articulos de la página principal
			?>
				<form name="buscar" method="POST" action="eliminar.php">
					<table>
						<tr>
							<td>Artículo:</td>
							<td><input type="text" name="buscarNombre" placeholder="Nombre del artículo"></td>
							<input type="hidden" name="objetosAnteriores" value="<?php if(!empty($_POST['todosLosObjetos'])){echo implode(',', $objetos);}elseif(!empty($_POST['objetosAnteriores'])){echo $_POST['objetosAnteriores'];}?>">
							<input type="hidden" name="objetosPrincipal" value="<?php echo implode(',',$objetos);?>">
						</tr>
						<tr>
							<td><!--BOTÓN BUSCADOR AQUÍ-->
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