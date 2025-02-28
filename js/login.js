$("#login").submit(function(e){

e.preventDefault();                  

let email = $("#email").val();    

let senha = $("#senha").val();           

if(email.length === 0 || senha.length === 0){

$(".message").html("<div class='alert alert-danger d-flex align-items-center'role='alert'><svg class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:' width='24' height='24'><use xlink:href='#exclamation-triangle-fill'/></svg><div>Preencha todos os campos !!! </div></div>");

}else{

$.ajax({

url:"entrar.php",       
method:"POST",     
dataType:"json",        
data:{email:email,senha:senha}   

}).done(function(response){

if(response){

window.location.href = "admin.php";      

}else{        

    if(response == "erro"){

    $(".message").html("<div class='alert alert-danger d-flex align-items-center'role='alert'><svg class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:' width='24' height='24'><use xlink:href='#exclamation-triangle-fill'/></svg><div>Erro de conexão </div></div>");   

    } else{

    $(".message").html("<div class='alert alert-danger d-flex align-items-center'role='alert'><svg class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:' width='24' height='24'><use xlink:href='#exclamation-triangle-fill'/></svg><div>Dados inválidos !!!! </div></div>");
    
    }
}

});        


}      

});    