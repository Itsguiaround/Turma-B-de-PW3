<h1 align="center">📚 Turma-B-de-PW3</h1>

<p align="center">
  Atividades e projetos de Programação Web em PHP e MySQL, com destaque para o <strong>Sistema Mundo</strong>:<br>
  um CRUD de continentes, países, cidades e governantes com autenticação de usuários.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML5">
  <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3">
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript">
</p>

---

## 📑 Índice

- [Sobre o projeto](#-sobre-o-projeto)
- [Projetos do repositório](#-projetos-do-repositório)
- [Funcionalidades](#-funcionalidades)
- [Tecnologias utilizadas](#-tecnologias-utilizadas)
- [Estrutura do projeto](#-estrutura-do-projeto)
- [Requisitos](#-requisitos)
- [Como executar](#-como-executar)
- [Autor](#-autor)

---

## 💡 Sobre o projeto

Este repositório reúne as atividades e os projetos desenvolvidos na disciplina de Programação Web 3 (PW3), do curso de Desenvolvimento de Sistemas da ETEC.

O principal deles é o **Sistema Mundo**, uma aplicação web para gerenciar continentes, países, cidades e seus governantes, construída com PHP e MySQL. A aplicação também conta com um módulo de autenticação, que controla o acesso dos usuários e registra os acessos ao sistema.

---

## 🗂️ Projetos do repositório

| Projeto | Descrição |
| ------- | --------- |
| [CRUD MUNDO](./CRUD%20MUNDO) | Sistema Mundo: CRUD de continentes, países, cidades e governantes |
| [CRUD_MUNDO: Autenticação de usuário](./CRUD_MUNDO%3A%20Autentica%C3%A7%C3%A3o%20de%20usu%C3%A1rio) | Sistema Mundo com autenticação de usuários e registro de acessos |
| [Calculadora](./Calculadora) | Exercício prático 1 |
| [Controle de Gastos Pessoais](./Controle%20de%20Gastos%20Pessoais) | Aplicação de controle de gastos pessoais |
| [Exercício Prático 2](./Exerc%C3%ADcio%20Pr%C3%A1tico%202) | Exercício prático 2 |
| [ATIVIDADE 3 - PW](./ATIVIDADE%203%20-%20PW) | Atividade 3 de Programação Web |
| [PW3](./PW3) | Estudos iniciais da disciplina |

---

## ⚙️ Funcionalidades

### Sistema Mundo

- Cadastro, consulta, edição e exclusão de continentes
- Cadastro, consulta, edição e exclusão de países
- Cadastro, consulta, edição e exclusão de cidades
- Cadastro, consulta, edição e exclusão de governantes de países e de cidades
- Autenticação de usuários com registro de acessos (tabelas `USUARIOS` e `LOGS`)
- Bloqueio do usuário após 3 tentativas consecutivas de login com senha incorreta
- Troca obrigatória de senha no primeiro acesso

### Outras atividades

- Calculadora
- Controle de gastos pessoais

---

## 🛠️ Tecnologias utilizadas

<p>
  <img src="https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/HTML5-E34F26?style=flat-square&logo=html5&logoColor=white" alt="HTML5">
  <img src="https://img.shields.io/badge/CSS3-1572B6?style=flat-square&logo=css3&logoColor=white" alt="CSS3">
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=flat-square&logo=javascript&logoColor=black" alt="JavaScript">
  <img src="https://img.shields.io/badge/Git-F05032?style=flat-square&logo=git&logoColor=white" alt="Git">
  <img src="https://img.shields.io/badge/GitHub-181717?style=flat-square&logo=github&logoColor=white" alt="GitHub">
</p>

---

## 📁 Estrutura do projeto

```
Turma-B-de-PW3/
├── ATIVIDADE 3 - PW/                      # Atividade 3 de Programação Web
├── CRUD MUNDO/                            # Sistema Mundo (CRUD)
├── CRUD_MUNDO: Autenticação de usuário/   # Sistema Mundo com autenticação
├── Calculadora/                           # Exercício prático 1
├── Controle de Gastos Pessoais/           # Controle de gastos pessoais
├── Exercício Prático 2/                   # Exercício prático 2
├── PW3/                                   # Estudos iniciais
└── README.md
```

Dentro do Sistema Mundo, a raiz contém `index.php`, `conexao.php` e o script do banco `bd_mundo.sql`, além das pastas `css/` e `js/`. Cada módulo (`continentes/`, `paises/`, `cidades/`, `governantes_paises/` e `governantes_cidades/`) fica em uma pasta própria, com as telas de listar, cadastrar, editar e excluir.

---

## 📋 Requisitos

- PHP
- MySQL
- Servidor local, como o XAMPP
- Git

---

## 🚀 Como executar

1. Clone o repositório:
   ```bash
   git clone https://github.com/Itsguiaround/Turma-B-de-PW3.git
   ```
2. Copie a pasta do projeto desejado (por exemplo, `CRUD_MUNDO: Autenticação de usuário`) para a pasta do servidor local (`htdocs`, no XAMPP).
3. Inicie o Apache e o MySQL.
4. Importe o arquivo `bd_mundo.sql` no MySQL para criar o banco de dados.
5. Ajuste o usuário e a senha do seu MySQL local no arquivo `conexao.php`.
6. Acesse `http://localhost/` seguido do nome da pasta no navegador.

---

## 👨‍💻 Autor

**Guilherme Braga**

[![GitHub](https://img.shields.io/badge/GitHub-Itsguiaround-181717?style=flat-square&logo=github&logoColor=white)](https://github.com/Itsguiaround)
