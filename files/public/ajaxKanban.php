<?php
require_once("../src/class/TascaClass.php");

$estado = $_POST['estado'];
$tasca = $_POST['tasca'];
$tasca2 = new Tasca($tasca, $estado);
$tasca2->modificarTasca();
