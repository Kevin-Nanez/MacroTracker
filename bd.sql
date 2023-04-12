CREATE TABLE macrotracker;

use macrotracker;

CREATE TABLE usuario (
usuario varchar(16) primary key not null,
password varchar(20) not null,
sexo char(1) check (sexo IN ('M', 'F')) not null,
edad int check (edad >= 1 AND edad <= 130) not null,
altura int check (altura >= 1 AND altura <= 270) not null,
peso float check (peso >= 1 AND peso <= 800) not null,
dias_af int check (dias_af >= 0 AND dias_af <= 7) not null,
cal_mant int not null,
cal_subir int not null,
cal_bajar int not null,
objetivo int not null
);

CREATE TABLE dia (
fecha date primary key not null,
FOREIGN KEY (objetivo) REFERENCES usuario(objetivo),
objetivo foreign key int not null,
);
