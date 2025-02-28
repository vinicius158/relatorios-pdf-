<?php   

header("Content-Type: application/json");      

require("conector.php");     

require("class_admin.php");     

if(isset($_POST["email"]) && isset($_POST["senha"]) && isset($_POST["senha2"])){

$email = $_POST["email"];    

$senha = $_POST["senha"];     

$senha2 = password_hash($_POST["senha2"],PASSWORD_DEFAULT);                    

$admin = new Admin();    

$response = $admin->update_senha($email,$senha,$senha2,$BD);     

echo json_encode($response);     

}



?>    