import random

def print_file(file, id, ruts, jefes, nombres_personas, used_user_names, used_rut):
    rut = random.choice(ruts)
    nombre = random.choice(nombres_personas)
    id_tienda = jefes
    edad = random.randint(17,40)
    sexo = random.choice(['Hombre', 'Mujer'])

    if nombre not in used_user_names and rut not in used_rut:
       file.write(f"{id},{nombre},{rut},{edad},{sexo},{id_tienda}\n")
       used_user_names.append(nombre)
       used_rut.append(rut)
    else:
        print_file(file, id, ruts, jefes, nombres_personas, used_user_names, used_rut)

def tabla_personal(nro_tiendas, nro_personal, used_user_names,used_rut):

    file  = open('datos/ruts.csv', 'r')
    ruts = []
    for i in file:
        i = i.strip("\n")
        ruts.append(i)
    file.close()

    file  = open('datos/nombres_personas.txt', 'r')
    nombres_personas = []
    for i in file:
        i = i.strip("\n")
        nombres_personas.append(i)
    file.close()
    
    file  = open('datos/direcciones.txt', 'r')
    direcciones = []
    for i in file:
        i = i.strip("\n")
        direcciones.append(i)
    file.close()

    file  = open('tablas/personal.csv', 'w')
    file.write("id_personal,nombre,rut,edad,sexo,id_tienda\n")
    jefes = 0
    for id in range(0, nro_personal):

        if jefes == nro_tiendas:
            print_file(file, id, ruts, random.randint(0,nro_tiendas), nombres_personas, used_user_names, used_rut)
        else:
            print_file(file, id, ruts, jefes, nombres_personas, used_user_names, used_rut)
            jefes += 1

    file.close() 