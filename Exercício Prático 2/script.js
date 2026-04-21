function atualizarUI() {
  const tipo = document.querySelector('input[name="pagamento"]:checked').value;
  const info = document.getElementById('infoPagamento');
  const parcelasBox = document.getElementById('parcelasBox');

  if (tipo === 'avista') {
    parcelasBox.style.display = 'none';
    info.innerHTML = '💡 Pagamento à vista: você ganha <strong>8,5% de desconto</strong>.';
  } else {
    parcelasBox.style.display = 'block';
    info.innerHTML = '💡 Pagamento a prazo: taxa de <strong>6%</strong> + R$6,90 por parcela.';
  }
}

function calcular() {
  const checkboxes = document.querySelectorAll('.produtos input[type="checkbox"]:checked');
  let total = 0;

  checkboxes.forEach(cb => {
    total += parseFloat(cb.value);
  });

  const tipo = document.querySelector('input[name="pagamento"]:checked').value;
  let resultado = '';

  if (total === 0) {
    document.getElementById('resultado').innerHTML = '⚠️ Selecione pelo menos um produto.';
    return;
  }

  if (tipo === 'avista') {
    let desconto = total * 0.085;
    let final = total - desconto;

    resultado = `💰 Total: R$ ${total.toFixed(2)}<br>
                 Desconto: R$ ${desconto.toFixed(2)}<br>
                 <strong>Valor Final: R$ ${final.toFixed(2)}</strong>`;
  } else {
    let parcelas = parseInt(document.getElementById('parcelas').value);
    let taxa = total * 0.06 + (6.90 * parcelas);
    let totalFinal = total + taxa;
    let valorParcela = totalFinal / parcelas;

    if (valorParcela < 10) {
      document.getElementById('resultado').innerHTML = '⚠️ Parcela não pode ser menor que R$10,00.';
      return;
    }

    resultado = `💳 Total: R$ ${total.toFixed(2)}<br>
                 Taxa: R$ ${taxa.toFixed(2)}<br>
                 ${parcelas}x de R$ ${valorParcela.toFixed(2)}<br>
                 <strong>Total Final: R$ ${totalFinal.toFixed(2)}</strong>`;
  }

  document.getElementById('resultado').innerHTML = resultado;
}

atualizarUI();
