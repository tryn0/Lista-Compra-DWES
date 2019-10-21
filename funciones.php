<?php
function Calcular_Precio_Total($cantidad,$precio){
	$precio_total = $cantidad*$precio;
	return $precio_total;
}
function Calcular_Precio_Total_Compra($array){
	$precioTotalFinal = 0;
	foreach ($array as $value) {
		$precioTotalFinal += $value;
	}
	return $precioTotalFinal;
}
?>