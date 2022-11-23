<?php
require_once("../PHP/TascaClass.php");
if (isset($_GET['id'])) {
  $porcentaje = $_POST['porcentaje'];
  $idGantt = intval($_GET['id']);
  $tasca = new Tasca;
  $tasca->modificarPorcentaje($idGantt, $porcentaje);
  header("Location: DiagramaGantt.php");
}
