<?php   

$servidor = "localhost";    
$usuario = "root";       
$senha = "";    
$banco = "relatorio";      

try{

$BD = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);      

$BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  


}catch(PDOException $e){

echo "Messagem ".$e->getMessage();    

}


?>   