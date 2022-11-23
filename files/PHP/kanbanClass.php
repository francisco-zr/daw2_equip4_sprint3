<?php
    // está unificada con la clase tasca, clase inservible
    class Kanban{
        public $id;
        public $idTasca;
        public $nomTasca;
        public $descripcioTasca;
        public $estat;
        public $assignament;

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
         * consultaKanban 
         *
         * @return array
         */

        function consultarKanban($id){
            include_once 'connexioBDD.php';
            if ($linea = mysqli_query ($query= "SELECT * FROM Kanban WHERE id.Kanban = '$id';")){
            }
            $connexioDB->close();
            return $linea;
        }
         /**
         * consultaTasca 
         *
         * @return array
         */
        function consultaTasca($idTasca){
            include_once 'connexioBDD.php';
            if ($linea = mysqli_query ($query= "SELECT * FROM Tasca ... ;")){
            }
            $connexioDB->close();
            return $linea;
        }
         /**
         * assignnarKanban 
         *
         * @return void
         */
        function assignarTasca($idTasca,$idUsuari){
            include_once 'connexioBDD.php';
            if ($linea = mysqli_query ($query= "UPDATE ... ;")){
            }
            $connexioDB->close();
            return $linea;

        }

        /**
         * modificarEstat 
         * 
         * @return void
         */
        function modificarEstat(){
            include_once 'connexioBDD.php';
            if ($linea = mysqli_query ($query= "UPDATE ... ;")){
            }
            $connexioDB->close();
            return $linea;
        }
    }
?>