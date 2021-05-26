def generate_tiendas():
    file  = open('data/plano_coberturaV2.csv', 'r')
    table  = open('db/tiendas.csv', 'w')
    table.write(f"id_tienda,nombre,id_direccion,id_jefe\n")
    tiendas_id = ['id']
    for line in file:
        id_tienda, nombre, id_direccion, id_jefe, comuna_despacho  = line.strip('\n').split(",")
        if id_tienda in tiendas_id:
            pass
        else:
            table.write(f"{id_tienda},{nombre},{id_direccion},{id_jefe}\n")
            tiendas_id.append(id_tienda)
    file.close()
    table.close()

def generate_tienda_despacho():
    file  = open('data/plano_coberturaV2.csv', 'r')
    table  = open('db/tiendas_despacho.csv', 'w')
    table.write(f"id_tienda, comuna_despacho\n")
    for line in file:
        id_tienda, nombre, id_direccion, id_jefe, comuna_despacho  = line.strip('\n').split(",")
        if id_tienda == 'id':
            pass
        else:
            table.write(f"{id_tienda},{comuna_despacho}\n")

    file.close()
    table.close()

def generate_personal():
    file  = open('data/trabajadores.csv', 'r')
    table = open('db/personal.csv', 'w')
    table.write("id_personal,nombre,rut,edad,sexo,id_tienda\n")
    for line in file:
        id_personal, nombre, rut, edad, sexo, id_tienda = line.strip('\n').split(",")
        if id_personal == 'id':
            pass
        else:
            table.write(f"{id_personal},{nombre},{rut},{edad},{sexo},{id_tienda}\n")
    file.close()
    table.close()

def generate_usuarios():
    file  = open('data/usuarios.csv', 'r')
    table = open('db/usuarios.csv', 'w')
    table.write("id_usuario,nombre,rut,edad,sexo,id_direccion\n")
    for line in file:
        id_usuario, nombre, rut, edad, sexo, id_direccion= line.strip('\n').split(",")
        if id_usuario == 'id':
            pass
        else:
            table.write(f"{id_usuario},{nombre},{rut},{edad},{sexo},{id_direccion}\n")
    file.close()
    table.close()

def generate_direcciones():
    file  = open('data/direcciones.csv', 'r')
    table = open('db/direcciones.csv', 'w')
    table.write("id_direccion,nombre_direccion,comuna\n")
    for line in file:
        id_direccion, nombre_direccion,comuna= line.strip('\n').split(",")
        if id_direccion == 'id':
            pass
        else:
            table.write(f"{id_direccion},{nombre_direccion},{comuna}\n")
    file.close()
    table.close()

def generate_compras():
    file  = open('data/comprasV2.csv', 'r')
    table = open('db/compras.csv', 'w')
    table.write("id_compra,id_usuarios,id_direccion,id_producto,cantidad,id_tienda\n")
    for line in file:
        id_compra,id_usuarios,id_direccion,id_producto,cantidad,id_tienda= line.strip('\n').split(",")
        if id_compra == 'id':
            pass
        else:
            table.write(f"{id_compra},{id_usuarios},{id_direccion},{id_producto},{cantidad},{id_tienda}\n")
    file.close()
    table.close()

def generate_productos():
    file  = open('data/productosV2.csv', 'r')
    table = open('db/productos.csv', 'w')
    table.write("id_producto,nombre,precio,descripcion,tipo\n")
    id_productos = ['id']
    for line in file:
        id_producto,nombre,precio,descripcion,largo,alto,ancho,peso,fecha_exp,duracion_sin_refrigerar,metodo,id_tienda= line.strip('\n').split(",")
        if id_producto in id_productos:
            pass

        elif fecha_exp == '' and id_producto not in id_productos:
            table.write(f"{id_producto},{nombre},{precio},{descripcion},no_comestibles\n")
            id_productos.append(id_producto)

        elif largo == '' and metodo == '' and duracion_sin_refrigerar == '' and id_producto not in id_productos:
            table.write(f"{id_producto},{nombre},{precio},{descripcion},congelados\n")
            id_productos.append(id_producto)
        
        elif peso == '' and metodo == '' and id_producto not in id_productos:
            table.write(f"{id_producto},{nombre},{precio},{descripcion},frescos\n")
            id_productos.append(id_producto)
        
        elif peso == '' and duracion_sin_refrigerar == '' and id_producto not in id_productos:
            table.write(f"{id_producto},{nombre},{precio},{descripcion},conservas\n")
            id_productos.append(id_producto)

    file.close()
    table.close()

def generate_no_comestibles():
    file  = open('data/productosV2.csv', 'r')
    table = open('db/no_comestibles.csv', 'w')
    table.write("id_producto,ancho,largo,alto,peso\n")
    id_productos = []
    for line in file:
        id_producto,nombre,precio,descripcion,largo,alto,ancho,peso,fecha_exp,duracion_sin_refrigerar,metodo,id_tienda= line.strip('\n').split(",")
        if fecha_exp == '' and id_producto not in id_productos:
            table.write(f"{id_producto},{ancho},{largo},{alto},{peso}\n")
            id_productos.append(id_producto)     
    file.close()
    table.close()

def generate_congelados():
    file  = open('data/productosV2.csv', 'r')
    table = open('db/congelados.csv', 'w')
    table.write("id_producto,fecha_exp,peso\n")
    id_productos = []
    for line in file:
        id_producto,nombre,precio,descripcion,largo,alto,ancho,peso,fecha_exp,duracion_sin_refrigerar,metodo,id_tienda= line.strip('\n').split(",")
        if largo == '' and metodo == '' and duracion_sin_refrigerar == '' and id_producto not in id_productos:
            table.write(f"{id_producto},{fecha_exp},{peso}\n")     
            id_productos.append(id_producto)
    file.close()
    table.close()

def generate_frescos():
    file  = open('data/productosV2.csv', 'r')
    table = open('db/frescos.csv', 'w')
    table.write("id_producto,fecha_exp,duracion_sin_refrigerar\n")
    id_productos = []
    for line in file:
        id_producto,nombre,precio,descripcion,largo,alto,ancho,peso,fecha_exp,duracion_sin_refrigerar,metodo,id_tienda= line.strip('\n').split(",")
        if peso == '' and metodo == '' and id_producto not in id_productos:
            table.write(f"{id_producto},{fecha_exp},{duracion_sin_refrigerar}\n")    
            id_productos.append(id_producto) 
    file.close()
    table.close()

def generate_conservas():
    file  = open('data/productosV2.csv', 'r')
    table = open('db/conservas.csv', 'w')
    table.write("id_producto,fecha_exp,metodo\n")
    id_productos = []
    for line in file:
        id_producto,nombre,precio,descripcion,largo,alto,ancho,peso,fecha_exp,duracion_sin_refrigerar,metodo,id_tienda= line.strip('\n').split(",")
        if peso == '' and duracion_sin_refrigerar == '' and id_producto not in id_productos:
            table.write(f"{id_producto},{fecha_exp},{metodo}\n")     
            id_productos.append(id_producto)
    file.close()
    table.close()

def generate_stock():
    file  = open('data/productosV2.csv', 'r')
    table = open('db/stock.csv', 'w')
    table.write("id_producto,id_tienda\n")
    for line in file:
        id_producto,nombre,precio,descripcion,largo,alto,ancho,peso,fecha_de_caducidad,duracion_sin_refrigerar,tipo_de_conserva,id_tienda= line.strip('\n').split(",")
        if id_producto == 'id':
            pass
        else:
            table.write(f"{id_producto},{id_tienda}\n")

    file.close()
    table.close()



    