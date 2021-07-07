def generate_personal_unidad():
    file  = open('personalV2.csv', 'r')
    table = open('personal_unidad.csv', 'w')
    table.write("id_personal,id_unidad\n")
    
    for line in file:
        id_personal, nombre, rut, sexo, edad, clasificacion, id_unidad, tipo_liciendia, id_vehiculo= line.strip('\n').split(",")
        if id_personal == 'id':
            pass
        elif id_unidad == '':
            v_file = open('vehiculos.csv', 'r')
            for v_line in v_file:
               id_v, patente, estado, tipo, volumen, carga, alcance, cantidad, capacidad, id_unidad_v = v_line.strip('\n').split(",")
               if id_vehiculo == id_v:
                     table.write(f"{id_personal},{id_unidad_v}\n") 
            v_file.close() 
        else:
            table.write(f"{id_personal},{id_unidad}\n")     
    file.close()
    table.close()

q = generate_personal_unidad()