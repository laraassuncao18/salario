<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema salárial</title>
</head>
<body>
<h1>Cálcular salário</h1>
<form action="" method="POST">
    <label for="nome">Nome: </label>
    <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>
 
    <label for="semana1">Semana 1</label>
    <input type="text" id="semana1" name="semana1" placeholder="Insira o valor da semana 1" required>
 
    <label for="semana2">Semana 2</label>
    <input type="text" id="semana2" name="semana2" placeholder="Insira o valor da semana 2" required>
 
    <label for="semana3">Semana 3</label>
    <input type="text" id="semana3" name="semana3" placeholder="Insira o valor da semana 3" required>
 
    <label for="semana4">Semana 4</label>
    <input type="text" id="semana4" name="semana4" placeholder="Insira o valor da semana 4" required>
 
    <label for="vmensal">Mensal</label>
    <input type="text" id="vmensal" name="vmensal" placeholder="Insira o valor da meta mensal" required>
 
    <button type="submit">Gerar</button>
</form>
<!-- Aqui começa  PHP -->
<div class="mensagens">
    <!-- processa os dados enviano do form -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = filter_input(INPUT_POST, "nome");
        $semanas = array(
            filter_input(INPUT_POST, "semana1"),
            filter_input(INPUT_POST, "semana2"),
            filter_input(INPUT_POST, "semana3"),
            filter_input(INPUT_POST, "semana4")
        );
        $msemanal = 20000;
        $mmensal = 80000;
 
        // bônus semanal
        $total_bonus_semanal = 0;
        foreach ($semanas as $semana) {
            if ($semana >= $msemanal) {
                $total_bonus_semanal += $semana * 0.01;
            }
        }
 
        // bônus mensal
        $total_semanal = array_sum($semanas);
        $bonus_mensal = max(0, $total_semanal - $mmensal) * 0.1;
 
        // salário final sendo calculado
        $salario_final = 1927.02 + $total_bonus_semanal + $bonus_mensal;
 
        //Aqui esta o resultado que será imprimido na tela para o usuário
        echo "<h2>Oi $nome, confira seu salário abaixo: </h2>";
        echo "<p>Funcionário: $nome</p>";
        echo "<p>Bônus Semanal: R$ " . number_format($total_bonus_semanal, 2) . "</p>";
        echo "<p>Bônus Mensal: R$ " . number_format($bonus_mensal, 2) . "</p>";
        echo "<p>Salário de: R$ " . number_format($salario_final, 2) . "</p>";
    }
    ?>
</div>
</body>
</html>