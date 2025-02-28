function listar_clientes(){   

let request = "pesquisando";   

$.ajax({

url:"listando.php",   
method:"POST",    
dataType:"json",    
data:{request:request}    

}).done(function(response){           
  
  $("#resultados").html(response); 

});     

}     

setInterval(listar_clientes,1000);     