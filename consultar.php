<?php         

header("Content-Type: application/json");           

require("conector.php");    

require("class_admin.php");      

session_start();       

if(isset($_POST["id"])){

$id = $_POST["id"];        

$_SESSION["id"] = $_POST["id"];  

$admin = new Admin();     

$response = $admin->consultar_cliente($id,$BD);       

echo json_encode($response);       

}


?>    