$(document).on("click","#limpar",function(){            

let resposta = confirm("Deseja mesmo excluir todos os clientes ????");     

if(resposta){
    
let limpar = 1;      

$.ajax({

url:"limpar_tudo.php",    
method:"POST",   
dataType:"json",      
data:{limpar:limpar}

}).done(function(response){

if(response){

alert("Clientes excluídos com sucesso !!!");       

}else{

alert("Erro ao excluir clientes !!!");          

}

}); 

}

});   