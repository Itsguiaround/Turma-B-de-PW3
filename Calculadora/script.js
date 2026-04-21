function calcularTudo() {
  let campo = document.getElementById("num1");
  let n = campo.value;

  if (n === "") {
    document.getElementById("resultado1").innerHTML = "";
    return;
  }

  n = Number(n);

  let res =
    "Dobro: " + (n*2) + "<br>" +
    "Triplo: " + (n*3) + "<br>" +
    "Quádruplo: " + (n*4) + "<br>" +
    "Quíntuplo: " + (n*5) + "<br>" +
    "Sêxtuplo: " + (n*6) + "<br><br>" +

    "Quadrado: " + (n**2) + "<br>" +
    "Cubo: " + (n**3) + "<br>" +
    "4ª potência: " + (n**4) + "<br>" +
    "5ª potência: " + (n**5) + "<br>" +
    "6ª potência: " + (n**6);

  document.getElementById("resultado1").innerHTML = res;
}

function verificar() {
  let campo = document.getElementById("numPar");
  let n = campo.value;

  if (n === "") {
    document.getElementById("resultado2").innerHTML = "";
    return;
  }

  n = Number(n);

  let res = (n % 2 == 0) ? "É PAR" : "É ÍMPAR";

  document.getElementById("resultado2").innerHTML = res;
}

function media() {
  let n1 = document.getElementById("m1").value;
  let n2 = document.getElementById("m2").value;
  let n3 = document.getElementById("m3").value;
  let n4 = document.getElementById("m4").value;

  if (n1 === "" || n2 === "" || n3 === "" || n4 === "") {
    document.getElementById("resultado3").innerHTML = "";
    return;
  }

  let m = (Number(n1) + Number(n2) + Number(n3) + Number(n4)) / 4;

  document.getElementById("resultado3").innerHTML =
    "Média: " + m;
}

function bhaskara() {
  let a = document.getElementById("a").value;
  let b = document.getElementById("b").value;
  let c = document.getElementById("c").value;

  if (a === "") {
    document.getElementById("resultado4").innerHTML = "Informe o valor de A";
    return;
  }

  a = Number(a);
  b = (b === "") ? 0 : Number(b);
  c = (c === "") ? 0 : Number(c);

  let delta = b*b - 4*a*c;

  if (delta < 0) {
    document.getElementById("resultado4").innerHTML =
      "Não possui raízes reais";
    return;
  }

  let x1 = (-b + Math.sqrt(delta)) / (2*a);
  let x2 = (-b - Math.sqrt(delta)) / (2*a);

  document.getElementById("resultado4").innerHTML =
    "x1 = " + x1 + "<br>x2 = " + x2;
}