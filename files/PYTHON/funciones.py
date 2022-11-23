from pickle import FALSE, TRUE
import MySQLdb
import MySQLdb.cursors
# Datos de la BBDD:
DB_HOST = 'localhost' 
DB_USER = 'shell' 
DB_PASS = 'shell' 
DB_NAME = 'pymeshell' 

# Consulta filtrada:
def consultaDatos(query): # añadir consulta en variable query
    datos = [DB_HOST, DB_USER, DB_PASS, DB_NAME] 
    
    conn = MYSQLdb.connect(*datos) # Conectar a la base de datos 
    cursor = conn.cursor()         # Crear un cursor 
    cursor.execute(query)          # Ejecutar una consulta 

    if query.upper().startswith('SELECT'): 
        resultat = cursor.fetchall()   # Traer los resultados de un select 
    else: 
        conn.commit()              # Hacer efectiva la escritura de datos 
        resultat = None 
    
    cursor.close()                 # Cerrar el cursor 
    conn.close()                   # Cerrar la conexión 

    return resultat

# Actualizar Datos:
def actualizarDatos(query):
    datos = [DB_HOST, DB_USER, DB_PASS, DB_NAME] 
    
    conn = MySQLdb.connect(*datos) # Conectar a la base de datos 
    cursor = conn.cursor()         # Crear un cursor 
    cursor.execute(query) 
    if query.upper().startswith('UPDATE'): 
        conn.commit()              # Hacer efectiva la actualizacion datos 
        resultat = TRUE
    else: 
        conn.rollback()            # Revertimos los cambios
        resultat = FALSE

    cursor.close()                 # Cerrar el cursor 
    conn.close()                   # Cerrar la conexión 

    return resultat

# Insertar Datos:
def insertarDatos(query):
    datos = [DB_HOST, DB_USER, DB_PASS, DB_NAME] 
    
    conn = MySQLdb.connect(*datos) # Conectar a la base de datos 
    cursor = conn.cursor()         # Crear un cursor 
    cursor.execute(query) 
    if query.upper().startswith('INSERT'): 
        conn.commit()              # Hacer efectivo el insert de los datos 
        resultat = TRUE
    else: 
        conn.rollback()            # Revertimos los cambios
        resultat = FALSE

    cursor.close()                 # Cerrar el cursor 
    conn.close()                   # Cerrar la conexión 

    return resultat

# Eliminar Datos:
def eliminarDatos(query):
    datos = [DB_HOST, DB_USER, DB_PASS, DB_NAME] 
    
    conn = MySQLdb.connect(*datos) # Conectar a la base de datos 
    cursor = conn.cursor()         # Crear un cursor 
    cursor.execute(query) 
    if query.upper().startswith('DELETE'): 
        conn.commit()              # Hacer efectiva la eliminacio de datos 
        resultat = TRUE
    else: 
        conn.rollback()            # Revertimos los cambios
        resultat = FALSE

    cursor.close()                 # Cerrar el cursor 
    conn.close()                   # Cerrar la conexión 

    return resultat

