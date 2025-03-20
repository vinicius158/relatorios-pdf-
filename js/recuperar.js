$("#recuperar").submit(function(e){        

e.preventDefault();       

let email = $("#email").val();       

if(email.length === 0){      

$(".message").html("<div class='alert alert-danger d-flex align-items-center' role='alert'><svg class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:' width='24' height='24'><use xlink:href='#exclamation-triangle-fill'/></svg><div>Informe o email !!!!</div></div>");    


}else{    

   if($("#email").validate()){

$.ajax({        

url:"enviar_email.php",    
method:"POST",   
dataType:"json",    
data:{email:email}

}).done(function(response){        
  
      console.log(response);   

      if(response == "incorreto"){

        $(".message").html("<div class='alert alert-danger d-flex align-items-center' role='alert'><svg class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:' width='24' height='24'><use xlink:href='#exclamation-triangle-fill'/></svg><div>Email incorreto !!!</div></div>");  

      }else{

      if(response == false){

        $(".message").html("<div class='alert alert-danger d-flex align-items-center' role='alert'><svg class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:' width='24' height='24'><use xlink:href='#exclamation-triangle-fill'/></svg><div> Erro de conexão com o banco de dados !!! </div></div>");  

      }else{

        window.location.href = "recuperar2.php";          

      }


      }

});   

   }

}

});       
