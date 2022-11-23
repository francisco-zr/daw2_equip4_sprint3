import funciones                                    # importem arxiu funciones

class Kanban:
    def __init__(self,id, durada, estat, idTasca):
        self.id = id                                # ID del kanban
        self.durada = durada                        # durada
        self.estat = estat                          # estat --> 0= to do, 1= in progress, 2= done
        self.idTasca = idTasca                      # id tasca
        
    # Select         
    def selectKanban(id):
        query = ("SELECT * FROM Kanban WHERE id.Kanban = %s", (id))
        resultat = funciones.consultaDatos(query)
        return resultat
    
    # Update
    def actualitzaRecomanacio(id, durada, estat, idTasca):
        query = ("UPDATE Kanban SET Id= %s, durada= %s, estat= %s, idTasca= %s"(id, durada, estat, idTasca))
        resultat = funciones.actualizarDatos(query)
        return resultat
    
    # Insert
    def inserirRecomanacio(id, durada, estat, idTasca):
        query = ("INSERT INTO Kanban VALUES (%s,%s,%s,%s) "(id, durada, estat, idTasca))
        resultat = funciones.insertarDatos(query)
        return resultat
    
    # Delete
    def eliminaRecomanacio(id):
        query = ("DELETE FROM Kanban WHERE id.Kanban = %s", (id))
        resultat = funciones.eliminarDatos(query)
        return resultat