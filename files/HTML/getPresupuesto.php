<?php
require_once("../PHP/PresupostClass.php");
$presupuesto = new Presupost;
echo $presupuesto->mostrarAceptarPresupuesto();
if(isset($_GET['search'])){
// variables para paginación, búsqueda, etc.
$columna = $_GET['sort'];
$orden = $_GET['order'];
$buscar = $_GET['search'];
$limite = $_GET['limit'];
$posicion = $_GET['offset'];
}