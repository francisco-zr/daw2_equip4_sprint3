<?
include_once '../src/class/PresupostClass.php';
if (isset($_GET['id_presupuesto'])) {
    $id = $_GET['id_presupuesto'];
  }
$presupuesto = new Presupost($id);
$array = $_POST; 
foreach ($_POST as $key) {
    $idTask = getKey('id_task_', $array);
    if($idTask){
      $start = $_POST["data_i".$idTask];
      $end = $_POST["data_f".$idTask];
      $price = $_POST["price_".$idTask."_"];
      $presupuesto->afegirPreuTasca($price, $idTask, $start, $end);
      unset($array['id_task_'.$idTask."_"]);
    }
   
};


function getKey($stringToFind, $array) {
foreach ($array as $key => $val) {
  if (str_contains($key,$stringToFind) !== false) {
   return $val;
  } 
}
return false;
}

header("Location: LlistatPresupost.php");
