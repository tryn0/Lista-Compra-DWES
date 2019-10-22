<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		
		<?php
		//Cargo el archivo funciones para el precio total y precio total compra
		include 'funciones.php';
		//Controlo que la lista de articulos no esté vacía, e imprimo la tabla
		if(!empty($_POST['todosLosObjetos'])){
			?>
			<table border="1">
			<tr>
				<th>Nombre Artículo</th>
				<th>Cantidad</th>
				<th>Precio Unitario</th>
				<th>Total</th>
				<th>Precio Final</th>
			</tr>
			<?php
			//Paso el string a lista para recorrearla e imprimir los datos, cada 3 datos salta a otro, ya que 3 objetos en la lista son 1 articulo y sus datos.
			print "Hay cosas en la cesta todosLosObjetos: <br>";
			$objetos = explode(",", $_POST['todosLosObjetos']);
			$contador = 0;
			$contador1 = 0;
			foreach ($objetos as $value) {
				if($contador == 3){
					$contador = 0;
					print '<tr>';
				}
				print '<td>'.$value."</td>";
				if ($contador == 2) {
					//Imprimo el precio total del articulo
					print '<td>'.Calcular_Precio_Total($objetos[$contador1],$objetos[$contador1-1]).'</td>';
					//Aquí guardo el precio total del articulo en una lista para luego
					$listaPrecioTotal[] = Calcular_Precio_Total($objetos[$contador1],$objetos[$contador1-1]);
				}
				//Controlo que contador1 tenga el mismo valor que objetos haya en la lista
				if($contador1 == count($objetos)-1){
					//Imprimo con la funcion precio total compra cuanto valdrá todo en total
					print '<td>'.Calcular_Precio_Total_Compra($listaPrecioTotal).'</td>';
				}
				$contador++;
				$contador1++;
			}
		?>
		</table>
			<form method="POST">
				<input type="hidden" name="volverPrincipio" value="<?php echo implode(",", $objetos);?>">
				<input type="submit" name="volver" value="Volver">
			</form>
		<?php
		}else{
			//Si la lista de articulos está vacía significa que aun no realizó ninguna compra y lo advierto y lo devuelvo a la página principal
			print "Aun no ha realizado ninguna compra.";
		?>
			<form method="POST">
				<input type="submit" name="volver" value="Volver">
			</form>
		<?php
		}
		?>
	</body>
</html>