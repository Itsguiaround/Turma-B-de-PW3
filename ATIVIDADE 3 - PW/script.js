function gerarCampos() {

    let quantidade = parseInt(
        document.getElementById("qtdAlunos").value
    );

    let container =
        document.getElementById("containerAlunos");

    let btnEnviar =
        document.getElementById("btnEnviar");

    if (isNaN(quantidade) || quantidade <= 0) {

        alert("Digite uma quantidade válida.");
        return;
    }

    container.innerHTML = "";

    for (let i = 1; i <= quantidade; i++) {

        let aluno = `
        
        <div class="cartao-aluno">

            <h3>👨‍🎓 Aluno ${i}</h3>

            <div class="grupo-input">

                <label>Nome</label>

                <input
                type="text"
                name="nomes[]"
                required>

            </div>

            <div class="grupo-input">

                <label>Prova 1</label>

                <input
                type="number"
                step="0.1"
                min="0"
                max="10"
                name="notas_prova1[]"
                required>

            </div>

            <div class="grupo-input">

                <label>Prova 2</label>

                <input
                type="number"
                step="0.1"
                min="0"
                max="10"
                name="notas_prova2[]"
                required>

            </div>

            <div class="grupo-input">

                <label>Trabalho</label>

                <input
                type="number"
                step="0.1"
                min="0"
                max="10"
                name="notas_trabalho[]"
                required>

            </div>

        </div>
        `;

        container.innerHTML += aluno;
    }

    btnEnviar.style.display = "block";
}