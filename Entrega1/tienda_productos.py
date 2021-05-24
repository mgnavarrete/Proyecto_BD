import random

def tienda_productos(nro_tiendas):
    file = open('tablas/productos.csv')
    id_productos = []

    for i in file:
        id, nombre, precio, descripcion = i.strip("\n").split(',')
        id_productos.append(id)
    nombre, precio, descripcion = nombre, precio, descripcion

    file = open('tablas/tienda_productos.csv', 'w')
    file.write('id_tienda,id_producto\n')

    for id in range(0,nro_tiendas):
        num_productos = random.randint(1,len(id_productos))
        count = 0
        productos_tienda = []
        while count < num_productos:
            id_producto = random.choice(id_productos)
            if id_producto not in productos_tienda and id_producto != 'id_producto':
                file.write(f"{id},{id_producto}\n")
                productos_tienda.append(id_producto)
                count += 1
    file.close()