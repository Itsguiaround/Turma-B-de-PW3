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

insert into Paises(nome, populacao, area_km2, idioma, clima, regime_politico, moeda, id_continente, id_governante)
	values('Brasil', 213400000, 8510417.77, 'Português', 'Tropical', 'Democracia representativa', 'Real', 1, 1);

insert into Cidades(nome, populacao, area_km2, clima, data_fundacao, id_pais, id_governante)
	values('São José dos Campos', 737500, 1100.00, 'Tropical de altitude', '1767-07-27', 1, 1);