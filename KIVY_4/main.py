from kivy.lang import Builder
from kivymd.app import MDApp
from kivymd.uix.boxlayout import MDBoxLayout
from kivymd.theming import ThemableBehavior
from kivymd.uix.list import MDList
from kivymd.uix.list import OneLineIconListItem
from kivy.uix.scrollview import ScrollView
from kivy.core.window import Window
from kivy.utils import platform
from kivymd.uix.screen import MDScreen
from kivy.properties import ObjectProperty
from kivymd.uix.scrollview import MDScrollView
from kivy.clock import Clock
from kivymd.uix.list import ThreeLineIconListItem, IconLeftWidget #import para crear listas (cambia dependiendo de los campos que queremos que tenga la lista), le pasamos diferentes imports de la misma biblioteca
import json #importamos la libreria de python que nos permite trabajar con json
from pathlib import Path #cargar ruta del script




class ContentNavigationDrawer(MDBoxLayout):
    manager = ObjectProperty()
    nav_drawer = ObjectProperty()  

class DrawerList(ThemableBehavior, MDList):
    def set_color_item(self, instance_item):

        # Set the color of the icon and text for the menu item.
        for item in self.children:
            if item.text_color == self.theme_cls.primary_color:
                item.text_color = self.theme_cls.text_color
                break
        instance_item.text_color = self.theme_cls.primary_color
        


class MyApp (MDApp):    
    def build(self):
        self.title = "PymeShield"
        if platform in ['win', 'linux', 'macosx']:
            Window.size = (400, 600)
        else:
            Window.size = (400, 600)
        
        return Builder.load_file("main2.kv")

    def on_start(self): #creamos la clase on_start
        #sirve para que cargue bien el json desde cualquier directorio
        script_location = Path(__file__).absolute().parent 
        # Cargamos los datos desde el archivo data.json
        with open(script_location / "data.json","rt") as json_file:
            data = json.load(json_file)

        with open(script_location / "tareas.json","rt") as json_file:
            data2 = json.load(json_file)

        #print(data)
                
        for i in data: #bucle que recorre el rango que le pasemos como parametro
            self.root.ids.presupuesto.add_widget( #añade widgets, despues de ids. va el id con el que podremos trabajar en el documento .kv
                
                ThreeLineIconListItem( #método que nos deja trabajar con 3 lineas que previamente lo hemos importado en la parte superior
                    IconLeftWidget( #método que nos permite agregar un icono
                        icon="account-cash"
                    ),
                    
                    text = f"Presupuesto {i['id']}",
                    secondary_text=f"Precio {i['preu']}", #línea 2
                    tertiary_text=f"Fecha {i['data']}", #línea 3
                )
            )## Lista que muestra los cuestionarios

    
        #print(data)
                
        for i in data2: #bucle que recorre el rango que le pasemos como parametro
            self.root.ids.tareas.add_widget( #añade widgets, despues de ids. va el id con el que podremos trabajar en el documento .kv
                ThreeLineIconListItem( #método que nos deja trabajar con 3 lineas que previamente lo hemos importado en la parte superior
                    IconLeftWidget( #método que nos permite agregar un icono
                        icon="table"
                    ),
                    
                    text = f"Tarea {i['id']}",
                    secondary_text=f"Descripcion {i['descripcion']}", #línea 2
                )
            )## Lista que muestra los cuestionarios
            
MyApp().run()
