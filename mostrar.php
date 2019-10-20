<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
		if(!empty($_POST['todosLosObjetos'])){
			print "Hay cosas en la cesta todosLosObjetos: <br>";
			$objetos = explode(",", $_POST['todosLosObjetos']);
			$contador = 0;
			foreach ($objetos as $value) {
				if($contador == 3){
					print '<br>';
					$contador = 0;
				}
				print $value." ";
				$contador++;
			}
		?>
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