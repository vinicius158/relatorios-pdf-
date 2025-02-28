<?php       

header("Content-Type: application/json");     

require("conector.php");    

require("class_admin.php");

session_start();    

if(isset($_POST["dado"])){

$email = $_SESSION["email2"];      

$admin = new Admin();               

$admin->enviando_email2($email,$BD);    

}


?>       