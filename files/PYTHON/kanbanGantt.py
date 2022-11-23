import funciones                                    # importem arxiu funciones

class Kanban_Gant:
    def __init__(self, id, inici, fi):
        self.id = id                                # ID del kanban i gantt
        self.inici = inici                          # inici tasca 
        self.fi = fi                                # fi tasca
        
    # Select         
    def selectKanban(id):
        query = ("SELECT * FROM Kanban_Gantt WHERE id.Kanban = %s", (id))
        resultat = funciones.consultaDatos(query)
        return resultat
    
    # Update
    def actualitzaRecomanacio(id, inici, fi):
        query = ("UPDATE Kanban_Gantt SET Id= %s, inici= %s, fi= %s "(id, inici, fi))
        resultat = funciones.actualizarDatos(query)
        return resultat
    
    # Insert
    def inserirRecomanacio(id, inici, fi):
        query = ("INSERT INTO Kanban_Gantt VALUES (%s,%s,%s) "(id, inici, fi))
        resultat = funciones.insertarDatos(query)
        return resultat
    
    # Delete
    def eliminaRecomanacio(id):
        query = ("DELETE FROM Kanban_Gantt WHERE id.Kanban = %s", (id))
        resultat = funciones.eliminarDatos(query)
        return resultat