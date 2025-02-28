<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">        
    <script src="https://kit.fontawesome.com/b9092d7591.js" crossorigin="anonymous"></script>         
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>        
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
    <link rel = "stylesheet" href = "css/estilo_login.css">
</head>
<body>     

<?php       

session_start();             

if(!isset($_SESSION["email3"])){

header("Location:recuperar2.php");   

}

?>       

<div class="container">
  <!-- Content here -->     
    
  <div class="form">    
    
  <div class="topo">
   
  <i class="fa fa-user-circle"></i>      

  </div>

  <div class="input">
   
  <form id = "dados">       

  <div class="input-group flex-nowrap">

  <input type="email" class="form-control" placeholder="E-mail" aria-label="Username" aria-describedby="addon-wrapping" id = "email">
  </div>      

<div class="input-group flex-nowrap">
  <input type="password" class="form-control" placeholder="Nova senha" aria-label="Username" aria-describedby="addon-wrapping" id = "senha">
</div>        

<div class="input-group flex-nowrap">
  <input type="password" class="form-control" placeholder="Repita a senha" aria-label="Username" aria-describedby="addon-wrapping" id = "senha2">
</div> 

<button type="submit" class="btn btn-primary">Atualizar senha</button>

</form>         

<div class="recuperar">    

<p class = "txt"><a href = "login.php"> Página de login</a></p>             

</div>

<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
  <symbol id="check-circle-fill" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>   

<div class="message">

<!--
<div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:" width="24" height="24"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
   Dados inválidos !!!! 
  </div>
</div>   -->            

</div>      

  </div>


  </div>


</div>    

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>            

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>        

<script src = "js/recuperando.js"></script>

</body>
</html>