DROP DATABASE IF EXISTS macrotracker;

CREATE DATABASE IF NOT EXISTS macrotracker;

use macrotracker;  

CREATE TABLE roles (
id_rol TINYINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
descripcion VARCHAR(30)
);

INSERT INTO roles (descripcion)
VALUES ("Administrador"), ("Usuario");

CREATE TABLE usuario (
id_usuario INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
usuario VARCHAR(16) NOT NULL UNIQUE,
usuario_Password VARCHAR(20) NOT NULL,
sexo CHAR(1) CHECK(sexo IN ("M" , "F")),
edad TINYINT UNSIGNED CHECK( edad > 0 ),
altura SMALLINT CHECK( altura  > 0 ),
peso DECIMAL(6,2) NOT NULL, 
dias_af TINYINT CHECK(dias_af<=7 AND dias_af>=0),
objetivo INT NOT NULL DEFAULT 0,
privilegios TINYINT NOT NULL DEFAULT 2,
FOREIGN KEY (privilegios) REFERENCES roles(id_rol)
);

INSERT INTO usuario (usuario ,usuario_password, sexo, edad, altura, peso, dias_af, objetivo, privilegios)
 VALUES ("Kevin", "Admin", "M", 20, 184 , 71.3, 5, 3000,1 ),
 ("Young Miko", "BiGbOOTY", "F", 18, 142 , 45.43, 1, 1200,2 ),
 ("Luar la L", "KHEE", "M", 23, 176 , 65.43, 2, 2000,2 ),
 ("Anuel aa", "BRRR", "M", 32, 170 , 73.43, 5, 2400,2 ),
 ("Eladio Carrion", "SAUCE BOYZ", "M", 28, 170 , 80, 5, 2400,2 ),
("Myke Towers", "EasyMoneyBaby", "M", 24, 182 , 76, 2, 2200,2 ),
("Yovngchimi", "DEAMOn", "M", 22, 152 , 52.43, 5, 1800,2 );
 
 SELECT * FROM usuario
 INNER JOIN roles ON roles.id_rol = usuario.privilegios;
 

CREATE TABLE dia (
fecha DATE NOT NULL,
id_usuario INT NOT NULL,
objetivo INT NOT NULL DEFAULT 2,
FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
PRIMARY KEY (fecha,id_usuario),
INDEX (fecha)
);
INSERT INTO dia(fecha, id_usuario) VALUES
("2023-05-10",2), ("2023-05-11",2), ("2023-05-10",3), ("2023-05-11",3); 

-- llenar columna objetivo
SET SQL_SAFE_UPDATES = 0;
UPDATE dia INNER JOIN usuario ON dia.id_usuario = usuario.id_usuario
SET dia.objetivo = usuario.objetivo;
SET SQL_SAFE_UPDATES = 1;

CREATE TABLE alimento(
id_alimento INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
alimento VARCHAR(35) NOT NULL UNIQUE,
descripcion VARCHAR(300) NOT NULL,
calorias INT,
proteinas DECIMAL(5,1),
grasas DECIMAL(5,1),
carbohidratos DECIMAL(5,1),
id_unidades INT NOT NULL
);

INSERT INTO alimento (alimento, descripcion, id_unidades, calorias, proteinas, grasas, carbohidratos) VALUES
("Pollo asado","Muslo de pollo asado sin piel",1, 198, 28.9, 7.6, 0),
("Huevo frito","Huevo frito en aceite",2, 196, 12.5, 15.1, 0.8),
("Arroz blanco","Arroz blanco cocido",1, 130, 2.4, 0.3, 28.2),
("Lentejas","Lentejas cocidas",1, 116, 9.0, 0.4, 20.1),
("Manzana","Manzana verde",2, 52, 0.3, 0.2, 13.8),
("Plátano","Plátano maduro",2, 89, 1.1, 0.3, 22.8),
("Leche descremada","Leche descremada",3, 35, 3.6, 0.1, 4.8),
("Yogurt griego","Yogurt griego",2, 130, 23, 0.4, 9.2);



CREATE TABLE solicitud_alimento(
id_solicitud INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
id_usuario INT NOT NULL,
alimento VARCHAR(35) NOT NULL,
descripcion VARCHAR(300) NOT NULL,
id_unidades INT NOT NULL,
calorias SMALLINT,
proteinas DECIMAL(5,1),
grasas DECIMAL(5,1),
carbohidratos DECIMAL(5,1),
FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

CREATE TABLE unidades (
id_unidades INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
descripcion VARCHAR(30)
);

INSERT INTO unidades (descripcion) VALUES
("100 g"),("Unidad(es)"),("100 ml"),("Taza(s)"),("Onza(s)"),("Cucharada(s)");

SELECT * FROM alimento
INNER JOIN unidades ON unidades.id_unidades = alimento.id_unidades;

CREATE TABLE comida(
id_comida INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
fecha DATE NOT NULL,
id_usuario INT NOT NULL,
num_comida TINYINT NOT NULL,
FOREIGN KEY (fecha) REFERENCES dia(fecha),
FOREIGN KEY (id_usuario) REFERENCES dia(id_usuario)
);

INSERT INTO comida(fecha, id_usuario, num_comida) VALUES
("2023-05-10",2,1), ("2023-05-10",2,2), ("2023-05-10",2,3),
("2023-05-10",3,1), ("2023-05-10",3,2), ("2023-05-10",3,3),("2023-05-10",3,4),
("2023-05-11",2,1), ("2023-05-11",2,2), ("2023-05-11",2,3),
("2023-05-11",3,1), ("2023-05-11",3,2), ("2023-05-11",3,3),("2023-05-11",3,4);

SELECT * FROM comida
INNER JOIN usuario ON usuario.id_usuario = comida.id_usuario;

CREATE TABLE alimentos_comida(
id_alimentos_comida INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
id_alimento INT NOT NULL,
alimento VARCHAR(35),
id_comida INT NOT NULL,
cantidad DECIMAL(7,2),
FOREIGN KEY (id_alimento) REFERENCES alimento(id_alimento),
FOREIGN KEY (id_comida) REFERENCES comida(id_comida)
);



