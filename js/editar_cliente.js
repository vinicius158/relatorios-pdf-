$(document).on("click","#editar",function(){

    let id = $(this).attr("data-id");             
    
    $.ajax({
    
    url:"consultar.php",      
    method:"POST",      
    dataType:"json",    
    data:{id:id}
    
    }).done(function(response){
    
        $("#nome3").attr("placeholder",response["nome"]);       
    
        $("#email3").attr("placeholder",response["email"]);     
        
        $("#idade3").attr("placeholder",response["idade"]);           
        
        $("#sexo4").text(response["sexo"]);        
        
        $("#cidade4").text(response["cidade"]);    
    
    });           
    
    });     


$("#editar_cliente").submit(function(e){

    e.preventDefault();         

    let nome = $("#nome3").val();       

    let email = $("#email3").val();     
    
    let idade = $("#idade3").val();        

    let sexo = $("#sexo3").val();      

    let cidade = $("#cidade3").val();             

    if(nome.length === 0 && email.length === 0 && idade.length === 0 && sexo == null && cidade == null){

        $(".message3").html("<div class='alert alert-danger d-flex align-items-center'role='alert'><svg class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:' width='24' height='24'><use xlink:href='#exclamation-triangle-fill'/></svg><div>Realize alguma alteração !!! </div></div>");   

    }else{    

         if($("#email3").validate()){

    $.ajax({
    
    url:"editar_cliente.php",      
    method:"POST",   
    dataType:"json",    
    data:{nome:nome,email:email,idade:idade,sexo:sexo,cidade:cidade}      


    }).done(function(response){

     if(response){

     $(".message3").html("<div class='alert alert-success d-flex align-items-center' role='alert' id = 'alert'><svg class='bi flex-shrink-0 me-2' role='img' aria-label='Success:' width = '24' height = '24'><use xlink:href='#check-circle-fill'/></svg><div>Atualização realizada com sucesso !!!</div></div>");  

     }else{

     $(".message3").html("<div class='alert alert-danger d-flex align-items-center'role='alert'><svg class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:' width='24' height='24'><use xlink:href='#exclamation-triangle-fill'/></svg><div> Erro de atualização !!! </div></div>"); 

     }

    }); 

         }


    }         

});  

     

  $('#editor').on('hide.bs.modal', function (event) {
    //executar algo...
    $(this).find('form')[0].reset();        
        
    $(".message3").html("");      

    
  });  
         



