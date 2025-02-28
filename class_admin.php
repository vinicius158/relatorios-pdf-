<?php    

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;    

class Admin{

public function login($email,$senha,$BD){    

session_start();    

$sql = "SELECT senha FROM admin WHERE email = :email";         

$comand = $BD->prepare($sql);     

$comand->bindValue(":email",$email);         

if($comand->execute()){

$number = $comand->rowCount();      

if($number > 0){
    
$retorno = $comand->fetch(PDO::FETCH_ASSOC);                

$hash = $retorno["senha"];    

if(password_verify($senha,$hash)){      

$_SESSION["email"] = $email;        

return true;   

}else{

return false;   

}


}else{

return false;   

}

}else{

return "erro";    

}

}     

public function update_senha($email,$senha,$senha2,$BD){

$sql = "SELECT senha FROM admin WHERE email = :email";       

$comand = $BD->prepare($sql);            

$comand->bindValue(":email",$email);         

if($comand->execute()){

$number = $comand->rowCount();          

if($number > 0){

$retorno = $comand->fetch(PDO::FETCH_ASSOC);         

$hash = $retorno["senha"];            

if(password_verify($senha,$hash)){

$sql = "UPDATE admin SET senha = :senha2 WHERE email = :email";          

$comand = $BD->prepare($sql);      

$comand->bindValue(":email",$email);  

$comand->bindValue(":senha2",$senha2);     

if($comand->execute()){

return true;    

}else{

return "erro";       

}

}else{

return false;  

}

}else{

return false;    

}


}else{

return "erro";       

   }

 }       

