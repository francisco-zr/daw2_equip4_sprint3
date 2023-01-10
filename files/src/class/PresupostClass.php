<?php

# VARIABLES GLOBALS
session_start();
$_SESSION['id'] = 1;

class Presupost
{
    private $id;
    private $preu;
    private $acceptat;
    private $ocult;
    private $presupost;


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

    //ahora declaro una serie de métodos constructores que aceptan diversos números de parámetros
    /**
     * constructor1 --> IDUsuari
     *
     * return void
     */
    function __construct1($presupost)
    {
        $this->id = $_SESSION['id'];
        $this->presupost = $presupost;
    }

    /* Getters */

    public function getId()
    {
        return $this->id;
    }

    public function getPreu()
    {
        return $this->preu;
    }

    public function getAcceptat()
    {
        return $this->acceptat;
    }

    public function getOcult()
    {
        return $this->ocult;
    }

    /* Setters */

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPreu($preu)
    {
        $this->preu = $preu;
    }

    public function setAcceptat($acceptat)
    {
        $this->acceptat = $acceptat;
    }

    public function setOcult($ocult)
    {
        $this->ocult = $ocult;
    }

    /* Mètodes / Funcions */

    public static function showPresupost()
    { //es un metode estatic per a mostrar els camps de la base de dades a la web
        include '../config/connexioBDD.php';        //fitxe de conexio a la base de dades
        //consulta
        $sql = "SELECT DISTINCT budgets.status, users.name_user, users.last_name, companies.name_company, budgets.price FROM budgets INNER JOIN task_budget ON task_budget.id_budget = budgets.id_budget INNER JOIN tasks ON tasks.id_task = task_budget.id_task INNER JOIN users ON users.id_user = tasks.id_user INNER JOIN companies ON companies.id_company = users.id_company;";
        $result = mysqli_query($connexioDB, $sql); //mysqli_query es una funcio de php
        return $result;
    }


    
    /**
     * Method crearPressupost
     *
     * Método para crear un presupuesto vacío
     * 
     * return void
     */
    public function crearPressupost()
    {
        //include del fitxer de connexió a la BBDD
        include '../config/connexioBDD.php';

        //Consulta per a fer l'insert a la BBDD
        $sql = "INSERT INTO `budgets`(`price`, `accepted`, `status`) VALUES (0.0 ,null,'Pending')";

        //Generem la consulta i la guardem a una variable
        $result = mysqli_query($connexioDB, $sql);
    }


    
    public function calcularPressupost($presupost_1, $presupost_2, $presupost_3)
    {
    }

    public function modificarPressupost($id, $presupost)
    {
    }

    // public function eliminarPressupost($id)
    //{
    // include_once '../config/connexioBDD.php';
    // if ($linea = mysqli_query($query = "DELETE ...;")) {
    //     printf("Pressupost eliminat");
    //}
    // $connexioDB->close();
    // }

    public function mostrarPresupostos()
    {
        include '../config/connexioBDD.php';
        //query a mejorar, ahora solo imprime tareas en general
        $query = "SELECT budgets.*, users.id_user, questionnaries.name_questionary 
        FROM budgets 
        INNER JOIN task_budget ON task_budget.id_budget = budgets.id_budget
        INNER JOIN tasks ON tasks.id_task = task_budget.id_task
        INNER JOIN users ON users.id_user = tasks.id_user
        INNER JOIN questionnary_user ON questionnary_user.id_user = users.id_user
        INNER JOIN questionnaries ON questionnaries.id_questionary = questionnary_user.id_questionary
        WHERE users.id_user = 1;";
        $resultado = $connexioDB->query($query);
        $array = array();
        while ($row = mysqli_fetch_assoc($resultado)) {
            $array[] = $row;
        }
        return json_encode($array);
    }

    public function mostrarTasca()
    {
        include '../config/connexioBDD.php';

        $query = "SELECT recommendations.name_recommendation, tasks.id_task, tasks.price, tasks.start_date, tasks.final_date FROM `tasks` INNER JOIN recommendations ON tasks.id_recommendation = recommendations.id_recommendation INNER JOIN questionnaries ON tasks.id_questionary = questionnaries.id_questionary WHERE questionnaries.id_questionary = $this->presupost AND tasks.accepted = 1;";
        return $connexioDB->query($query);
    }

    public function afegirPreuTasca($valor, $id_task)
    {
        include '../config/connexioBDD.php';

        $query = "UPDATE task_budget SET `price`='$valor' WHERE `id_task`='$id_task'";

        return $connexioDB->query($query);
    }
    public function actualitzarData($valor, $id_task)
    {
        include '../config/connexioBDD.php';

        $query = "UPDATE tasks SET `start_date`='$valor',`final_date`='$valor' WHERE `id_task`='$id_task'";

        return $connexioDB->query($query);
    }

    public function mostrarAceptarPresupuesto()
    {
        include '../config/connexioBDD.php';
        //imprime tareas según id_budget para aceptar el presupuesto global
        $query = "SELECT tasks.id_task, tasks.name_task, tasks.description_task, tasks.accepted, task_budget.price
        FROM `task_budget` 
	    INNER JOIN `tasks` ON `task_budget`.`id_task` = `tasks`.`id_task`
        WHERE task_budget.id_budget = $this->presupost";
        $resultado = $connexioDB->query($query);
        $array = array();
        while ($row = mysqli_fetch_assoc($resultado)) {
            $array[] = $row;
        }
        return json_encode($array);
    }

    public function aceptarPresupuesto()
    {
        include '../config/connexioBDD.php';
        $query = "UPDATE `budgets` SET `accepted` = '1', `status` = 'Done' WHERE `budgets`.`id_budget` = $this->presupost";
        $connexioDB->query($query);
    }

    public function modificarPresupuesto()
    {
        include '../config/connexioBDD.php';
        $query = "UPDATE `budgets` SET `accepted` = '0', `status` = 'Waiting' WHERE `budgets`.`id_budget` = $this->presupost";
        $connexioDB->query($query);
    }
}
