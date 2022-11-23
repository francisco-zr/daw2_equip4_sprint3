import funciones
class Gant:
    def __init__(self, id, inici, fi, idTasca):
        """ constructor de clase

        Args:
            idGant (int): id de cada Gant
            idTasca (int): id de la tarea en concreto
            descripcio (string): descripción del gant
            idUsuari (int): id de usuario
        """
        self.id = id
        self.inici = inici
        self.fi = fi
        self.idTasca = idTasca

     # Select         
    def selectKanban(id):
        query = ("SELECT * FROM Kanban WHERE id.Kanban = %s", (id))
        resultat = funciones.consultaDatos(query)
        return resultat
    
    # Update
    def actualitzaRecomanacio(id, inici, fi, idTasca):
        query = ("UPDATE Kanban SET Id= %s, inici= %s, fi= %s, idTasca= %s"(id, inici, fi, idTasca))
        resultat = funciones.actualizarDatos(query)
        return resultat
    
    # Insert
    def inserirRecomanacio(id, inici, fi, idTasca):
        query = ("INSERT INTO Kanban VALUES (%s,%s,%s,%s) "(id, inici, fi, idTasca))
        resultat = funciones.insertarDatos(query)
        return resultat
    
    # Delete
    def eliminaRecomanacio(id):
        query = ("DELETE FROM Kanban WHERE id.Kanban = %s", (id))
        resultat = funciones.eliminarDatos(query)
        return resultat