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
  <button class="glow-on-hover" type="submit">CALCULAR</button>
</form>
<h2>Calculadora de Porcentagem</h2>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nomeFuncionario = $_POST["nome"];
    $metaSemana1 = $_POST["metaSemana1"];
    $metaSemana2 = $_POST["metaSemana2"];
    $metaSemana3 = $_POST["metaSemana3"];
    $metaSemana4 = $_POST["metaSemana4"];

    
    $totalVendasSemanais = $vendasSemana1 + $vendasSemana2 + $vendasSemana3 + $vendasSemana4;

    
    $metaSemanal = 20000; 
    $metaMensal = 80000; 
    $salarioMinimo = 1100; 

    
    $pagamentoBase = $salarioMinimo;
    $bonificacaoSemanal = 0;
    $bonificacaoMensal = 0;

    
    if ($totalVendasSemanais >= $metaSemanal) {
        $bonificacaoSemanal = ($metaSemanal * 0.01); 
      
        $excedenteSemanal = $totalVendasSemanais - $metaSemanal;
        
        $bonificacaoSemanal += ($excedenteSemanal * 0.05); 

        
        if ($totalVendasSemanais >= $metaMensal) {
            
            $excedenteMensal = $totalVendasSemanais - $metaMensal;
            
            $bonificacaoMensal = $excedenteMensal * 0.10; 
        }
    }

    
    $pagamentoTotal = $pagamentoBase + $bonificacaoSemanal + $bonificacaoMensal;

    
    echo "<h2>Resultados</h2>";
    echo "<p>Nome do Funcionário: $nomeFuncionario</p>";
    echo "<p>Total de Vendas Semanais: $totalVendasSemanais</p>";
    echo "<p>Pagamento Base (Salário Mínimo): R$ $salarioMinimo</p>";
    echo "<p>Bonificação Semanal: R$ " . number_format($bonificacaoSemanal, 2) . "</p>";
    echo "<p>Bonificação Mensal: R$ " . number_format($bonificacaoMensal, 2) . "</p>";
    echo "<p>Pagamento Total: R$ " . number_format($pagamentoTotal, 2) . "</p>";
} else {
    echo " O formulário não foi submetido.";
}
?>


</body></html>