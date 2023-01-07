<?php
require_once("../src/class/PresupostClass.php");
$presupuesto = new Presupost($_COOKIE["Presupuesto"]);
echo $presupuesto->mostrarAceptarPresupuesto();
if (isset($_GET['search'])) {
    // variables para paginación, búsqueda, etc.
    $columna = $_GET['sort'];
    $orden = $_GET['order'];
    $buscar = $_GET['search'];
    $limite = $_GET['limit'];
    $posicion = $_GET['offset'];
}
