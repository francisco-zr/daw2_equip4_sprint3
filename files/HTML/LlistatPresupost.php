<?php
require_once("../PHP/TascaClass.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pymeshield Llistat Presupostos</title>
  <?php require_once("head.php"); ?>
</head>

<body class="d-flex flex-column min-vh-100">
  <header class="sticky-top">
    <?php require_once("header.php"); ?>
  </header>
  <main>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center px-2 pb-2 mb-3 border-bottom">
      <h1 class="h2">Presupostos</h1></div>
        <?php
          include_once'../../PHP/PresupostClass.php';
          $user = new User($_SESSION['mail_session']);
          $user->mostrarPresupostos();
        ?>
  </main>
  <footer class="bg-black text-center text-lg-center mt-auto">
    <?php require_once("footer.php"); ?>
  </footer>
</body>

</html>