$(document).on("click","#excluir",function(){

let id_cliente = $(this).attr("data-id");             

let retorno = confirm("Quer mesmo excluir esse cliente ????");          

if(retorno){
    
$.ajax({

url:"excluir_cliente.php",    
method:"POST",     
dataType:"json",     
data:{id_cliente:id_cliente}

}).done(function(response){

if(response){

alert("Cliente excluído com sucesso !!!");    

}else{

alert("Erro ao excluir cliente !!!");   

}

});     

}

});      