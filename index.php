<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Palavras Primas</title>

    <link rel="stylesheet" href="app.css">
</head>
<body class="flex-container">
<?php
    // Função que verifica se o numero é primo
    function is_prime ($num)
    {
        for($i = 2; $i < $num; $i++){
            if($num % $i == 0){
                return false;
            }
        }

        return true;
    }

    // Palavras digitadas no formulário
    $words = isset($_POST['words']) ? preg_replace('/[^a-zA-Z ]+/', '', $_POST['words']) : null;
    // Todas as letras (A posição da letra + 1 será o valor dela)
    $points = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    // Array com os Pontos
    $wordPoints = array();
    // Array com os Resultados
    $wordIsPrime = array();

    if(!is_null($words)){
        // Separar as Palavras por " " em um Array
        $arrayWords = explode(" ", $words);

        foreach($arrayWords as $word){
            $totalPoints = 0;
            
            // Somar os Pontos de cada Letra
            for($i = 0; $i < strlen($word); $i++){
                $totalPoints += (strpos($points, $word[$i]) + 1);
            }
            
            // Adiciona nos Arrays com o Resultado e Pontuação Total
            array_push($wordIsPrime, is_prime($totalPoints) ? 'Prima' : 'Não Prima');
            array_push($wordPoints, $totalPoints);
        }
    }
?>
<div class="box">
    <form action="" method="POST">
        <h2><strong>Problema</strong></h2>

        <p>Um número primo é definido se ele possuir exatamente dois divisores: o número um e ele próprio. São exemplos de números primos: 2, 3, 5, 101, 367 e 523.</p>
        <p>Neste problema, você deve ler uma palavra composta somente por letras [a-zA-Z]. Cada letra possui um valor específico, a vale 1, b vale 2 e assim por diante, até a letra z que vale 26. Do mesmo modo A vale 27, B vale 28, até a letra Z que vale 52.</p>
        <p>Você precisa definir se cada palavra em um conjunto de palavras é prima ou não. Para ela ser prima, a soma dos valores de suas letras deve ser um número primo.</p>
        
        <div class="group">
            <input type="text" id="words" name="words" onKeyUp="onlyLetters(this)" value="<?=$words?>" required>
            <span class="bar"></span>
            <label>Palavras</label>
        </div>        

        <button class="btn">Calcular</button>

        <?php if(!is_null($words)){ ?>
            <br>
            <h2><strong>Resultado</strong></h2>
            <br>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>Palavra</th>
                        <th>Prima ou Não Prima</th>
                        <th>Valor Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($arrayWords as $key => $word) { ?>
                        <tr>
                            <td><?=$word?></td>
                            <td><?=$wordIsPrime[$key]?></td>
                            <td><?=$wordPoints[$key]?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </form>
</div>

<!-- Contem Função para permitir apenas letras durante digitação -->
<script src="app.js"></script>
</body>
</html>