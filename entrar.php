<?php    

header("Content-type: application/json");    

require("conector.php");           

require("class_admin.php");    

if(isset($_POST["email"]) && isset($_POST["senha"])){

$email = $_POST["email"];   

$senha = $_POST["senha"];   

$admin = new Admin();         

$response = $admin->login($email,$senha,$BD);       

echo json_encode($response);   


}

?>   