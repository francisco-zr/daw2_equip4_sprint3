<?php 
session_start();
$_SESSION['id'] = 1;?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/modalTasca.css">
  <title>Pymeshield Aceptar Presupuesto</title>
  <?php require_once("../src/includes/head.php");?>
</head>

<body class="d-flex flex-column min-vh-100" >
  <header class="sticky-top">
  <?php require_once("../src/includes/header.php");?>
  </header class="sticky-top">
  <main class="pt-0">

    <div id="container-fluid" style="margin:5%; margin-top:40px;">
        <div class="alert alert-danger">
            <p class="h2 text-center"><i class="fa-solid fa-triangle-exclamation p-3"></i>¡Inseguridad detectada!<i class="fa-solid fa-triangle-exclamation p-3"></i></p>
            <p class="h3 inseguretat text-center">


              <?php

              // Cal arreglar per a que agafi la ruta i no tenir tot el codi aqui dins

              include_once '../config/connexioBDD.php';
              $id_user=$_SESSION['id'] ;             
              $query= "
              SELECT name_recommendation 
              FROM recommendations 
              INNER JOIN answers 
              ON recommendations.id_answer = answers.id_answer 
              INNER JOIN questions 
              ON answers.id_question = questions.id_question 
              INNER JOIN questionnaries 
              ON questions.id_questionary = questionnaries.id_questionary 
              WHERE questionnaries.id_user ='$id_user'; 

              ";
              $linies = mysqli_query($connexioDB,$query);
              $linia = mysqli_fetch_array($linies);
              print "$linia[0]";
              ?>
            </p>
            <br>
            <p class="h4">Soluciones:</p>
            
            <form >
                <div class="mb-3">
                    <select class="form-select form-select-lg solucio" type="text" id="solucio" placeholder="select">
                    <option>Seleccione la opción</option>
                    
                    <?php

                    // Cal arreglar per a que agafi la ruta i no tenir tot el codi aqui dins
                    
                    include_once '../config/connexioBDD.php';

                    $id_user=$_SESSION['id'] ;             
                    $query= "
                    SELECT * 
                    FROM recommendations 
                    INNER JOIN answers 
                    ON recommendations.id_answer = answers.id_answer 
                    INNER JOIN questions 
                    ON answers.id_question = questions.id_question 
                    INNER JOIN questionnaries 
                    ON questions.id_questionary = questionnaries.id_questionary 
                    WHERE questionnaries.id_user ='$id_user'
                    ORDER BY recommendations.id_recommendation; 
      
                    ";
                    $linies = mysqli_query($connexioDB,$query);

                    while ($linia = mysqli_fetch_array($linies)) {
                      print '<option value="'.$linia['id_recommendation'].'">'.$linia['description_recommendation'].'</option>';
                    }
                    ?>
                    </select>
                </div>
                
                <div class="form-group mt-3">
                <p class="h4">¿Quién quiero que me lo gestione?</p>
                <select class="form-select form-select-lg" id='gestio' placeholder="select">
                  <option>Seleccione la opción</option>
                  <option >Que lo gestione Pymeralia</option>
                  <option >Mi empresa se encarga de gestionarlo</option>
                </select>
                </div>
                <div class="form-group mt-3">
                <div class="form-check">
                  <input class="form-check-input p-2" type="checkbox" id="gridCheck">
                  <label class="form-check-label check mx-1" for="gridCheck" style="font-size: 18px;">¿Aceptar Solución?</label>
                </div>
                </div>
                <div class="form-group mt-4">
                <button type="button" class="btn btn-dark btn-lg" id="myBtn" onclick="validador()">Guardar</button>
                </div>
              </form>
        </div>
        <!-- Cambiar contingut info del div de dalt  -->

        <button class="btn btn-success btn-lg dreta"><i class="fa-solid fa-forward"></i>Siguiente</button>
      </div>

                </main>
            <footer class="bg-black text-center text-lg-center mt-auto">
                <?php require_once("../src/includes/footer.php");?>
            </footer>
          </body>



          <!-- The Modal -->
          <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content" style="margin:10%;">
              <span class="close">&times;</span>
              <h1 style="margin-left:10%; text-align:center!important;">Confirma los datos:</h1>
              <p style="margin-left:10%;">Solucion seleccionada:<label id="texto_nav1"></label></p>
              <p style="margin-left:10%;">Aceptas la tarea:<label id="texto_nav2"></label></p>
              <p style="margin-left:10%;">Quien gestiona la tarea:<label id="texto_nav3"></label></p>
              <button type="button" class="btn btn-primary" id="myBtn" onclick='guarda()'>Guardar</button>
            </div>
          </div>




          <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
          <script src="../js/validadorTasca.js"></script>
          </html>