 public function cadastrar_cliente($nome,$email,$idade,$sexo,$cidade,$BD){

 $sql = "INSERT INTO cliente(nome,email,idade,sexo,cidade) VALUES(:nome,:email,:idade,:sexo,:cidade)";     
 
 $comand = $BD->prepare($sql);      

 $comand->bindValue(":nome",$nome);    
 $comand->bindValue(":email",$email);   
 $comand->bindValue(":idade",$idade);     
 $comand->bindValue(":sexo",$sexo);          
 $comand->bindValue(":cidade",$cidade);        

 if($comand->execute()){
  
 return true;   

 }else{

 return false;    

 }


 }     

public function excluir_cliente($id_cliente,$BD){

$sql = "DELETE FROM cliente WHERE id_cliente = $id_cliente";      

$comand = $BD->prepare($sql);     

if($comand->execute()){

return true;   

}else{

return false;    

}

}            


public function limpar_tudo($BD){

  $sql = "DELETE FROM cliente";           

  $comand = $BD->prepare($sql);     
  
  if($comand->execute()){
  
  return true;   
  
  }else{
  
  return false;    
  
  }

}       

public function consultar_cliente($id,$BD){     

$sql = "SELECT nome,email,idade,sexo,cidade FROM cliente WHERE id_cliente = :id_cliente";      

$comand = $BD->prepare($sql);       

$comand->bindValue(":id_cliente",$id);          

if($comand->execute()){

$vetor = $comand->fetch(PDO::FETCH_ASSOC);             

$response["nome"] = $vetor["nome"];       
$response["email"] = $vetor["email"];          
$response["idade"] = $vetor["idade"];          
$response["sexo"] = $vetor["sexo"];              
$response["cidade"] = $vetor["cidade"];   

return $response;   

}

}    
 
    
public function editar_cliente($id,$nome,$email,$idade,$sexo,$cidade,$BD){

$sucesso = 0;    

$cont = 0;        

if(!empty($nome)){     

$cont++;   

$sql = "UPDATE cliente SET nome = :nome WHERE id_cliente = :id";         

$comand = $BD->prepare($sql);           

$comand->bindValue(":nome",$nome);      

$comand->bindValue(":id",$id);      

if($comand->execute()){

$sucesso++;     

}  

}        

if(!empty($email)){

  $cont++;   

  $sql = "UPDATE cliente SET email = :email WHERE id_cliente = :id";         
  
  $comand = $BD->prepare($sql);           
  
  $comand->bindValue(":email",$email);         
  
  $comand->bindValue(":id",$id);      
  
  if($comand->execute()){
  
  $sucesso++;     
  
  }  


}          

if(!empty($idade)){

  $cont++;   

  $sql = "UPDATE cliente SET idade = :idade WHERE id_cliente = :id";         
  
  $comand = $BD->prepare($sql);           
  
  $comand->bindValue(":idade",$idade);      
  
  $comand->bindValue(":id",$id);      
  
  if($comand->execute()){
  
  $sucesso++;     
  
  }  

}       

if(!empty($sexo)){

  $cont++;   

  $sql = "UPDATE cliente SET sexo = :sexo WHERE id_cliente = :id";         
  
  $comand = $BD->prepare($sql);           
  
  $comand->bindValue(":sexo",$sexo);      
  
  $comand->bindValue(":id",$id);      
  
  if($comand->execute()){
  
  $sucesso++;     
  
  }  

}  

if(!empty($cidade)){

  $cont++;   

  $sql = "UPDATE cliente SET cidade = :cidade WHERE id_cliente = :id";         
  
  $comand = $BD->prepare($sql);           
  
  $comand->bindValue(":cidade",$cidade);      
  
  $comand->bindValue(":id",$id);      
  
  if($comand->execute()){
  
  $sucesso++;     
  
  }  

}       

if($sucesso == $cont){

return true;    

}else{

return false;   

}



}       

public function enviar_email($email,$BD){           

  $codigo = "";   

  $sql = "SELECT * FROM admin WHERE email = :email";      

  $comand = $BD->prepare($sql);          

  $comand->bindValue(":email",$email);         
  
  if($comand->execute()){

  $number = $comand->rowCount();          

  if($number > 0){
    
    for($i = 0; $i <= 5; $i++){
     
    $codigo .= rand(0,9);      

    }          
    
    $codigo2 = password_hash($codigo,PASSWORD_DEFAULT);         

    $query = "SELECT * FROM cd_email";         
    
    $comand = $BD->prepare($query);       

    $comand->execute();           

    $resultados = $comand->rowCount();           

    if($resultados == 0){

    $sql = "INSERT INTO cd_email(codigo) VALUES('$codigo2')";         

    $comand = $BD->prepare($sql);      

    $comand->execute();      
    
    $this->enviando_email($email,$codigo);      
    
    $_SESSION["email2"] = $email; 

    return "sucesso";             


    }else{             

      $sql = "UPDATE cd_email SET codigo = '$codigo2'";         

      $comand = $BD->prepare($sql);      
  
      $comand->execute();         
      
      $this->enviando_email($email,$codigo);                    

      $_SESSION["email2"] = $email;        

      return "sucesso";   

    }
  

  }else{     

    /**Email não existe no sistema */

  return "incorreto";    

  }


  }else{      

    /**Erro de conexão com o Banco de dados*/     

  return false;     

  }


}        

private function enviando_email($email,$codigo){      

  require "email/vendor/autoload.php";                  

  $senha2 = "axtbztdkuemphpll"; 

  $mail = new PHPMailer();    
  $body = "";   
  $address = $email;       
  $subject = utf8_decode("Recuperação da conta");                           
  $body .="";        
  $body .= utf8_decode("<p>Seu código é : $codigo</p>");           

  $mail->isSMTP();
  $mail->SMTPOptions = array(
      'ssl' => array(
          'verify_peer' => false, 
          'verify_peer_name' => false, 
          'allow_self_signed' => true
      )
  );
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'tls';
  $mail->Username = 'vinicius.bispo013@gmail.com';
  $mail->Password = $senha2;
  $mail->setFrom('vinicius.bispo013@gmail.com', "Sistema administrativo");     
  $mail->addAddress($email, 'Contato');   
  $mail->Port = 587;    
  $mail->isHTML(true);
  $mail->Subject = $subject;
  $mail->Body = $body;      

  $mail->send();   

}     

public function enviando_email2($email,$BD){      
   
  $codigo = "";   

  for($i = 0; $i <= 5; $i++){
     
    $codigo .= rand(0,9);      

  }       


  $codigo2 = password_hash($codigo,PASSWORD_DEFAULT);            

  $sql = "UPDATE cd_email SET codigo = '$codigo2'";         

  $comand = $BD->prepare($sql);      

  $comand->execute();       


  require "email/vendor/autoload.php";                  

  $senha2 = "axtbztdkuemphpll"; 

  $mail = new PHPMailer();    
  $body = "";   
  $address = $email;       
  $subject = utf8_decode("Recuperação da conta");                           
  $body .="";        
  $body .= utf8_decode("<p>Seu código é : $codigo</p>");           

  $mail->isSMTP();
  $mail->SMTPOptions = array(
      'ssl' => array(
          'verify_peer' => false, 
          'verify_peer_name' => false, 
          'allow_self_signed' => true
      )
  );
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'tls';
  $mail->Username = 'vinicius.bispo013@gmail.com';
  $mail->Password = $senha2;
  $mail->setFrom('vinicius.bispo013@gmail.com', "Sistema administrativo");     
  $mail->addAddress($email, 'Contato');   
  $mail->Port = 587;    
  $mail->isHTML(true);
  $mail->Subject = $subject;
  $mail->Body = $body;      

  $mail->send();   

}

public function verificar($BD,$codigo){    

session_start();   

$sql = "SELECT codigo FROM cd_email";        

$comand = $BD->prepare($sql);        

if($comand->execute()){

$response = $comand->fetch(PDO::FETCH_ASSOC);          

$hash = $response["codigo"];          

if(password_verify($codigo,$hash)){        

$_SESSION["email3"] = $_SESSION["email2"];   

return true;   

}else{

return false;      

}

}else{     

  /**Erro de conexão com o banco de dados */

return "erro";    

}


}     

public function update_senha2($email,$senha,$BD){        

$sql = "UPDATE admin SET senha = :senha WHERE email = :email";       

$comand = $BD->prepare($sql);            

$comand->bindValue(":email",$email);      

$comand->bindValue(":senha",$senha);        

if($comand->execute()){

return true;     

}else{

return false;        

}

}

}

?>   