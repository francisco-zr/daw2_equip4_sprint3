<?
include_once '../src/class/PresupostClass.php';
if (isset($_GET['id_presupuesto'])) {
    $id = $_GET['id_presupuesto'];
  }
$presupuesto = new Presupost($id);
if ($_POST == $id_task)
foreach ($_POST as $id_task => $row) {
    //echo $id_task . '-' . $row . '<br>';
    $presupuesto->afegirPreuTasca($row, substr($id_task, 0, -1));
};
foreach ($_POST as $start_date => $row) {
  $presupuesto->actualitzarData($row, substr($start_date, 0, -1));
};
header("Location: LlistatPresupost.php");
