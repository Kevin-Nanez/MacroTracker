DROP database macrotracker;
CREATE database macrotracker;

use macrotracker;

CREATE TABLE usuario (
id_usuario int primary key AUTO_INCREMENT not null,
usuario varchar(16) not null,
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
fecha DATE NOT NULL primary key
);

CREATE TABLE usuario_dia (
id_usuario int not null,
fecha date not null,
PRIMARY KEY (id_usuario, fecha),
cal_consumidas int,
cal_restantes int,
objetivo int not null,
FOREIGN KEY (fecha) REFERENCES dia(fecha),
FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);
CREATE INDEX fecha_idx ON usuario_dia (fecha);

CREATE TABLE alimento(
id_alimento int primary key AUTO_INCREMENT not null,
alimento varchar(35) not null,
descripcion varchar(125) not null,
contenido ENUM('100 g', '100 ml', '1 unidad'),
calorias int,
proteinas int,
grasas int,
carbohidratos int,
img blob
);

CREATE TABLE solicitud_alimento(
id_solicitud int primary key AUTO_INCREMENT not null,
id_usuario int not null,
FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
alimento varchar(35) not null,
descripcion varchar(125) not null,
contenido ENUM('100 g', '100 ml', '1 unidad'),
calorias int,
proteinas int,
grasas int,
carbohidratos int
);


CREATE TABLE usuario_dias_alimento(
id_alimento int not null,
FOREIGN KEY (id_alimento) REFERENCES alimento(id_alimento),
id_usuario int not null,
FOREIGN KEY (id_usuario) REFERENCES usuario_dia(id_usuario),
fecha date not null,
FOREIGN KEY (fecha) REFERENCES usuario_dia(fecha),
alimento varchar(35) not null,
cantidad float not null, 
calorias int,
proteinas int,
grasas int,
carbohidratos int,
img blob
);


INSERT INTO usuario (usuario, password, sexo, edad, altura, peso, dias_af, cal_mant, cal_subir, cal_bajar, objetivo) 
VALUES 
  ('jose123', 'contrasena123', 'M', 28, 175, 80.5, 5, 2000, 2400, 1600, 1700),
  ('ana456', 'clave456', 'F', 42, 162, 65.2, 3, 1500, 1850, 1200, 1850),
  ('juan789', 'pwd789', 'M', 20, 180, 90.0, 7, 2200, 2600, 1800, 2000),
  ('lucia246', 'clave246', 'F', 35, 170, 68.7, 2, 1600, 1900, 1300, 2200),
  ('pepe135', 'contraseña135', 'M', 50, 185, 95.2, 6, 2300, 2600, 2000, 1900);


INSERT INTO alimento (alimento, descripcion, contenido, calorias, proteinas, grasas, carbohidratos, img)
VALUES
('Manzana', 'Fruta fresca y crujiente', '1 unidad', 52, 0, 0, 14, NULL),
('Leche entera', 'Leche fresca de vaca', '100 ml', 64, 3, 4, 4, NULL),
('Hamburguesa', 'Carne molida de res entre dos panes', '1 unidad', 300, 18, 20, 22, NULL),
('Arroz blanco', 'Arroz cocido al vapor', '100 g', 130, 2, 0, 29, NULL),
('Pechuga de pollo', 'Carne blanca de pollo asada', '100 g', 165, 31, 3, 0, NULL),
('Papas fritas', 'Papas cortadas en tiras y fritas', '100 g', 312, 3, 15, 41, NULL);

INSERT INTO solicitud_alimento (id_usuario, alimento, descripcion, contenido, calorias, proteinas, grasas, carbohidratos)
VALUES
(1, 'Taco al pastor', 'Taco de carne de cerdo adobada con cebolla, cilantro y piña', '1 unidad', 200, 10, 8, 20),
(1, 'Chiles en nogada', 'Chiles poblanos rellenos de picadillo y bañados en salsa de nuez', '1 unidad', 400, 15, 20, 30),
(2, 'Guacamole', 'Puré de aguacate con jitomate, cebolla, chile y cilantro', '100 g', 160, 2, 15, 5),
(2, 'Tostadas de tinga', 'Tostadas con pollo deshebrado en salsa de tomate y chipotle', '1 unidad', 120, 6, 3, 15),
(3, 'Pozole', 'Caldo de maíz con carne de cerdo, lechuga, rábano y chile', '100 ml', 120, 8, 6, 10),
(3, 'Enchiladas verdes', 'Tortillas rellenas de pollo y bañadas en salsa de tomate verde', '1 unidad', 350, 15, 15, 40);




CREATE VIEW usuario_dia_vista AS
SELECT id_usuario, fecha, cal_consumidas, objetivo, (objetivo - cal_consumidas) AS cal_restantes
FROM usuario_dia;

CREATE TRIGGER calcular_cal_restantes
BEFORE INSERT ON usuario_dia
FOR EACH ROW
SET NEW.cal_restantes = NEW.objetivo - NEW.cal_consumidas;

CREATE TRIGGER actualizar_cal_restantes
BEFORE UPDATE ON usuario_dia
FOR EACH ROW
SET NEW.cal_restantes = NEW.objetivo - NEW.cal_consumidas;





