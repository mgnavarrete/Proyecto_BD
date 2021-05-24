import random
from comunas import tienda_comunas
from personal import tabla_personal
from tiendas import tabla_tiendas
from usuarios import tabla_usuarios
from direcciones_user import tabla_direcciones
from productos import productos
from tienda_productos import tienda_productos
from compras import compras

nro_tiendas = 20
nro_personal = 50
nro_usuarios = 50
nro_compras = 200

used_user_names = []
used_shop_names = []
used_adress = []
used_rut = []

# CCREAMOS TABLA TIENDA-DESPACHO
tienda_comunas(nro_tiendas)

# CREAMOS TABLA PERSONAL
tabla_personal(nro_tiendas, nro_personal, used_user_names,used_rut)

# CREAMOS TABLAS TIENDA
tabla_tiendas(nro_tiendas, nro_personal, used_shop_names, used_adress)

# CREAMOS TABLA DE USUARIOS
tabla_usuarios(nro_usuarios, used_user_names,used_rut)

# CREAMOS TABLA USUARIO_DIRECCIONES
tabla_direcciones(nro_usuarios, used_adress)

# CREAR TABLA PRODUCTOS
productos()

# CREAR TABLA TIENDA_PRODUCTOS
tienda_productos(nro_tiendas)

# CREAR TABLA COMPRAS
compras(nro_compras, nro_usuarios, nro_tiendas)