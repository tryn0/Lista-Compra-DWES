<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		
		<?php

		include 'funciones.php';

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
					print '<td>'.Calcular_Precio_Total($objetos[$contador1],$objetos[$contador1-1]).'</td>';
					$listaPrecioTotal[] = Calcular_Precio_Total($objetos[$contador1],$objetos[$contador1-1]);
				}
				if($contador1 == count($objetos)-1){

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
			print "No ha realizado ninguna compra.";
		?>
			<form method="POST">
				<input type="submit" name="volver" value="Volver">
			</form>
		<?php
		}
		?>
	</body>
</html>