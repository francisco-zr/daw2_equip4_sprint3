<?php
// Connexio a base de dades
  $db_host="mariadb"; //si no es "mariadb".
  $db="oversegurity"; //nom de la base de dades
  $user="root"; //usuari BDD
  $pass="root"; //pass BDD
  
  $connexioDB = mysqli_connect($db_host, $user, $pass, $db);

  if ($connexioDB->connect_error) {
    die("Connexió fallida: " . $connexioDB->connect_error);
  }
?>