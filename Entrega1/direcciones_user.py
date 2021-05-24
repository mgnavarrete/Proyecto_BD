import random

def print_file(file, id_usuario, id_direccion, direcciones, comunas, used_adress):
    direccion = random.choice(direcciones)
    comuna = random.choice(comunas)
    if direccion not in used_adress:
       file.write(f"{id_direccion},{direccion},{comuna},{id_usuario}\n")
       used_adress.append(direccion)
    else:
        print_file(file, id_usuario, id_direccion, direcciones, comunas, used_adress)

def tabla_direcciones(nro_usuarios, used_adress):

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


    file = open('tablas/direcciones_usuarios.csv', 'w')
    file.write("id_direccion,direccion,comuna,id_usuario\n")
    id_direccion = 0
    for id_usuario in range(0,nro_usuarios):
        num_direcciones = random.randint(1,3)
        count = 0
        while count < num_direcciones:
            print_file(file, id_usuario, id_direccion, direcciones, comunas, used_adress)
            count += 1
            id_direccion += 1

    file.close()
            