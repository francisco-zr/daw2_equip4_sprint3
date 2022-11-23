<?
include_once '../PHP/PresupostClass.php';

$presupuesto = new Presupost();

foreach ($_POST as $id_task => $row) {
    //echo $id_task . '-' . $row . '<br>';
    $presupuesto->afegirPreuTasca($row, substr($id_task, 0, -1));
};
header("Location: FormulariPresupost.php?saved");
