<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Trabajo</title>
	</head>
	<body>
		<?php
		//Verifico si se ha pulsado enviar y he elegido algun checkbox
		if(isset($_POST['enviar']) && isset($_POST['opcion-compra'])){
			$elegido = $_POST['opcion-compra'];
			//Las distintas opciones y sus respectivos .php
			switch ($elegido) {
				case 'mostrar':
					include 'mostrar.php';
					break;

				case 'insertar':
					include 'insertar.php';
					break;

				case 'modificar':
					include 'modificar.php';
					break;

				case 'eliminar':
					include 'eliminar.php';
					break;
			}
		}else{
		?>
		<form name="opciones" method="POST" >
			Qué desea hacer:<br>
			<table>
				<tr>
					<td>Mostrar lista</td>
					<td><input type="radio" name="opcion-compra" value="mostrar"></td>
				</tr>
				<tr>
					<td>Insertar</td>
					<td><input type="radio" name="opcion-compra" value="insertar"></td>
				</tr>
				<tr>
					<td>Modificar</td>
					<td><input type="radio" name="opcion-compra" value="modificar" ></td>
				</tr>
				<tr>
					<td>Eliminar</td>
					<td><input type="radio" name="opcion-compra" value="eliminar"></td>
				</tr>
				<tr>
					<td>
						<input type="hidden" name="todosLosObjetos" value="<?php //Aquí controlo cuál de las listas de objetos carga, dependiendo de dónde vengas carga una u otra
																				if(!empty($_POST['objetoIntroducido'])){
																					echo $_POST['objetoIntroducido'];
																				}elseif(!empty($_POST['volverPrincipio'])){
																					echo $_POST['volverPrincipio'];
																				}elseif(!empty($_POST['todosLosObjetos'])){
																					echo $_POST['todosLosObjetos'];
																				}elseif(!empty($_POST['listaModificadaFinal'])){
																					echo $_POST['listaModificadaFinal'];
																				}elseif(!empty($_POST['listaEliminada'])){
																					echo $_POST['listaEliminada'];
																				}elseif(!empty($_POST['listaModificadaNO'])){
																					echo $_POST['listaModificadaNO'];
																				} ?>">
						<input type="submit" name="enviar" value="Seleccionar">
					</td>
				</tr>
			</table>
		</form>
		<?php
		}
		?>
	</body>
</html>