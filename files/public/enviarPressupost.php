<?
include_once '../src/class/PresupostClass.php';
if (isset($_GET['id_presupuesto'])) {
    $id = $_GET['id_presupuesto'];
  }
$presupuesto = new Presupost($id);
$array = $_POST; 
foreach ($_POST as $key) {
  //buscar a l'array les coincidencies de id_task_ + un numero que no sabem
    $idTask = getKey('id_task_', $array);
    //una vegada tenim la id entrem al bucle
    if($idTask){
      //busquem el valor de data_i de la tasca la qual hem trobat al bucle anterior
      $start = $_POST["data_i".$idTask];
      //busquem el valor de data_f de la tasca la qual hem trobat al bucle anterior
      $end = $_POST["data_f".$idTask];
      //busquem el valor de price de la tasca la qual hem trobat al bucle anterior
      $price = $_POST["price_".$idTask."_"];
      //enviem les variables a la classe
      $presupuesto->afegirPreuTasca($price, $idTask, $start, $end);
      //borrem la id trobada al bulce per a que no es quedi en bucle infinit
      unset($array['id_task_'.$idTask."_"]);
    }
   
};

//bucle on diem que volem buscar id_task_ i que ens torni el valor obtingut que serà la id de la primera tasca
function getKey($stringToFind, $array) {
foreach ($array as $key => $val) {
  if (str_contains($key,$stringToFind) !== false) {
   return $val;
  } 
}
return false;
}

header("Location: LlistatPresupost.php");
