<?php
# VARIABLES GLOBALS
session_start();
$_SESSION['id'] = 1;
$id_sesion = $_SESSION['id'];

class Tasca
{
   private $id;
   private $Nom;
   private $Descripcio;
   private $Participant;
   private $Estat;

   /**
    * __construct
    *
    * @param  mixed $idUsuari
    * return void
    */
   function __construct()
   {
      //obtengo un array con los parámetros enviados a la función
      $params = func_get_args();
      //saco el número de parámetros que estoy recibiendo
      $num_params = func_num_args();
      //cada constructor de un número dado de parámtros tendrá un nombre de función
      //atendiendo al siguiente modelo __construct1() __construct2()...
      $funcion_constructor = '__construct' . $num_params;
      //compruebo si hay un constructor con ese número de parámetros
      if (method_exists($this, $funcion_constructor)) {
         //si existía esa función, la invoco, reenviando los parámetros que recibí en el constructor original
         call_user_func_array(array($this, $funcion_constructor), $params);
      }
   }

   //Ahora declaro una serie de métodos constructores que aceptan diversos números de parámetros
   /**
    * constructor1 --> IDUsuari
    *
    * return void
    */
   function __construct1($id)
   {
      $this->id = $id;
   }

   function __construct2($id, $Estat)
   {
      $this->id = $id;
      $this->Estat = $Estat;
   }

   public function getId()
   {
      return $this->id;
   }

   public function getNom()
   {
      return $this->Nom;
   }

   public function getParticipant()
   {
      return $this->Participant;
   }

   public function getEstat()
   {
      return $this->Estat;
   }

   //setters

   public function setId($id)
   {
      $this->id = $id;
   }
   public function setNom($Nom)
   {
      $this->Nom = $Nom;
   }
   public function setParticipant($Participant)
   {
      $this->Participant = $Participant;
   }
   public function setEstat($Estat)
   {
      $this->Estat = $Estat;
   }

   public static function showFormularis()
   { //es un metode estatic per a mostrar els camps de la base de dades a la web
      include_once "../config/connexioBDD.php"; //fitxe de conexio a la base de dades
      //consulta
      $sql = "SELECT tasks.state, users.name_user, users.last_name, companies.name_company, questionnaries.name_questionary, questionnaries.date_questionary FROM tasks INNER JOIN users ON tasks.id_user = users.id_user INNER JOIN companies ON users.id_company = companies.id_company INNER JOIN questionnaries ON tasks.id_questionary = questionnaries.id_questionary GROUP BY tasks.state, users.name_user, companies.name_company, questionnaries.name_questionary, questionnaries.date_questionary;      ";
      $result = mysqli_query($connexioDB, $sql); //mysqli_query es una funcio de php
      return $result;
   }



   /*  function crearTasca(){
        
    }*/
   function eliminarTasca()
   {
   }
   /**
    * actualiza el estado del kanban y le pone un porcentaje acorde
    *
    * @param  mixed $id
    * return void
    */
   function modificarTasca($id)
   {
      include '../config/connexioBDD.php';
      if ($this->Estat == "InProgress") {
         $query = "UPDATE `tasks` SET `state` = '$this->Estat', `percentage` = 50 WHERE `tasks`.`id_task` = $id";
         mysqli_query($connexioDB, $query);
      } else if ($this->Estat == "Done") {
         $query = "UPDATE `tasks` SET `state` = '$this->Estat', `percentage` = 100 WHERE `tasks`.`id_task` = $id";
         mysqli_query($connexioDB, $query);
      } else {
         $query = "UPDATE `tasks` SET `state` = '$this->Estat', `percentage` = 0 WHERE `tasks`.`id_task` = $id";
         mysqli_query($connexioDB, $query);
      }
   }
   /**
    * modifica el porcentaje en la sección gantt y también actualiza el estado para que concuerde con el kanban
    *
    * @param  mixed $id
    * @param  mixed $porcentaje
    * return void
    */
   function modificarPorcentaje($id, $porcentaje)
   {
      include '../config/connexioBDD.php';
      if ($porcentaje > 0 && $porcentaje < 100) {
         $query = "UPDATE `tasks` SET `state` = 'InProgress', `percentage` = $porcentaje WHERE `tasks`.`id_task` = $id";
         mysqli_query($connexioDB, $query);
      } else if ($porcentaje == 100) {
         $query = "UPDATE `tasks` SET `state` = 'Done', `percentage` = $porcentaje WHERE `tasks`.`id_task` = $id";
         mysqli_query($connexioDB, $query);
      } else {
         $query = "UPDATE `tasks` SET `state` = 'ToDo', `percentage` = $porcentaje WHERE `tasks`.`id_task` = $id";
         mysqli_query($connexioDB, $query);
      }
   }

   function assignarTasca()
   {
   }

   function desassignarTasca()
   {
   }

