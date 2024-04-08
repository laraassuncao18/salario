<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario</title>
    <link rel="stylesheet" href="salario.css">
</head>
<body>
<!-- titulo -->
<h1>Cálcular salário</h1>
<form class= "formulario" method="POST">
    <label for="nome">Nome: </label>
    <input type="text" id="nome" name="nome" required>
    <label for="semana1">Semana 1</label>
    <input type="text" id="semana1" name="semana1"  required>
    <label for="semana2">Semana 2</label>
    <input type="text" id="semana2" name="semana2"  required>
    <label for="semana3">Semana 3</label>
    <input type="text" id="semana3" name="semana3"  required>
    <label for="semana4">Semana 4</label>
    <input type="text" id="semana4" name="semana4"  required>
    <label for="vmensal">Mensal</label>
    <input type="text" id="vmensal" name="vmensal"  required>
    <button type="submit">calcular</button>
    <!-- formulario -->
</form> 
<?php
//pega os dados do formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = filter_input(INPUT_POST, "nome");
        $semanas = array(
            filter_input(INPUT_POST, "semana1"),
            filter_input(INPUT_POST, "semana2"),
            filter_input(INPUT_POST, "semana3"),
            filter_input(INPUT_POST, "semana4")
        );
        // define as variaveis atribui os valores
        $msemanal = 20000;
        $mmensal = 80000;
        $total_bonus_semanal = 0;
        foreach ($semanas as $semana) {
            if ($semana >= $msemanal) {
                $total_bonus_semanal += $semana * 0.01;
            }
        }
        $total_semanal = array_sum($semanas);
        $bonus_mensal = max(0, $total_semanal - $mmensal) * 0.1;       
        $salario_final = 1927.02 + $total_bonus_semanal + $bonus_mensal;
        //conta final
        echo "<p>Bônus Semanal: R$ " . number_format($total_bonus_semanal, 2) . "</p>";
        echo "<p>Bônus Mensal: R$ " . number_format($bonus_mensal, 2) . "</p>";
        echo "<p>Salário de: R$ " . number_format($salario_final, 2) . "</p>";
    }
    ?>
</body>
</html>