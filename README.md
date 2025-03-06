# Projeto 

<div style = "text-align:justify;">
Trata-se de um sistema web que possui o objetivo de gerar relatórios em pdf de clientes cadastrados no banco de dados, mas também permite a edição e exclusão de um cliente. 
O relatório gerado será em formato pdf com as informações de todos os clientes, conta com algumas variáveis calculadas como número total de clientes, média de idade, 
porcentagem de homens/mulheres, data/hora de processamento, código do relatório com exibição do QrCode correspondente. A regra de negócio e proposta do projeto é para uso 
particular de uma pessoa, que terá acesso por meio do painel do login com e-mail e senha, caso seja necessário existe um mecanismo para recuperação de senha via email com 
envio de código de verifação para recuperar o acesso.          
</div>

# Tecnologias 

- HTML
- CSS
- Java Script (ajax, jquery)
- Bootstrap 
- PHP (Utilizando a biblioteca Chillerlan para gerar o QrCode, Dompdf para o pdf e o PHPMailer responsável pelo envio de emails)
- Banco de dados MySQL 
