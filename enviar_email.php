<?php        

header("Content-Type: application/json");       

require("conector.php");    

require("class_admin.php");     

session_start();          

if(isset($_POST["email"])){

$admin = new Admin();        

$email = $_POST["email"];    

$response = $admin->enviar_email($email,$BD);   

echo json_encode($response);   

}


?>    