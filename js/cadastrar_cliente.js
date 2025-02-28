$("#adicionar").submit(function(e){

e.preventDefault();     

let nome = $("#nome2").val();        

let email = $("#email2").val();      

let idade = $("#idade2").val();      

let sexo = $("#sexo2").val();          

let cidade = $("#cidade2").val();       

if(nome.length === 0 || email.length === 0 || idade.length === 0 || sexo === "Sexo" || cidade === "Cidade"){

    $(".message2").html("<div class='alert alert-danger d-flex align-items-center'role='alert'><svg class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:' width='24' height='24'><use xlink:href='#exclamation-triangle-fill'/></svg><div>Preencha todos os campos !!! </div></div>");  

}else{

$.ajax({

url:"insert.php",     
method:"POST",    
dataType:"json",    
data:{email:email,nome:nome,idade:idade,sexo:sexo,cidade:cidade}


}).done(function(response){               

console.log(response);    

if(response){

console.log("Cliente adicionado !!!");        

$(".message2").html("<div class='alert alert-success d-flex align-items-center' role='alert' id = 'alert'><svg class='bi flex-shrink-0 me-2' role='img' aria-label='Success:' width = '24' height = '24'><use xlink:href='#check-circle-fill'/></svg><div>Cliente adicionado com sucesso !!!!</div>");

}else{

$(".message2").html("<div class='alert alert-danger d-flex align-items-center'role='alert'><svg class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:' width='24' height='24'><use xlink:href='#exclamation-triangle-fill'/></svg><div>Erro de conexão</div></div>"); 

}

});       

}

});             


$('#exampleModal').on('hide.bs.modal', function (event) {     
    
    $(this).find('form')[0].reset();        
        
    $(".message2").html("");      

    
  });  
