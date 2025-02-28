<?php    

require("conector.php");
require("pdf/vendor/autoload.php");
require("Qrcode/vendor/autoload.php");

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Dompdf\Dompdf;
use Dompdf\Options;    

if(isset($_GET["pdf"])){         

$sql = "SELECT * FROM cliente";         

$comand = $BD->prepare($sql);    

$comand->execute();   

$result = $comand->rowCount();           

if($result > 0){

$html = "";

$html .= "<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Painel administrativo</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <script src='https://kit.fontawesome.com/b9092d7591.js' crossorigin='anonymous'></script>
    <script src='https://code.jquery.com/jquery-3.6.0.slim.js' integrity='sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=' crossorigin='anonymous'></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
    <link rel = 'stylesheet' href = 'css/estilo_pdf.css'>
</head>
<body>";

$html .= "<div class='title'><h1>Clientes cadastrados no sistema</h1></div>";
$html .= "<hr>";
$html .= "<table class='table table-dark table-striped' border = '1'>
   <thead>
   <tr>
  <td class='table-dark'>Nome</td>
  <td class='table-dark'>E-mail</td>
  <td class='table-dark'>Idade</td>
  <td class='table-dark'>Sexo</td>
  <td class='table-dark'>Cidade</td>
  </tr>
</thead>
<tbody>";

$sql = "SELECT nome,email,idade,sexo,cidade FROM cliente ORDER BY id_cliente DESC";
$comand = $BD->prepare($sql);

if ($comand->execute()) {

  $total = $comand->rowCount();

  while ($retorno = $comand->fetch(PDO::FETCH_ASSOC)) {
    $nome = $retorno["nome"];
    $email = $retorno["email"];
    $idade = $retorno["idade"];
    $sexo = $retorno["sexo"];
    $cidade = $retorno["cidade"];

    $html .= "<tr>
    <td class='table-dark'>$nome</td>
    <td class='table-dark'>$email</td>
    <td class='table-dark'>$idade</td>
    <td class='table-dark'>$sexo</td>
    <td class='table-dark'>$cidade</td>
    </tr>";
  }

  $html .= "</tbody></table>";
  $html .= "<hr>";

  $query = "SELECT sum(idade) as soma FROM cliente";
  $comand = $BD->prepare($query);
  $comand->execute();
  $resultado = $comand->fetch(PDO::FETCH_ASSOC);
  $soma = $resultado["soma"];     

  $media = floor($soma / $total);       

  $query2 = "SELECT * FROM cliente WHERE sexo = 'Masculino'";
  $comand = $BD->prepare($query2);
  $comand->execute();
  $number_homens = $comand->rowCount();
  $porcentagem_homens = ($number_homens * 100) / $total;
  $porcentagem_homens = floor($porcentagem_homens * 100) / 100;

  $query3 = "SELECT * FROM cliente WHERE sexo = 'Feminino'";
  $comand = $BD->prepare($query3);
  $comand->execute();
  $number_mulheres = $comand->rowCount();
  $porcentagem_mulheres = ($number_mulheres * 100) / $total;
  $porcentagem_mulheres = floor($porcentagem_mulheres * 100) / 100;

  $html .= "<div class='title2'>
              <div class='tt1'><p class='txt4'>Estatísticas</p></div>
              <div class='tt2'><p class='txt4'>QrCode do relatório</p></div>";
  $html .= "<div class='number'>
              <h4>Número de clientes : $total </h4>
              <h4>Média de idade : $media anos</h4>
              <h4>Porcentagem de Homens : $porcentagem_homens % </h4>
              <h4>Porcentagem de Mulheres : $porcentagem_mulheres % </h4>
            </div>";

  date_default_timezone_set("America/Sao_Paulo");
  $data = date("d/m/Y");
  $hora = date("H:i");
  $codigo = md5(time());

  $options = new QROptions([
    'moduleValues' => [
        'moduleWidth' => 5,  // Largura do módulo (tamanho dos quadrados do QR Code)
        'moduleHeight' => 5, // Altura do módulo (tamanho dos quadrados do QR Code)
    ],
    'outputType' => QRCode::OUTPUT_MARKUP_SVG,     
    'imageBase64' => true,  // Para gerar a imagem como Base64 (caso esteja retornando uma imagem base64)
    'quietzoneSize' => 0,   // Aqui estamos configurando o padding (quietzone) para 0
]);          

$obj = new QRCode($options);                  

$caminho = "qr_codes/".md5(time()).".svg";

$obj->render($codigo,$caminho);             


  $html .= "<div class='qr_code'><img src='$caminho' class='img'></div>";

  $html .= "<div class='final'>
              <p class='txt5'>Data de processamento : $data | Hora : $hora </p>
              <p class='txt5'>Código do relatório : $codigo</p>
            </div>";

  $html .= '</body></html>';

  $options = new Options();
  $options->setChroot(__DIR__);
  $pdf = new Dompdf($options);
  $pdf->loadHtml($html);
  $pdf->setPaper('A4', 'portrait');
  $pdf->render();    

  header("Content-type: application/pdf");  

  echo $pdf->output();      

} else {
  return "Erro ao consultar dados.";

}             

}else{

echo "<script>alert('Nenhum cliente foi registrado !!!!!')</script>";

}

}

?>