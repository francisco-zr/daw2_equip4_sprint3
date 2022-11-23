<?php
// está unificada con la clase Tasca, clase inservible
# VARIABLES GLOBALS
session_start();
$_SESSION['id'] = 1;

class Gant
{
    private $idGant;
    private $idTasca;
    private $descripcio;
    private $idUsuari;
    
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
		$this->idUsuari=$_SESSION['id'];
	} 
    
    
    
    /**
     * assignarTasca
     *
     * @return void
     */
    private function assignarTasca(){
        include_once 'connexioBDD.php';
        if ($linea = mysqli_query ($query= "UPDATE ... ;")){
            printf ("Tasca assignada");
        }
        $connexioDB->close();
    }          
    /**
     * establirDurada
     *
     * @return void
     */
    private function establirDurada(){
        include_once 'connexioBDD.php';
        if ($linea = mysqli_query ($query= "UPDATE ... ;")){
            printf ("Durada establida");
        }
        $connexioDB->close();
    }    
    /**
     * eliminarTasca
     *
     * @return void
     */
    private function eliminarTasca(){
        include_once 'connexioBDD.php';
        if ($linea = mysqli_query ($query= "DELETE ... ;")){
            printf ("Tasca eliminada");
        }
        $connexioDB->close();
    }    
    /**
     * modificarDurada
     *
     * @return void
     */
    private function modificarDurada(){
        include_once 'connexioBDD.php';
        if ($linea = mysqli_query ($query= "UPDATE ... ;")){
            printf ("Durada modificada");
        }
        $connexioDB->close();
    }    
    /**
     * desactivarTasca
     *
     * @return void
     */
    private function desactivarGant(){
        include_once 'connexioBDD.php';
        if ($linea = mysqli_query ($query= "DELETE ... ;")){
            printf ("Gantt desactivat");
        }
        $connexioDB->close();
    }
}
