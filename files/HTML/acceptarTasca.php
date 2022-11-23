<?php 
session_start();
$_SESSION['id'] = 1;?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../CSS/style.css">
  <title>Pymeshield Aceptar Presupuesto</title>
  <?php require_once("head.php");?>
  <style>

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>

<body class="d-flex flex-column min-vh-100" >
  <header class="sticky-top">
  <?php require_once("header.php");?>
  </header class="sticky-top">
  <main class="pt-0">

    <div id="container-fluid" style="margin:5%; margin-top:40px;">
        <div class="alert alert-danger">
            <p class="h2 text-center"><i class="fa-solid fa-triangle-exclamation p-3"></i>¡Inseguridad detectada!<i class="fa-solid fa-triangle-exclamation p-3"></i></p>
            <p class="h3 inseguretat text-center">


              <?php

              // Cal arreglar per a que agafi la ruta i no tenir tot el codi aqui dins

              include_once '../PHP/connexioBDD.php';
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
                    
                    include_once '../PHP/connexioBDD.php';

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
                <!-- Enviem el form segons si la acepta + id pimeralia o +id empresa Auditada (opcio de crear 2 arxius amb el id de la empresa i crear tasca desde alli)-->
                <!-- 
                  #Boto pymeralia
                  function assignarPymeralia()
                  include_once '../PHP/connexioBDD.php';
                  $id_user=$_SESSION['id'] ;             
                  $query= "SELECT * FROM tasks WHERE tasks.id_user= '$id_user'";
                  $linies = mysqli_query($connexioDB,$query);
                  $linia = mysqli_fetch_array($linies);
                  if($linia['assing']==null){
                    $pymeralia= 1;
                    $query= "SELECT * FROM tasks WHERE tasks.id_user= '$id_user'";

                  }
                ?>
                -->
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
            <?php require_once("footer.php");?>
            </footer>
          </body>
          <!-- The Modal -->
          <div id="myModal" class="modal">

          <!-- Modal content -->
          <div class="modal-content" style="margin:10%;">
            <span class="close">&times;</span>
            <h1 style="margin-left:10%; text-align:center!important;">Confirma los datos:</h1>
            <p style="margin-left:10%;">Solucion seleccionada:    <label id="texto_nav1"></label></p>
            <p style="margin-left:10%;">Aceptas la tarea:     <label id="texto_nav2"></label></p>
            <p style="margin-left:10%;">Quien gestiona la tarea:     <label id="texto_nav3"></label></p>
            <button type="button" class="btn btn-primary" id="myBtn" onclick='guarda()'>Guardar</button>          </div>

          </div>
          <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
          <script>
            function validador(){
              let solucio="";
              let gridcheck;
              let gestio="";
              solucio = document.getElementById("solucio").value;
              gridcheck = document.getElementById("gridCheck").checked;
              gestio = document.getElementById("gestio").value;
              if(gridcheck!=false){
                gridcheck=" SI ";
              }else if(gridcheck==false){
                gridcheck=" NO "
              }
              var campo1 = document.getElementById('texto_nav1');
              campo1.innerHTML = solucio;
              var campo2 = document.getElementById('texto_nav2');
              campo2.innerHTML = gridcheck;
              var campo3 = document.getElementById('texto_nav3');
              campo3.innerHTML = gestio;

              // Get the modal
                var modal = document.getElementById("myModal");

                // Get the button that opens the modal
                var btn = document.getElementById("myBtn");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks the button, open the modal 
                btn.onclick = function() {
                  modal.style.display = "block";
                }

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                  modal.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                  if (event.target == modal) {
                    modal.style.display = "none";
                  }
                }          
              }
              function guarda(){
              let solucio="";
              let gridcheck;
              let gestio="";
              var modal = document.getElementById("myModal");
              solucio = document.getElementById("solucio").value;
              gridcheck = document.getElementById("gridCheck").checked;
              gestio = document.getElementById("gestio").value;
              
                
                $.ajax({
                  type:'POST',
                  url:'inserirTasca.php',
                  data: {solucio,gridcheck,gestio},
                  success:function(data){
                  console.log("enviado");
                }
              })
                modal.style.display = "none";


              }
          </script>

          </html>