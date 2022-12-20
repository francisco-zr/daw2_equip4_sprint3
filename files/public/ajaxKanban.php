<?php
require_once("../src/class/TascaClass.php");

$estado = $_POST['estado'];
$tasca = $_POST['tasca'];
$tasca2 = new Tasca($id_sesion, $estado);
$tasca2->modificarTasca($tasca);
