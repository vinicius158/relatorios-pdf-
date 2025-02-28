<?php       

header("Content-Type: applcation/json");        

require("conector.php");          

require("class_admin.php");       

if(isset($_POST["codigo"])){   

$codigo = $_POST["codigo"];

$admin = new Admin();                

$response = $admin->verificar($BD,$codigo);       

echo json_encode($response);         

}


?>    