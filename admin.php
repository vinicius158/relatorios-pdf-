<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel administrativo</title>     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">        
    <script src="https://kit.fontawesome.com/b9092d7591.js" crossorigin="anonymous"></script>         
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>        
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
    <link rel = "stylesheet" href = "css/estilo_admin.css">     
</head>
<body>     

  <?php         

  session_start();       
  
  if(!isset($_SESSION["email"])){

   header("Location:login.php");   

  }        

  require("gerar_pdf.php");     

  ?>   
<nav class="navbar-dark navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link" href="login.php?saindo">Sair</a>  
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3"> Alterar senha</a>            
        </li>
      </ul>         

      <div class="user">

      <p class = "txt">Olá administrador</p>

      <i class="fa-solid fa-user"></i>    

      </div>       

    </div>
  </div>
</nav>       

<div class="container">         

   <div class="container" id = "topo">    
         
   <p class="txt2">Clientes cadastrados</p>    
   
   <form>       

   <input type = "text" placeholder = "Digite o nome" id = "campo">       
   <button class = "pesquisa"><i class="fa-solid fa-magnifying-glass"></i></button>

   </form>   

   <div class="buttons">     
   
   <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">Novo cliente <i class="fa-solid fa-plus"></i></button>       
   <a href = "admin.php?pdf"><button type="button" class="btn btn-dark" id = "pdf">Gerar relatório <i class="fa-solid fa-file-pdf"></i></button></a>      
   <button type="button" class="btn btn-dark" id = "limpar">Limpar tudo <i class="fa-solid fa-trash"></i></button>         

   </div>

   </div>          

   <div class="table">

   <table class="table table-dark table-striped">    
   <thead>
   <tr>
  <td class="table-dark">Nome</td>
  <td class="table-dark">E-mail</td>
  <td class="table-dark">Idade</td>    
  <td class="table-dark">Sexo</td>   
  <td class="table-dark">Cidade</td>        
  <td class="table-dark">Editar</td>     
  <td class="table-dark">Excluir</td>              
  </tr>
</thead>   

<tbody id ="resultados">  
    
      
</tbody>
    
   </table>   
   
   </div>        

</div>          

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Adicione um novo cliente</h1>     
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form id = "adicionar">     

  <div class="mb-3">
    <input type="text" class="form-control" id="nome2" aria-describedby="emailHelp" placeholder = "Nome" maxlength = "35">
  </div>
  <div class="mb-3">
    <input type="email" class="form-control" id="email2" placeholder = "E-mail" maxlength = "40">                  
  </div>          

  <div class="mb-3">
    
    <input type="number" class="form-control" id="idade2" placeholder = "Idade" min = "18">    
    
  </div>     

  <select class="form-select" aria-label="Default select example" id = "sexo2">   

  <option selected>Sexo</option>   

  <option value="Masculino">Masculino</option>   

  <option value="Feminino">Feminino</option>       

</select>          

<select class="form-select" aria-label="Default select example" id = "cidade2">   

  <option selected>Cidade</option>     

  <option value="São Vicente">São Vicente</option>   

  <option value="Praia grande">Praia grande</option>      
  
  <option value="Santos">Santos</option>        

  <option value="Cubatão">Cubatão</option>         

</select>  
 
  <div class="adicionar"><button type="submit" class="btn btn-primary" >Adicionar cliente</button></div>  
  
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
   
  <div class="message2">         

  </div>     

</div>     

</form>          
             
      </div>
    </div>
  </div>
</div>            

<div class="modal fade" id="editor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edição de dados</h1>   
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
           
      <form id = "editar_cliente">

  <div class="mb-3">
    <input type="text" class="form-control" id="nome3" aria-describedby="emailHelp" placeholder = "Nome" maxlength = "35">
  </div>
  <div class="mb-3">
    <input type="email" class="form-control" id="email3" placeholder = "E-mail" maxlength = "40">                  
  </div>          

  <div class="mb-3">
    
    <input type="number" class="form-control" id="idade3" placeholder = "Idade" min = "18">    
    
  </div>     

  <select class="form-select" aria-label="Default select example" id = "sexo3">    

  <option id = "sexo4" value="" disabled selected></option>

  <option value="Masculino">Masculino</option>   

  <option value="Feminino">Feminino</option>       

</select>          

<select class="form-select" aria-label="Default select example" id = "cidade3">   

  <option id = "cidade4" value="" disabled selected></option>   

  <option value="São Vicente">São Vicente</option>   

  <option value="Praia grande">Praia grande</option>      
  
  <option value="Santos">Santos</option>        

  <option value="Cubatão">Cubatão</option>         

</select>  
 
  <div class="adicionar"><button type="submit" class="btn btn-primary">Atualizar</button></div>        
  
  </form>    
  
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


  <div class="message3">      
<!---
<div class="alert alert-success d-flex align-items-center" role="alert" id = "alert">
  <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:" width = "24" height = "24"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    Atualização realizada com sucesso !!!   
  </div>
</div>    --->        

</div>             

      </div>
    </div>
  </div>
</div>         

<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Atualização de senha</h1>   
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>        

      <form id ="update_senha">

      <div class="modal-body">
         
      <div class="mb-3">   

    <input type="email" class="form-control" id="email" placeholder = "E-mail" maxlength = "40">   

     </div>  

     <div class="mb-3">   

    <input type="password" class="form-control" id="senha" placeholder = "Senha atual">   
                   
     </div>       

     <div class="mb-3">   

    <input type="password" class="form-control" id="senha2" placeholder = "Nova senha">   
               
    </div> 

    <div class="adicionar"><button type="submit" class="btn btn-primary">Alterar senha</button></div>        
    
    </form>    

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

    </div> 

      </div>

    </div>

  </div>

</div>            

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>            

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>       

<script src = "js/update_senha.js"></script>         

<script src = "js/cadastrar_cliente.js"></script>     

<script src = "js/listar_clientes.js"></script>        

<script src = "js/pesquisa.js"></script>    

<script src = "js/excluir_cliente.js"></script>      

<script src = "js/limpar_tudo.js"></script>        

<script src = "js/editar_cliente.js"></script>            

<script src = "js/gerar_pdf.js"></script>    

</body>       

</html>