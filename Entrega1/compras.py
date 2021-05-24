import random

def compras(nro_compras, nro_usuarios, nro_tiendas):

    file = open('tablas/direcciones_usuarios.csv', 'r')
    id_direcciones = []
    id_users = []

    for i in file:
        id_direccion, direccion, comuna, id_user = i.strip("\n").split(',')
        id_direcciones.append(id_direccion)
        id_users.append(id_user)
        direccion, comuna = direccion, comuna
    file.close()

    file = open('tablas/tienda_productos.csv', 'r')
    id_tiendas = []
    id_productos = []

    for i in file:
        id_tienda, id_producto = i.strip("\n").split(',')
        id_tiendas.append(id_tienda)
        id_productos.append(id_producto)
    file.close()

    id_users.remove("id_usuario")
    id_tiendas.remove("id_tienda")
    file = open('tablas/compras.csv', 'w')
    file.write("id_compra,id_user,id_direccion,id_producto,id_tienda\n")

    for id_compra in range(0,nro_compras):
        id_user = random.randint(0, nro_usuarios)
        find_user = []
        id_tienda = random.randint(0, nro_tiendas)
        find_tienda = []

        for i in enumerate(id_users):
           
            if int(i[1]) == id_user:
                find_user.append(i[0])
        for i in enumerate(id_tiendas):
            if int(i[1]) == id_tienda:
                find_tienda.append(i[0])

        if len(find_tienda) != 0 and len(find_user) != 0:
            id_direccion = id_direcciones[random.choice(find_user)]
            id_producto = id_productos[random.choice(find_tienda)]
        
            file.write(f'{id_compra},{id_user},{id_direccion},{id_producto},{id_tienda}\n')

    file.close()



