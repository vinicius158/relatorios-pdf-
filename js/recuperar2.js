$("#form").submit(function(e){

e.preventDefault();         

let codigo = $("#codigo").val();   

if(codigo.length === 0){

    $(".message2").html("<div class='alert alert-danger d-flex align-items-center' role='alert'><svg class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:' width='24' height='24'><use xlink:href='#exclamation-triangle-fill'/></svg><div>Informe o código !!!</div></div>");

}else{   

   $.ajax({    

   url:"verificar.php",   
   method:"POST",    
   dataType:"json",   
   data:{codigo:codigo}
    
   }).done(function(response){
    
   if(response){

   window.location.href = "recuperando.php";       

   }else{

    $(".message2").html("<div class='alert alert-danger d-flex align-items-center' role='alert'><svg class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:' width='24' height='24'><use xlink:href='#exclamation-triangle-fill'/></svg><div>Código inválido !!!</div></div>");

   }

   });     

}          

});   