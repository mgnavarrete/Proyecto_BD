import random

def print_file(file, id, ruts, nombres_personas, used_user_names, used_rut):
    rut = random.choice(ruts)
    nombre = random.choice(nombres_personas)
    edad = random.randint(17,40)

    if nombre not in used_user_names and rut not in used_rut:
       file.write(f"{id},{nombre},{rut},{edad}\n")
       used_user_names.append(nombre)
       used_rut.append(rut)
    else:
        print_file(file, id, ruts, nombres_personas, used_user_names, used_rut)

def tabla_usuarios(nro_usuarios, used_user_names,used_rut):

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

    file  = open('tablas/usuarios.csv', 'w')
    file.write("id_usuario,nombre,rut,edad\n")

    for id in range(0, nro_usuarios):
        print_file(file, id, ruts, nombres_personas, used_user_names, used_rut)
           

    file.close() 