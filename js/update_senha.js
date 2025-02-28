$("#update_senha").submit(function(e){

e.preventDefault();     

let email = $("#email").val();       

let senha = $("#senha").val();         

let senha2 = $("#senha2").val();    

if(email.length === 0 || senha.length === 0 || senha2.length === 0){

$(".message").html("<div class='alert alert-danger d-flex align-items-center'role='alert'><svg class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:' width='24' height='24'><use xlink:href='#exclamation-triangle-fill'/></svg><div>Preencha todos os campos !!! </div></div>");     

}else{

$.ajax({

url:"update_senha.php",      
method:"POST",     
dataType:"json",     
data:{email:email,senha:senha,senha2:senha2}

}).done(function(response){

if(response){

$(".message").html("<div class='alert alert-success d-flex align-items-center' role='alert' id = 'alert'><svg class='bi flex-shrink-0 me-2' role='img' aria-label='Success:' width = '24' height = '24'><use xlink:href='#check-circle-fill'/></svg><div>Senha atualizada com sucesso !!!</div></div>");   

}else{

if(response == "erro"){

    $(".message").html("<div class='alert alert-danger d-flex align-items-center'role='alert'><svg class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:' width='24' height='24'><use xlink:href='#exclamation-triangle-fill'/></svg><div>Erro de conexão </div></div>"); 

}else{   

    $(".message").html("<div class='alert alert-danger d-flex align-items-center'role='alert'><svg class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:' width='24' height='24'><use xlink:href='#exclamation-triangle-fill'/></svg><div>Dados inválidos !!!! </div></div>"); 

}

}


});       

}

});        


$('#exampleModal3').on('hide.bs.modal', function (event) {
    //executar algo...
    $(this).find('form')[0].reset();        
        
    $(".message").html("");      

    
  });        

