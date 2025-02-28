<?php       

header("Content-Type: application/json");        

require("conector.php");    

require("class_admin.php");   

if(isset($_POST["limpar"])){

$admin = new Admin();      

$response = $admin->limpar_tudo($BD);       

echo json_encode($response);     

}

?>     