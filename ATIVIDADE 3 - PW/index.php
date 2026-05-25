<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>
        Dashboard Escolar
    </title>

    <link
    rel="stylesheet"
    href="estilo.css">

</head>

<body>

    <div class="background"></div>

    <main class="dashboard">

        <header class="hero">

            <h1>
                📊 Dashboard de Desempenho Escolar
            </h1>

            <p>
                Sistema moderno para análise estatística da turma.
            </p>

        </header>

        <section class="painel">

            <form
            action="processamento.php"
            method="POST"
            id="formTurma">

                <div class="topo-form">

                    <div class="grupo-input">

                        <label>
                            Nome da Turma
                        </label>

                        <input
                        type="text"
                        name="nome_turma"
                        required>

                    </div>

                    <div class="grupo-input">

                        <label>
                            Quantidade de Alunos
                        </label>

                        <input
                        type="number"
                        id="qtdAlunos"
                        min="1"
                        required>

                    </div>

                </div>

                <button
                type="button"
                class="btn-gerar"
                onclick="gerarCampos()">

                    Gerar Alunos

                </button>

                <div
                id="containerAlunos"
                class="grid-alunos">

                </div>

                <button
                type="submit"
                id="btnEnviar"
                class="btn-enviar">

                    Calcular Estatísticas

                </button>

            </form>

        </section>

    </main>

    <script src="script.js"></script>

</body>
</html>