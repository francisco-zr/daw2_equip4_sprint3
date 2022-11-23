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
from kivymd.uix.list import OneLineListItem



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
            Window.size = (1024, 768)
        else:
            Window.size = (400, 600)
        
        return Builder.load_file("main2.kv")

    def on_start(self):
        for i in range(10):
            self.root.ids.container.add_widget(
                OneLineListItem(text=f"Tasca numero {i+1}")
            )

        


MyApp().run()
