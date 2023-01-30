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
        //un metode estatic es un metode que pertany a la propia classe que en aquest cas la classe es Presupost
        include '../config/connexioBDD.php';        //fitxe de conexio a la base de dades
        //consulta
        $sql = "SELECT users.name_user, users.last_name, companies.name_company, tasks.start_date, tasks.final_date, budgets.status, budgets.id_budget 
        FROM users 
        INNER JOIN companies ON users.id_company = companies.id_company 
        INNER JOIN tasks ON users.id_user = tasks.id_user 
        INNER JOIN budgets ON tasks.id_budget = budgets.id_budget
        GROUP BY id_budget
        ORDER BY budgets.status";
        $result = mysqli_query($connexioDB, $sql); //mysqli_query es una funcio de php, per a executar
        return $result;
    }



    /**
     * Method crearPressupost
     *
     * Método para crear un presupuesto vacío
     * 
     * return last_id
     */
    public function crearPressupost()
    {
        //include del fitxer de connexió a la BBDD
        include '../config/connexioBDD.php';

        //Consulta per a fer l'insert a la BBDD
        $sql = "INSERT INTO `budgets` (`price`, `accepted`, `status`) 
        VALUES (0.0 ,null,'Pending');";



        //Generem la consulta
        $connexioDB->query($sql);

        //Recuperar el ID del último registro insertado
        $last_id = $connexioDB->insert_id;

        //Devuelve el valor de la variable $last_id
        return $last_id;
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
        $query = "SELECT budgets.*, questionnaries.name_questionary 
        FROM budgets
        INNER JOIN tasks ON tasks.id_budget = budgets.id_budget
        INNER JOIN questionnaries ON questionnaries.id_questionary = tasks.id_questionary
        WHERE tasks.id_user = 1 GROUP BY budgets.id_budget";
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

        $query = "SELECT recommendations.name_recommendation, tasks.id_task, tasks.price, tasks.start_date, tasks.final_date 
        FROM `tasks` 
        INNER JOIN recommendations ON tasks.id_recommendation = recommendations.id_recommendation 
        INNER JOIN questionnaries ON tasks.id_questionary = questionnaries.id_questionary 
        INNER JOIN budgets ON tasks.id_budget = budgets.id_budget
        WHERE  budgets.id_budget = $this->presupost";

        return $connexioDB->query($query);
    }

    public function afegirPreuTasca($valor, $id_task, $data_i, $data_f)
    {
        include '../config/connexioBDD.php';

        $query = "UPDATE tasks SET `price`='$valor',`start_date`='$data_i',`final_date`='$data_f' WHERE `id_task`='$id_task'";

        return $connexioDB->query($query);
    }

    public function mostrarAceptarPresupuesto()
    {
        include '../config/connexioBDD.php';
        //imprime tareas según id_budget para aceptar el presupuesto global
        $query = "SELECT `tasks`.id_task, `recommendations`.`name_recommendation` AS name_task, recommendations.description_recommendation AS description_task, tasks.accepted, tasks.price, tasks.manages, impacts.name_type_impact 
        FROM `tasks` 
        INNER JOIN `recommendations` ON `tasks`.`id_recommendation` = `recommendations`.`id_recommendation` 
        INNER JOIN impacts ON impacts.id_impact = tasks.id_impact 
        WHERE tasks.id_budget = $this->presupost
        ORDER BY `tasks`.id_task";
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
        $query = "UPDATE `budgets` SET `accepted` = '1', price = (SELECT SUM(price) 
        FROM tasks WHERE tasks.id_budget = $this->presupost AND tasks.accepted = 1), `status` = 'Done' WHERE `budgets`.`id_budget` = $this->presupost;";
        $connexioDB->query($query);
    }

    public function modificarPresupuesto()
    {
        include '../config/connexioBDD.php';
        $query = "UPDATE `budgets` SET `accepted` = '0', price = (SELECT SUM(price) 
        FROM tasks WHERE tasks.id_budget = $this->presupost AND tasks.accepted = 1), `status` = 'Waiting' WHERE `budgets`.`id_budget` = $this->presupost;";
        $connexioDB->query($query);
    }
}
