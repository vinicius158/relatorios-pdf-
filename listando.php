<?php       

header("Content-Type: application/json");   

if(isset($_POST["request"])){

session_start();        

require("conector.php");    

if(isset($_SESSION["pesquisa"])){

$pesquisa = $_SESSION["pesquisa"];             

}else{

$pesquisa = "";    

}      

$sql = "SELECT id_cliente,nome,email,idade,sexo,cidade FROM cliente WHERE nome LIKE '%$pesquisa%' ORDER BY id_cliente DESC";          

$comand = $BD->prepare($sql);            

$html = "";         

if($comand->execute()){      

  if($comand->rowCount() > 0){

while($response = $comand->fetch(PDO::FETCH_ASSOC)){     

$nome = $response["nome"];    
$email = $response["email"];    
$idade = $response["idade"];    
$sexo = $response["sexo"];          
$cidade = $response["cidade"];        
$id_cliente = $response["id_cliente"];       
 
$html .= "<tr><td class='table-dark'>$nome</td>
 <td class='table-dark'>$email</td>
 <td class='table-dark'>$idade</td>    
 <td class='table-dark'>$sexo</td>   
 <td class='table-dark'>$cidade</td>        
 <td class = 'table-dark'><button type='button' class='btn btn-danger' data-id = '$id_cliente' id = 'editar' data-bs-toggle='modal' data-bs-target='#editor'><i class='fa fa-pencil' aria-hidden='true'></i></button></td>          
 <td class = 'table-dark'><button type='button' class='btn btn-danger'data-id = '$id_cliente' id = 'excluir'><i class='fa fa-trash-o'></i></button></td>        
</tr>";


}      

  }else{

   $html = "<h3>Nenhum cliente encontrado !!!!</h3>";     

  }

}   

echo json_encode($html);     

}    

   

?>