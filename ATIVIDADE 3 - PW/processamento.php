<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>
        Relatório Estatístico
    </title>

    <link
    rel="stylesheet"
    href="estilo.css">

</head>

<body>

<div class="background"></div>

<main class="dashboard">

<section class="painel">

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome_turma = $_POST['nome_turma'];

    $nomes = $_POST['nomes'];

    $notas_prova1 = $_POST['notas_prova1'];

    $notas_prova2 = $_POST['notas_prova2'];

    $notas_trabalho = $_POST['notas_trabalho'];

    $total_alunos = count($nomes);

    $soma_todas_notas = 0;

    $soma_medias = 0;

    $maior_media = 0;

    $menor_media = 10;

    $aprovados = 0;

    $recuperacao = 0;

    $reprovados = 0;

    echo "
    <div class='hero'>

        <h1>
            📊 Relatório da Turma
        </h1>

        <p>
            Turma: $nome_turma
        </p>

    </div>
    ";

    echo "<table>";

    echo "
    <tr>

        <th>Aluno</th>

        <th>Média</th>

        <th>Raiz da Soma</th>

        <th>Diferença</th>

        <th>Situação</th>

    </tr>
    ";

    for($i = 0; $i < $total_alunos; $i++){

        $nome = $nomes[$i];

        $nota1 = floatval($notas_prova1[$i]);

        $nota2 = floatval($notas_prova2[$i]);

        $trabalho = floatval($notas_trabalho[$i]);

        $soma = $nota1 + $nota2 + $trabalho;

        $media = $soma / 3;

        $raiz = sqrt($soma);

        $maior = max($nota1,$nota2,$trabalho);

        $menor = min($nota1,$nota2,$trabalho);

        $diferenca = abs($maior - $menor);

        $soma_todas_notas += $soma;

        $soma_medias += $media;

        if($media > $maior_media){

            $maior_media = $media;
        }

        if($media < $menor_media){

            $menor_media = $media;
        }

        if($media >= 7){

            $situacao = "Aprovado";

            $classe = "aprovado";

            $aprovados++;

        }elseif($media >= 5){

            $situacao = "Recuperação";

            $classe = "recuperacao";

            $recuperacao++;

        }else{

            $situacao = "Reprovado";

            $classe = "reprovado";

            $reprovados++;
        }

        echo "
        <tr>

            <td>$nome</td>

            <td>
                ".number_format($media,2,',','.')."
            </td>

            <td>
                ".number_format($raiz,2,',','.')."
            </td>

            <td>
                ".number_format($diferenca,2,',','.')."
            </td>

            <td class='$classe'>
                $situacao
            </td>

        </tr>
        ";
    }

    echo "</table>";

    $media_geral =
    $soma_medias / $total_alunos;

    $percentual =
    ($aprovados / $total_alunos) * 100;

    echo "

    <div class='estatisticas'>

        <h2>
            📈 Estatísticas Gerais
        </h2>

        <p>
            <strong>Total de alunos:</strong>
            $total_alunos
        </p>

        <p>
            <strong>Média geral:</strong>
            ".number_format($media_geral,2,',','.')."
        </p>

        <p>
            <strong>Maior média:</strong>
            ".number_format($maior_media,2,',','.')."
        </p>

        <p>
            <strong>Menor média:</strong>
            ".number_format($menor_media,2,',','.')."
        </p>

        <p>
            <strong>Soma das notas:</strong>
            ".number_format($soma_todas_notas,2,',','.')."
        </p>

        <h3>
            Situação da Turma
        </h3>

        <p>
            ✅ Aprovados:
            $aprovados
        </p>

        <p>
            🟡 Recuperação:
            $recuperacao
        </p>

        <p>
            ❌ Reprovados:
            $reprovados
        </p>

        <p>
            📊 Percentual de aprovação:
            ".number_format($percentual,1,',','.')."%
        </p>

        <button
        class='btn-gerar'
        onclick='window.history.back()'>

            Voltar

        </button>

    </div>
    ";
}

?>

</section>

</main>

</body>
</html>