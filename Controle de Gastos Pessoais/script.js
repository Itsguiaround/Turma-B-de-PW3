let gastos = [];

let categorias = [];

document.addEventListener("DOMContentLoaded", () => {
  carregarDados();
  atualizarSelectCategorias();
  renderizar();
});

document.getElementById("formGasto").addEventListener("submit", (e) => {
  e.preventDefault();
  adicionarGasto();
});

document.getElementById("btnAddCategoria").addEventListener("click", adicionarCategoria);

document.getElementById("filtroCategoria").addEventListener("change", renderizar);


function adicionarCategoria() {
  const input = document.getElementById("novaCategoria");
  const nome = input.value.trim();

  if (!nome) {
    alert("Digite uma categoria válida!");
    return;
  }

  if (categorias.includes(nome)) {
    alert("Categoria já existe!");
    return;
  }

  categorias.push(nome);

  salvarDados();
  atualizarSelectCategorias();
  renderizar();

  input.value = "";
}


function removerCategoria(nomeCategoria) {

  categorias = categorias.filter(cat => cat !== nomeCategoria);

  gastos = gastos.filter(g => g.categoria !== nomeCategoria);

  salvarDados();
  atualizarSelectCategorias();
  renderizar();
}


function adicionarGasto() {
  const descricao = document.getElementById("descricao").value.trim();
  const valor = parseFloat(document.getElementById("valor").value);
  const categoria = document.getElementById("categoria").value;

  if (!descricao || isNaN(valor) || valor <= 0) {
    alert("Preencha corretamente!");
    return;
  }

  const gasto = { descricao, valor, categoria };

  gastos.push(gasto);

  salvarDados();
  renderizar();

  document.getElementById("formGasto").reset();
}


function removerGasto(index) {
  gastos.splice(index, 1);

  salvarDados();
  renderizar();
}


function renderizar() {
  renderizarGastos();
  renderizarCategorias();
  calcularTotal();
}


function renderizarGastos() {
  const tbody = document.querySelector("#tabelaGastos tbody");
  tbody.innerHTML = "";

  const filtro = document.getElementById("filtroCategoria").value;

  let listaFiltrada = gastos;

  switch (filtro) {
    case "Todos":
      break;
    default:
      listaFiltrada = gastos.filter(g => g.categoria === filtro);
  }

  listaFiltrada.forEach((gasto) => {
    const tr = document.createElement("tr");

    const indexReal = gastos.indexOf(gasto);

    const btn = document.createElement("button");
    btn.textContent = "X";
    btn.classList.add("remover");

    btn.addEventListener("click", () => removerGasto(indexReal));

    tr.innerHTML = `
      <td>${gasto.descricao}</td>
      <td>R$ ${gasto.valor.toFixed(2)}</td>
      <td>${gasto.categoria}</td>
    `;

    const tdAcao = document.createElement("td");
    tdAcao.appendChild(btn);

    tr.appendChild(tdAcao);

    tbody.appendChild(tr);
  });
}

function renderizarCategorias() {
  const tbody = document.querySelector("#tabelaCategorias tbody");
  tbody.innerHTML = "";

  categorias.forEach((cat) => {
    const tr = document.createElement("tr");

    const tdNome = document.createElement("td");
    tdNome.textContent = cat;

    const tdAcao = document.createElement("td");

    const btn = document.createElement("button");
    btn.textContent = "Excluir";
    btn.classList.add("remover");

    btn.addEventListener("click", () => removerCategoria(cat));

    tdAcao.appendChild(btn);

    tr.appendChild(tdNome);
    tr.appendChild(tdAcao);

    tbody.appendChild(tr);
  });
}


function calcularTotal() {
  const total = gastos.reduce((acc, g) => acc + g.valor, 0);

  document.getElementById("total").textContent = total.toFixed(2);
}

function atualizarSelectCategorias() {
  const select = document.getElementById("categoria");
  const filtro = document.getElementById("filtroCategoria");

  select.innerHTML = "";
  filtro.innerHTML = "<option>Todos</option>";

  categorias.forEach(cat => {
    const option = document.createElement("option");
    option.value = cat;
    option.textContent = cat;
    select.appendChild(option);

    const optionFiltro = document.createElement("option");
    optionFiltro.value = cat;
    optionFiltro.textContent = cat;
    filtro.appendChild(optionFiltro);
  });
}


function salvarDados() {
  localStorage.setItem("gastos", JSON.stringify(gastos));
  localStorage.setItem("categorias", JSON.stringify(categorias));
}

function carregarDados() {
  const dadosGastos = localStorage.getItem("gastos");
  const dadosCategorias = localStorage.getItem("categorias");

  gastos = dadosGastos ? JSON.parse(dadosGastos) : [];
  categorias = dadosCategorias ? JSON.parse(dadosCategorias) : [];
}