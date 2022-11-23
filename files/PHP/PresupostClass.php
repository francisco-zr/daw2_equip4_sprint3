<?php

# VARIABLES GLOBALS
session_start();
$_SESSION['id'] = 1;

    class Presupost{
        private $id;
        private $preu; 
        private $acceptat;
        private $ocult;


        /**
     * __construct
     *
     * @param  mixed $idUsuari
     * @return void
     */

    function __construct(){
		//obtengo un array con los parámetros enviados a la función
		$params = func_get_args();
		//saco el número de parámetros que estoy recibiendo
		$num_params = func_num_args();
		//cada constructor de un número dado de parámtros tendrá un nombre de función
		//atendiendo al siguiente modelo __construct1() __construct2()...
		$funcion_constructor ='__construct'.$num_params;
		//compruebo si hay un constructor con ese número de parámetros
		if (method_exists($this,$funcion_constructor)) {
			//si existía esa función, la invoco, reenviando los parámetros que recibí en el constructor original
			call_user_func_array(array($this,$funcion_constructor),$params);
		}
	}
  
	//ahora declaro una serie de métodos constructores que aceptan diversos números de parámetros
	/**
     * constructor1 --> IDUsuari
     *
     * @return void
     */
    function __construct1()
	{
		$this->id=$_SESSION['id'];
	}

        /* Getters */

        public function getId() {
            return $this->id;
        }

        public function getPreu() {
            return $this->preu;
        }

        public function getAcceptat() {
            return $this->acceptat;
        }

        public function getOcult() {
            return $this-> ocult;
        }

        /* Setters */

        public function setId($id) {
            $this->id = $id;
        }

        public function setPreu($preu) {
            $this->preu = $preu;
        }

        public function setAcceptat($acceptat) {
            $this->acceptat = $acceptat;
        }

        public function setOcult($ocult) {
            $this->ocult = $ocult;
        }

        /* Mètodes / Funcions */

        public function calcularPresupost($presupost_1, $presupost_2, $presupost_3){
            
        }

        public function modificarPresupost($id, $presupost){
    
        }

        public function eliminarPresupost($id){
            include_once 'connexioBDD.php';
            if ($linea = mysqli_query ($query= "DELETE ...;")){
                printf ("Pressupost eliminat");
            }
            $connexioDB->close();
        }

        public function mostrarTasca(){
            include 'connexioBDD.php';
            
            $query = "SELECT * FROM tasks ;";
            return $connexioDB->query($query);
        }

        public function afegirPreuTasca($valor, $id_task){
            include 'connexioBDD.php';

          $query = "INSERT INTO task_budget(price, id_task, id_budget) VALUES ($valor, $id_task, 1)";
          return $connexioDB->query($query);
        }
    }