<?php       

header("Content-Type: application/json");         

require("conector.php");    

require("class_admin.php");      

if(isset($_POST["id_cliente"])){

$id_cliente = $_POST["id_cliente"];           

$admin = new Admin();     

$response = $admin->excluir_cliente($id_cliente,$BD);           

echo json_encode($response);     

}

?>      