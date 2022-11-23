<?php 
include "/../../TascaClas.php";
# VARIABLES GLOBALS
session_start();
$_SESSION['id'] = 2;

$count = 0;
$numlinesReals= contarLinies();
$numPagActual= 1;

$solucio=$_POST["solucio"];
$gridcheck=$_POST["gridcheck"];
$gestio=$_POST["gestio"];


function insertarTarea($solucio,$gridcheck,$gestio){
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
            AND recommendations.description_recommendation ='$solucio'
            ORDER BY recommendations.id_recommendation; 
            ";
    $linies = mysqli_query($connexioDB,$query);
    $linia = mysqli_fetch_array($linies);
    return $linia;
}


# Consulta insidencia
function consultaincidencia(){
    include_once 'connexioBDD.php';
    $id_user= $SESSION["id"];
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

}


# Consulta les dades necessaries
function consultaDades(){
    include_once 'connexioBDD.php';
    $id_user= $SESSION["id"];

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
    $connexioDB->close();
    $linies=mysqli_fetch_array($linies);
    return $linies;
}

# Mostrar dades 
function mostrarDades(){
    $linies = consultaDades();
    if ($count === 0){
        printf($linies[$numPagActual-1]);
    }else{
        $count ++;
        printf($linies[$numPagActual-1]);
    }
}

# Mostra la info seguent del div
function seguentDataDiv($linies){
    $numPagActual+1;
    mostrarDades();
}

# Mostra la info anterior del div
function anteriorDataDiv($linies){
    $numPagActual-1;
    mostrarDades();
    }

# Conta cuantes linies te la consulta per mostrar el num de pag
function contarLinies(){
    include_once 'connexioBDD.php';
    $query= "
        SELECT COUNT(column_name)
        FROM table_name
        WHERE condition; 
    
    ";
    $numlines = mysqli_query ();
    $connexioDB->close();
    return $numlines; 
}



?>
//

