import random


def print_file(file,nro_personal, id, comunas, direcciones, nombre_tiendas, used_name, used_adress, id_users):
    comuna = random.choice(comunas)
    direccion = random.choice(direcciones)
    nombre = random.choice(nombre_tiendas)
    user = id_users[id+1]

    if nombre not in used_name and direccion not in used_adress:
       file.write(f"{id},{nombre},{direccion},{comuna},{user}\n")
       used_name.append(nombre)
       used_adress.append(direccion)
    else:
        print_file(file, nro_personal, id, comunas, direcciones, nombre_tiendas, used_name, used_adress, id_users)


def tabla_tiendas(nro_tiendas, nro_personal, used_shop_names, used_adress):       
    file  = open('datos/nombre_tiendas.txt', 'r')
    nombre_tiendas = []
    for i in file:
        i = i.strip("\n")
        nombre_tiendas.append(i)
    file.close()

    file  = open('datos/direcciones.txt', 'r')
    direcciones = []
    for i in file:
        i = i.strip("\n")
        direcciones.append(i)
    file.close()

    com  = open('datos/comunas.txt', 'r')
    comunas = []
    for i in com:
        i = i.strip("\n")
        comunas.append(i)
    com.close()

    file = open('tablas/personal.csv')
    id_users = []
    otros = []

    for i in file:
        id, nombre, rut, edad, sexo, id_tienda = i.strip("\n").split(',')
        id_users.append(id)
        otros.append(id_tienda)
    nombre, rut, edad, sexo, id_tienda = nombre, rut, edad, sexo, id_tienda

    file = open('tablas/tiendas.csv', 'w')
    file.write("id_tienda,nombre,direccion,comuna,id_jefe\n")

    for id in range(0,nro_tiendas):
        print_file(file, nro_personal, id, comunas, direcciones, nombre_tiendas, used_shop_names, used_adress, id_users)

    file.close()  
   
   



