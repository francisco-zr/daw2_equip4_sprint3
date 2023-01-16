<?php
require_once("../src/class/TascaClass.php");
if (isset($_GET['id'])) {
  $porcentaje = $_POST['porcentaje'];
  $idGantt = intval($_GET['id']);
  $tasca = new Tasca($idGantt, $porcentaje, $id_sesion);
  $tasca->modificarPorcentaje();
  header("Location: DiagramaGantt.php");
}
