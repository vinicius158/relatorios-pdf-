<?php   

header("Content-Type: application/json");         

require("conector.php");    

require("class_admin.php");      

if(isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["idade"]) && isset($_POST["sexo"]) && isset($_POST["cidade"])){

$nome = $_POST["nome"];    
$email = $_POST["email"];     
$idade = $_POST["idade"];    
$sexo = $_POST["sexo"];       
$cidade = $_POST["cidade"];         

$admin = new Admin();      

$response = $admin->cadastrar_cliente($nome,$email,$idade,$sexo,$cidade,$BD);       

echo json_encode($response);        


}


?>   