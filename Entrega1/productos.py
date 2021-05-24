import random

def productos():
    id_producto = 0

    file = open('datos/no_comestible.txt', 'r')
    nombres = []
    descripciones = []

    for i in file:
        nombre, descripcion = i.strip("\n").split(',')
        nombres.append(nombre)
        descripciones.append(descripcion)
    
    product = open('tablas/productos.csv', 'w')
    product.write('id_producto,nombre,precio,descripcion\n')
    no_com = open('tablas/no_comestible.csv', 'w')
    no_com.write('id_no_comestible,ancho,largo,alto,peso,id_producto\n')

    for i in range(0, len(nombres)):
        product.write(f'{id_producto},{nombres[i]},{random.randint(1000,50000)},{descripciones[i]}\n')
        no_com.write(f'{i},{random.randint(10,60)},{random.randint(10,60)},{random.randint(10,60)},{random.randint(10,80)},{id_producto} \n')
        id_producto += 1

    no_com.close()

    file = open('datos/congelados.txt', 'r')
    nombres = []
    descripciones = []

    for i in file:
        nombre, descripcion = i.strip("\n").split(',')
        nombres.append(nombre)
        descripciones.append(descripcion)
    congelados = open('tablas/congelados.csv', 'w')
    congelados.write('id_congelados,fecha_exp,peso,id_producto\n')

    for i in range(0, len(nombres)):
        product.write(f'{id_producto},{nombres[i]},{random.randint(1000,50000)},{descripciones[i]}\n')
        congelados.write(f'{i},{random.randint(1,30)}-{random.randint(1,12)}-{random.randint(2022,2023)},{random.randint(10,80)},{id_producto}\n')
        id_producto += 1

    congelados.close()

    file = open('datos/frescos.txt', 'r')
    nombres = []
    descripciones = []

    for i in file:
        nombre, descripcion = i.strip("\n").split(',')
        nombres.append(nombre)
        descripciones.append(descripcion)
    frescos = open('tablas/frescos.csv', 'w')
    frescos.write('id_congelados,fecha_exp,tiempo,id_producto\n')

    for i in range(0, len(nombres)):
        product.write(f'{id_producto},{nombres[i]},{random.randint(1000,50000)},{descripciones[i]}\n')
        frescos.write(f'{i},{random.randint(1,30)}-{random.randint(1,12)}-{random.randint(2022,2023)},{random.randint(1, 24)},{id_producto}\n')
        id_producto += 1

    frescos.close()

    file = open('datos/conserva.txt', 'r')
    nombres = []
    descripciones = []
    metodos = []

    for i in file:
        nombre, descripcion, metodo = i.strip("\n").split(',')
        nombres.append(nombre)
        descripciones.append(descripcion)
        metodos.append(metodo)
    conserva = open('tablas/conserva.csv', 'w')
    conserva.write('id_congelados,fecha_exp,metodo,id_producto\n')

    for i in range(0, len(nombres)):
        product.write(f'{id_producto},{nombres[i]},{random.randint(1000,50000)},{descripciones[i]}\n')
        conserva.write(f'{i},{random.randint(1,30)}-{random.randint(1,12)}-{random.randint(2022,2023)},{metodos[i]},{id_producto}\n')
        id_producto += 1

    conserva.close()



    product.close()


    
    




