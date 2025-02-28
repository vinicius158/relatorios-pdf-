<?php         

header("Content-type: application/json");      

require("conector.php");     

require("class_admin.php");         

session_start();      

if(isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["idade"]) && isset($_POST["sexo"]) && isset($_POST["cidade"])){

$admin = new Admin();          

$id = $_SESSION["id"];       
$nome = $_POST["nome"];  
$email = $_POST["email"];    
$idade = $_POST["idade"];    
$sexo = $_POST["sexo"];         
$cidade = $_POST["cidade"];          

$response = $admin->editar_cliente($id,$nome,$email,$idade,$sexo,$cidade,$BD);         

echo json_encode($response);          

}

?>        