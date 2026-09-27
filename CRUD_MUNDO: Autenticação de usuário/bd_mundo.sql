create database bd_mundo;
use bd_mundo;

create table Continentes(
id_continente int auto_increment primary key,
nome varchar(100) not null,
populacao bigint not null, 
area_km2 decimal(15,2) not null,
total_paises int not null default 0
);

create table Governantes_Cidades(
id_governante_cidade int auto_increment primary key,
nome varchar(500) not null,
partido_politico varchar(500) not null,
data_nascimento date not null,
idade int not null,
data_inicio_mandato date not null,
data_final_mandato date
);

create table Governantes_Paises(
id_governante_pais int auto_increment primary key,
nome varchar(500) not null,
partido_politico varchar (500) not null,
data_nascimento date not null,
idade int not null,
data_inicio_mandato date not null,
data_final_mandato date
);

create table Paises(
id_pais int auto_increment primary key,
nome varchar(500) not null,
populacao bigint not null,
area_km2 decimal(15,2) not null,
idioma varchar(100) not null,
clima varchar(150) not null,
regime_politico varchar(100) not null,
moeda varchar(100) not null,
id_continente int not null,
id_governante_pais int null,

foreign key (id_continente) references Continentes(id_continente) on delete cascade,
foreign key (id_governante_pais) references Governantes_Paises(id_governante_pais)
);

create table Cidades(
id_cidade int auto_increment primary key,
nome varchar(750) not null,
populacao bigint not null,
area_km2 decimal(8, 2) not null,
clima varchar(100) not null,
data_fundacao date,
id_pais int not null,
id_governante_cidade int null,

foreign key (id_governante_cidade) references Governantes_Cidades(id_governante_cidade),
foreign key (id_pais) references Paises(id_pais)
on delete cascade on update cascade
);

insert into Continentes(nome, populacao, area_km2, total_paises)
	values('América do Sul', 440500000, 17840000.00, 12);

insert into Governantes_Paises(nome, partido_politico, data_nascimento, idade, data_inicio_mandato, data_final_mandato)
	values('Luiz Inácio Lula da Silva', 'PT', '1945-10-27', 81, '2023-01-01', '2027-01-05');

insert into Governantes_Cidades(nome, partido_politico, data_nascimento, idade, data_inicio_mandato, data_final_mandato)
		values('Anderson Farias', 'PSD', '1975-03-13', 51, '2025-01-01', '2028-01-01');

insert into Paises(nome, populacao, area_km2, idioma, clima, regime_politico, moeda, id_continente, id_governante_pais)
	values('Brasil', 213400000, 8510417.77, 'Português', 'Tropical', 'Democracia representativa', 'Real', 1, 1);

insert into Cidades(nome, populacao, area_km2, clima, data_fundacao, id_pais, id_governante_cidade)
	values('São José dos Campos', 737500, 1100.00, 'Tropical de altitude', '1767-07-27', 1, 1);

-- =====================================================================
-- Atividade: CRUD Mundo (Autenticação do Usuário)
-- =====================================================================

-- Tabela USUARIOS
-- primeiro_acesso = 1  -> obriga a troca de senha no próximo login
-- tentativas_erradas    -> contador de erros consecutivos (zera ao acertar)
-- bloqueado = 1         -> impede login mesmo com senha correta
create table Usuarios(
id_usuario int auto_increment primary key,
login varchar(100) not null unique,
senha varchar(255) not null,
primeiro_acesso tinyint(1) not null default 1,
tentativas_erradas int not null default 0,
bloqueado tinyint(1) not null default 0,
data_criacao datetime not null default current_timestamp
);

-- Tabela LOGS
-- Guarda toda tentativa de login (sucesso, falha ou bloqueio).
-- id_usuario fica NULL quando o login digitado nem existe na base.
create table Logs(
id_log int auto_increment primary key,
id_usuario int null,
login_tentativa varchar(100) not null,
data_hora datetime not null default current_timestamp,
status varchar(20) not null,

foreign key (id_usuario) references Usuarios(id_usuario) on delete set null
);

-- Usuário inicial para primeiro acesso ao sistema.
-- login: admin | senha: admin123 (já em hash bcrypt via password_hash)
-- primeiro_acesso = 1, então o sistema obriga a troca no 1º login.
insert into Usuarios(login, senha, primeiro_acesso)
	values('admin', '$2y$10$u6Iw2OFV5zD9shUzMQhDN.I.LoE1peCGcyWtW/iwPqab6sjDBHz82', 1),
		  ('Guilherme', '$2a$12$8bssgwYM6zQ.LdMSKjnvNuCTWhURr/GGK2xI2pDrq2.1hyOvZujle', 1);