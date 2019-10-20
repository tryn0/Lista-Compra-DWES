# Lista-Compra-DWES
Trabajo DWES-2º DAW-Lista de Compra  
Este proyecto contiene la página principal del trabajo compra.php  
que según la opción elegida:  
- [] Mostrar lista
- [] Insertar
- [] Modificar
- [] Eliminar  


Cargará un archivo u otro, por ahora solo exite código  
para mostrar e insertar, pero modificar y eliminar  
solo tendran que cargar la lista de la página principal,  
en la opción de modificar aun tengo que pensar cómo mostrarlo  
y según cómo se vea modificarlo, pero será que el usuario modifique lo que quiera  
guarde esa lista de objetos y al darle al botón volver pase  
con un hidden esa lista a la página principal.
Y la opción de eliminar parecida, le pasa esa lista a eliminar.php  
y aun nosé cómo mostrarlo pero al elegir alguno, ese objeto   
es eliminado de la lista y le pasa la nueva lista a la página principal y ya.  
Para facilitar este trabajo tengo que guardar las cosas en una lista de listas.  
Por ejemplo: 
arrayDeArrays{
	kiwi{2,0.50},
	peras{5,0.30}
	ETC...}


Así para modificar o eliminar, convierto los datos a una lista  
busca el nombre del objeto, si está, carga los datos del nombre de esa lista  
y si es para modificar carga los datos tanto del nombre de la lista como de los datos de esta  
y luego paso a string y con un boton volver lo paso a la página principal.  
Si es para eliminar, elimino la lista con el nombre del producto y ya estaría.  
Otra opcion es hacer una lista de listas, y en vez de poner Lista{NombreObjeto{dato1,dato2}...}  
Hacer Lista{key1{nombreObjeto,dato1,dato2}...}, así al mostrar la lista se muestra la key tambien  
y para modificar y eliminar pida la key, y que cargue/elimine los datos de esa key.
