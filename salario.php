<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulário de Metas</title>

 
 <link rel='stylesheet' type='text/css' media='screen' href='salario.css'>  
</head>
<body>
  
<h2>FORMULARIO DE METAS</h2>

<form action="/submit" method="post">

  <label for="nome">Nome do Vendedor:</label><br>
  <input type="text" id="nome" name="nome" required><br><br>

  <label for="metaSemanal 1">Meta Semanal 1:</label><br>
  <input type="number" id="metaSemanal 1" name="metaSemanal1" min="0" required><br><br>

  <label for="metaSemanal 2">Meta Semanal 2:</label><br>
  <input type="number" id="metaSemanal 2" name="metaSemanal2" min="0" required><br><br>


  <label for="metaSemanal 3">Meta Semanal 3:</label><br>
  <input type="number" id="metaSemanal 3" name="metaSemanal3" min="0" required><br><br>

  <label for="metaSemanal 4">Meta Semanal 4:</label><br>
  <input type="number" id="metaSemanal 4" name="metaSemanal4" min="0" required><br><br>

  <label for="meta do mes 5">Meta do mes :</label><br>
  <input type="number" id="meta do mes " name="metadomes" min="0" required><br><br>



  <input type="submit" value="Enviar">
</form>
<h2>Calculadora de Porcentagem</h2>

<?php
// Verifica se os valores foram enviados via formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os valores do formulário
    $valorObtido = $_POST["valor_obtido"];
    $meta = $_POST["meta"];
    $nomeFuncionario = $_POST["nome"];
    $metaSemana1 =$_POST["metaSemanal1"];
    $metaSemana2 =$_post["metaSemanal2"];
    $metaSemana3 =$_post["metaSemanal3"];
    $metaSemana4 =$_post["metaSemanal4"];
    $metadomes =$_post["metadomes"];
    $salMes = 1927.02;
    

    // Calcula a porcentagem
    $porcentagem = ($valorObtido / $meta) * 100;
    
    // Exibe o resultado
    echo "Valor obtido: $valorObtido<br>";
    echo "Meta: $meta<br>";
    echo "Porcentagem: " . number_format($porcentagem, 2) . "%";
}

?>


</body>
</html>
