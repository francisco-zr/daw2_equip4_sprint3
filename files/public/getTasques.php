<?php
require_once("../src/class/TascaClass.php");

//Instanciamos el objeto pasandole como parámetro el id de la sesión que después en la clase la recoge
//$tascaUsuari = new Tasca($_SESSION['id']);
$tascaUsuari = new Tasca($id_sesion);

//Mediante el objeto llamamos al método y le ponemos un echo para que muestre los datos
echo $tascaUsuari->mostrarRecomendacionTarea();