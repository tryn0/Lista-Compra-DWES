# Lista-Compra-DWES
Trabajo DWES-2º DAW-Lista de Compra  
Este proyecto contiene la página principal del trabajo compra.php  
que según la opción elegida:  
- [x] Mostrar lista
- [x] Insertar
- [] Modificar
- [x] Eliminar  


Cargará un archivo u otro, por ahora solo exite código  
para mostrar,insertar y eliminar, pero modificar será parecido a eliminar  
cargará la lista de objetos, buscaré un elemento en la lista y cargaré  
ese elemento y los dos siguientes (porque son sus datos, cantidad y precio)  
y cargaré cada uno en un input de texto, y al darle a guardar, guardará  
ese objeto y sus datos, aun nose si en la misma posicion o lo añadiré  
al final sin más. Otra opcion es hacer array_search() encontrar su posicion  
cargar los datos en el formulario y con la misma posicion que obtuve con  
array_search() meterlos ahi, por ejemplo:  
$lista[$posicion] = $objetoModificado.  
y así con sus datos tambien.


He añadido el archivo funciones con las funciones de los precios,   
ya que retoqué el archivo mostrar.php para que se viese en su forma final.  
Espero acabarlo pronto...