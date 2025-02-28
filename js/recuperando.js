$("#dados").submit(function(e){

e.preventDefault();              

let email = $("#email").val();    

let senha = $("#senha").val();      

let senha2 = $("#senha2").val();      

if(email.length === 0 || senha.length === 0 || senha2.length === 0){

    $(".message").html("<div class='alert alert-danger d-flex align-items-center' role='alert'><svg class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:' width='24' height='24'><use xlink:href='#exclamation-triangle-fill'/></svg><div>Preencha todos os campos !!!!</div></div>");  

}else{       

    if(senha == senha2){

   $.ajax({

   url:"recuperar_conta.php",   
   method:"POST",   
   dataType:"json",   
   data:{email:email,senha:senha}

   }).done(function(response){

    if(response){     

        $(".message").html("<div class='alert alert-success d-flex align-items-center' role='alert' id = 'alert'><svg class='bi flex-shrink-0 me-2' role='img' aria-label='Success:' width = '24' height = '24'><use xlink:href='#check-circle-fill'/></svg><div>Senha atualizada !!!</div></div>"); 

    }else{

        $(".message").html("<div class='alert alert-danger d-flex align-items-center' role='alert'><svg class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:' width='24' height='24'><use xlink:href='#exclamation-triangle-fill'/></svg><div>Erro de atualização !!!!</div></div>");

    }

   });        
   
}else{

    $(".message").html("<div class='alert alert-danger d-flex align-items-center' role='alert'><svg class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:' width='24' height='24'><use xlink:href='#exclamation-triangle-fill'/></svg><div>A senha não foi repetida !!! </div></div>");

}

}      

});        