<?php         

header("Content-Type: application/json");      

session_start();          

if(isset($_POST["pesquisa"])){

$_SESSION["pesquisa"] = $_POST["pesquisa"];     

}

?>     