   function modificarEstatTasca()
   {
   }
   /**
    * Lista la fila del kanban según el estado del objeto, este puede ser; ToDo, InProgress, Done
    *
    * return void
    */
   function listarKanban()
   {
      include '../config/connexioBDD.php';
      /* query por mejorar, ahora solo lista todas por estado, 
      habrá que filtrar por id de usuario(con la sesión cargada en el objeto por ejemplo)*/
      $query = "SELECT * FROM `tasks` WHERE `state` = '$this->Estat';";
      $result = mysqli_query($connexioDB, $query) or trigger_error("Consulta SQL fallida!: $query - Error: " . mysqli_error($connexioDB), E_USER_ERROR);
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
         echo '<div class="alert alert-' . $row["importance"] . '" id="tasca' . $row["id_task"] . '" data-bs-toggle="modal" data-bs-target="#modal' . $row["id_task"] . '" draggable="true" ondragstart="drag(event)">';
         echo $row["name_task"];
         echo '</div>';
         echo '<div class="modal fade" id="modal' . $row["id_task"] . '" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content rounded-4 shadow">
                  <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5" id="ModalLabel"> <i class="fa-solid fa-list-check"></i>' . $row["name_task"] . '</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body py-0"><h2 class="fs-5"><i class="fa-regular fa-clipboard"></i>Descripción</h2><p>'
            . $row["description_task"] .
            '</p><hr><h2 class="fs-5"><i class="fa-regular fa-clock"></i>Fecha</h2><p>' . date("d-m-Y", strtotime($row["start_date"])) . ' a ' . date("d-m-Y", strtotime($row["final_date"])) .
            '</p></div>
                </div>
              </div>
            </div>';
      }
      //mysqli_close($conn);
   }
   /**
    * Sirve para pasarle un json al archivo gantt.js y que pueda crear un objeto
    *
    * return void
    */
   function jsonGantt()
   {
      include '../config/connexioBDD.php';
      $query = $connexioDB->prepare('SELECT name_task, `start_date`, final_date, importance, `percentage`, id_task FROM `tasks`');
      $query->execute();
      $result = $query->get_result();
      $outp = $result->fetch_all();

      echo json_encode($outp);
   }
   /**
    * Modal para la sección Gantt
    *
    * return void
    */
   function modalGantt()
   {
      include '../config/connexioBDD.php';
      // query por mejorar, idem como el método listarKanban
      $query = "SELECT * FROM `tasks`";
      $modal = $connexioDB->query($query);
      while ($row = mysqli_fetch_array($modal, MYSQLI_ASSOC)) {
         echo '<div class="modal fade" id="modal' . $row["id_task"] . '" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                   <div class="modal-content rounded-4 shadow">
                     <div class="modal-header border-bottom-0">
                       <h1 class="modal-title fs-5" id="ModalLabel"> <i class="fa-solid fa-list-check"></i>' . $row["name_task"] . '</h1>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body py-0"><h2 class="fs-5"><i class="fa-regular fa-clipboard"></i>Descripción</h2><p>'
            . $row["description_task"] .
            '</p><hr><h2 class="fs-5"><i class="fa-regular fa-clock"></i>Fecha</h2><p>' . $row["start_date"] . ' a ' . $row["final_date"] .
            '</p>
                   <hr><h2 class="fs-5"><label for="customRange2" class="form-label"><i class="fa-solid fa-percent"></i>Progreso</label></h2></p><p>
                   <form action="saveGantt.php?id=' . $row["id_task"] . '" method="POST">
                   <input type="range" name="porcentaje" class="form-range" min="0" max="100" id="customRange'  . $row["id_task"] .  '"></p></div>
                   <div class="modal-footer flex-column border-top-0">
                   <button type="submit" class="btn btn-lg btn-dark w-100 mx-0">Guardar cambios</button>
                   <button type="button" class="btn btn-lg btn-light w-100 mx-0" data-bs-dismiss="modal">Cerrar</button>
                  </form>
                  </div>
                   </div>
                 </div>
               </div>';
      }
   }
   /**
    * imprimirTareas
    *
    * return void
    */
   function imprimirTareas()
   {
      include '../config/connexioBDD.php';
      //query a mejorar, ahora solo imprime tareas en general
      $query = "SELECT * FROM `tasks`";
      return $connexioDB->query($query);
   }




   function mostrarRecomendacionTarea()
   {
      //Conexión a base de datos
      include '../config/connexioBDD.php';

      //Generamos la consulta
      $query = "SELECT `recommendations`.`name_recommendation`, `recommendations`.`id_recommendation`, `questionnaries`.`name_questionary`,`questions`.`description_question`
      FROM `recommendations`
      INNER JOIN answers ON recommendations.id_answer = answers.id_answer
      INNER JOIN questions ON answers.id_question = questions.id_question
      INNER JOIN questionnaries ON questions.id_questionary = questionnaries.id_questionary
      WHERE questionnaries.id_questionary = $this->id";

      //Generamos la consulta contra la conexión a la BBDD
      $mostrarResultado = $connexioDB->query($query);

      //Creamos un array vacío
      $array = array();

      //creamos un bucle while que recorre la table de la BBDD y recoge el resultao y lo guarda en la variable $row
      while ($row = mysqli_fetch_assoc($mostrarResultado)) {
         //Guarda los resultaos de $row en el $array
         $array[] = $row;
      }
      //Retornamos un Json al que le guardamos el array
      return json_encode($array);
   }

   function modTarea()
   {
      include '../config/connexioBDD.php';
      $query = "UPDATE `tasks` SET `accepted` = $this->Estat WHERE `tasks`.`id_task` = $this->id";
      $connexioDB->query($query);
   }

   #public static function enviarTasquesAcceptades(){
   #print_r("Hola");
   # }

   #public static function enviarTasquesAcceptades(){
   # print_r("Hola");
   #}
}
