<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Metas</title>
    <link rel='stylesheet' type='text/css' media='screen' href='salario.css'>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
            margin: 4;
            background-color: rgb(219, 185, 219); /* Cor de fundo do corpo */
        }
 
        form {
            width: 400px;
            padding: 20px; /* Reduzido para 20px */
            border: 20px solid #ccc;
            border-radius: 30px;
            background-color: rgb(219, 185, 219); /* Cor de fundo do formulário */
        }
 
        .submit {
            display: block;
            margin-bottom: 20px;
            background-color: rgb(158, 213, 223); /* Cor de fundo do botão CALCULAR */
        }
 
        input[type="text"],
        input[type="number"] {
            width: 80%;
            padding: 4px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
 
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 400px;
            background-color: rgb(167, 157, 184); /* Cor de fundo do botão SUBMIT */
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <h2>METAS</h2>
        <label for="nome">Nome do Vendedor:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>
        <label for="vendaSemanal1">Venda Semanal 1:</label><br>
        <input type="number" id="vendaSemanal1" name="vendaSemanal1" min="0" required><br><br>
        <label for="vendaSemanal2">Venda Semanal 2:</label><br>
        <input type="number" id="vendaSemanal2" name="vendaSemanal2" min="0" required><br><br>
        <label for="vendaSemanal3">Venda Semanal 3:</label><br>
        <input type="number" id="vendaSemanal3" name="vendaSemanal3" min="0" required><br><br>
        <label for="vendaSemanal4">Venda Semanal 4:</label><br>
        <input type="number" id="vendaSemanal4" name="vendaSemanal4" min="0" required><br><br>
        <label for="metaMensal">Meta Mensal:</label><br>
        <input type="number" id="metaMensal" name="metaMensal" min="0" required><br><br>
 
        <button class="glow-on-hover" type="submit">CALCULAR</button>
    </form>
    <div class="Resultados">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["nome"]) && isset($_POST["vendaSemanal1"]) && isset($_POST["vendaSemanal2"]) && isset($_POST["vendaSemanal3"]) && isset($_POST["vendaSemanal4"]) && isset($_POST["metaMensal"])) {
            $nomeFuncionario = $_POST["nome"];
            $vendasSemanais = array($_POST["vendaSemanal1"], $_POST["vendaSemanal2"], $_POST["vendaSemanal3"], $_POST["vendaSemanal4"]);
            $totalVendasSemanais = array_sum($vendasSemanais);
 
            $metaSemanal = 20000;
            $metaMensal = 80000;
            $salarioMinimo = 1927.02;
 
           
            $boni_Semanal = 0;
            $boni_Mensal = 0;
 
            if ($totalVendasSemanais >= $metaSemanal) {
                $boni_Semanal = ($metaSemanal * 0.01);
                $excedenteSemanal = $totalVendasSemanais - $metaSemanal;
                $boni_Semanal += ($excedenteSemanal * 0.05);
 
                if ($totalVendasSemanais >= $metaMensal) {
                    $excedenteMensal = $totalVendasSemanais - $metaMensal;
                    $boni_Mensal = $excedenteMensal * 0.10;
                }
            }
 
            $pagamentoTotal = $salarioMinimo + $boni_Semanal + $boni_Mensal;
 
            echo "<p>Funcionário: $nomeFuncionario</p>";
            echo "<p>Salário Total: R$ " . number_format($pagamentoTotal, 2) . "</p>";
        } else {
            echo "Por favor, preencha todos os campos do formulário.";
        }
    } else {
        echo "O formulário não foi submetido.";
    }
    ?>
    </div>
</body>
</html>