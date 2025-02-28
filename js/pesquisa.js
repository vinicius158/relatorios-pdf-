function pesquisa(){  

let pesquisa = $("#campo").val();    

$.ajax({

url:"pesquisa.php",        
method:"POST", 
dataType:"json",   
data:{pesquisa:pesquisa}

}); 

}     

setInterval(pesquisa,1000);      