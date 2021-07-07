# IIC2413-Entrega3-BDD-G64-G125

## Agregar Personal a Usuarios:
Para este punto ocupamos procesamiento de datos para agregar al personal del grupo par al grupo impar.
En el archivo `add_personal.php` consultamos por el personal que esta en la tabla Personal del grupo par y se agregan a la base de datos del grupo impar con los siguientes procedimientos:

  - `add_user.sql`: agrega datos de personal a tabla usuarios.
  - `add_direccion.sql`: agrega direccion de unidad correspondiente a la tabla de direcciones del grupo impar.
  - `add_user_direccion.sql`: agrega la relacion entre el personal y su direccion.

En el procedimiento `add_user.sql` se verifica que el rut no este ingresado y también se verifica que exista una columna de password, si no existe se crea una y se le asigna a todos los usuarios que ya están en la base de datos una contraseña de valor 'pass'. Para todos los usuarios que se agregan después, se les asigna una contraseña con valor 'pass_new'.

Para agregar el personal a usuarios y asignar contraseñas se puede ingresar a la pagina `http://codd.ing.puc.cl/~grupo64/queries/personal_usuario.php` apretar el boton agregar y se realizará todo el procedimiento explicado anteriormente.

## Login y Signup:

Para iniciar sesion con alguún usuario que ya estaba en la base de datos del grupo impar se debe ocupar el rut y la contraseña que es 'pass'. 
Si se quiere iniciar sesion con un personal se debe usar el rut y la contraseña 'pass_new'.

Para el signup se deben completar los datos que se muestran en la pagina y usar un rut que no esté registrado. Si el rut ya está registrado se notificará en la pagina.

## Funcionalidades Adicionales:

La primera funcinalidad que agregamos sirve para agregar una nueva dirección. En el perfil y en la parte donde veo mis direcciones hay un botón para agregar dirección. Eso te llevará a un formulario donde podrás ingresar todos los datos de la nueva dirección.

Y la segunda sirve para filtrar los productos de la tienda por tipo. En la sección `http://codd.ing.puc.cl/~grupo64/consultas/consulta_tienda.php`, esta el botón `Ver Productos`, que muestra todos los productos disponibles en la tienda. Aquí puedes filtrar por palabra escribiendo tal como piden en el enunciado y también damos la opción de filtrar por tipo.

El proceso para filtrar es seleccionar tipo y escribir una palabra o realizar solo uno de los dos. Apretar el botón `Filtrar` y luego apretar `Ver Productos` para ver los productos ya filtrados.