<?php
require_once("../PHP/TascaClass.php");

//Instanciamos el objeto
//$tascaUsuari = new Tasca($_SESSION['id']);
$tascaUsuari = new Tasca($id_sesion);
//Mediante el objeto llamamos al método y le ponemos un echo para que muestre los datos
echo $tascaUsuari->mostrarRecomendacionTarea();