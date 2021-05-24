import random

def tienda_comunas(nro_tiendas):

    com  = open('datos/comunas.txt', 'r')
    comunas = []
    for i in com:
        i = i.strip("\n")
        comunas.append(i)
    com.close()

    t_d = open('tablas/tiendas_despacho.csv', 'w')
    t_d.write("id_tienda,comuna\n")

    for id in range(0,nro_tiendas):
        num_comunas = random.randint(1,8)
        count = 0
        comunas_tienda = []
        while count < num_comunas:
            comuna = random.choice(comunas)
            if comuna not in comunas_tienda:
                t_d.write(f"{id},{comuna}\n")
                comunas_tienda.append(comuna)
                count += 1
    t_d.close()
            