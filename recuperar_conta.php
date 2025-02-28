<?php       

header("Content-Type: application/json");       

require("conector.php");    

require("class_admin.php");        

if(isset($_POST["email"]) && isset($_POST["senha"])){

$email = $_POST["email"];     

$senha = password_hash($_POST["senha"],PASSWORD_DEFAULT);     

$admin = new Admin();          

$response = $admin->update_senha2($email,$senha,$BD);    

echo json_encode($response);             

}


?>    