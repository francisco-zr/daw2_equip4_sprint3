<?php
require_once("../src/class/PresupostClass.php");
require_once("../src/class/TascaClass.php");

$presupuestoId = $_POST['presupuesto'];
$tareas = json_decode($_POST["tareas"], true);

if ($presupuestoId != null && $tareas == null) {
    $presupuesto = new Presupost($presupuestoId);
    $presupuesto->aceptarPresupuesto();
}

if ($presupuestoId != null && $tareas != null) {
    $modPresupuesto = new Presupost($presupuestoId);
    foreach ($tareas as $tarea) {
        $modTarea = new Tasca($tarea['id_task'], $tarea['accepted'], $tarea['manages']);
        $modTarea->modTarea();
    }
    $modPresupuesto->modificarPresupuesto();
}
