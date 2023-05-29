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
usuario_Password VARCHAR(65) NOT NULL,
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
 VALUES ("Kevin", "Administrador", "M", 20, 184 , 71.3, 5, 3000,1 ),
 ("Young Miko", "BiGbOOTY", "F", 18, 142 , 45.43, 1, 1200,2 ),
 ("Luar la L", "KHEEEEE", "M", 23, 176 , 65.43, 2, 2000,2 ),
 ("Anuel aa", "BRRRRRR", "M", 32, 170 , 73.43, 5, 2400,2 ),
 ("Eladio Carrion", "SAUCE BOYZ", "M", 28, 170 , 80, 5, 2400,2 ),
("Myke Towers", "EasyMoneyBaby", "M", 24, 182 , 76, 2, 2200,2 ),
("Yovngchimi", "DEAMOnn", "M", 22, 152 , 52.43, 5, 1800,2 );
 

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

-- proteinas
INSERT INTO alimento (alimento, descripcion, calorias, proteinas, grasas, carbohidratos, id_unidades) VALUES
('Pechuga de pollo', 'Pechuga de pollo a la plancha', 165, 31.0, 3.6, 0.0, 1),
('Pavo', 'Pavo asado sin piel', 161, 29.8, 3.6, 0.0, 1),
('Carne de res magra', 'Carne de res magra cocida', 250, 26.1, 17.5, 0.0, 1),
('Carne de cerdo magra', 'Carne de cerdo magra cocida', 143, 25.7, 4.5, 0.0, 1),
('Pollo asado', 'Pollo asado sin piel', 165, 24.9, 5.7, 0.0, 1),
('Jamón', 'Jamón cocido', 101, 16.0, 3.0, 1.5, 1),
('Pescado blanco', 'Pescado blanco cocido', 105, 22.0, 2.3, 0.0, 1),
('Atún enlatado', 'Atún enlatado en agua', 99, 23.0, 0.9, 0.0, 1),
('Salmón', 'Salmón al horno', 206, 22.0, 13.0, 0.0, 1),
('Huevos', 'Huevos duros', 155, 13.0, 11.0, 1.1, 2),
('Cordero', 'Cordero asado sin grasa', 258, 25.6, 17.0, 0.0, 1),
('Bacalao', 'Bacalao cocido', 82, 18.0, 0.7, 0.0, 1),
('Langosta', 'Langosta cocida', 89, 19.4, 0.5, 0.0, 1),
('Camarones', 'Camarones cocidos', 85, 18.0, 0.9, 0.0, 1),
('Carne molida de res', 'Carne molida de res cocida', 250, 26.1, 17.5, 0.0, 1);


-- lacteos, frutos secos y legumbres
INSERT INTO alimento (alimento, descripcion, calorias, proteinas, grasas, carbohidratos, id_unidades) VALUES
("Leche de vaca", "Leche de vaca entera", 60, 3.2, 3.6, 4.8, 3),
("Yogur natural", "Yogur natural sin azúcar", 50, 4.0, 3.0, 5.0, 1),
("Leche descremada","Leche descremada",3, 35, 3.6, 0.1, 4.8),
("Queso cheddar", "Queso cheddar", 402, 24.9, 33.1, 1.3, 2),
("Crema de leche", "Crema de leche", 345, 2.8, 35.0, 2.0, 4),
("Leche de almendra", "Leche de almendra sin azúcar", 15, 0.5, 1.1, 0.5, 3),
("Yogur griego", "Yogur griego sin azúcar", 100, 10.0, 0.0, 5.0, 1),
("Queso mozzarella", "Queso mozzarella", 280, 28.0, 17.0, 3.0, 2),
("Mantequilla", "Mantequilla", 717, 0.9, 81.0, 0.1, 1),
("Leche de coco", "Leche de coco sin azúcar", 230, 2.0, 23.0, 5.0, 3),
("Yogur de frutas", "Yogur de frutas con azúcar", 150, 6.0, 3.0, 25.0, 1),
("Queso parmesano", "Queso parmesano", 431, 38.4, 28.3, 3.2, 2),
("Leche de cabra", "Leche de cabra entera", 69, 3.6, 4.1, 4.5, 3),
("Yogur de soja", "Yogur de soja sin azúcar", 54, 4.2, 1.8, 6.6, 1),
("Nueces", "Nueces", 654, 15.2, 65.2, 13.7, 2),
("Almendras", "Almendras", 579, 21.1, 49.9, 21.6, 2),
("Semillas de girasol", "Semillas de girasol", 584, 20.8, 51.5, 20.0, 2);

-- cereales y legumbres
INSERT INTO alimento (alimento, descripcion, calorias, proteinas, grasas, carbohidratos, id_unidades) VALUES
('Arroz', 'Cereal de grano largo', 130, 2.7, 0.3, 28.7, 1),
('Trigo', 'Cereal utilizado en harinas', 327, 12.6, 2.5, 71.2, 1),
('Avena', 'Cereal rico en fibra', 389, 16.9, 6.9, 66.3, 1),
('Maíz', 'Cereal utilizado en muchos productos alimenticios', 365, 9.4, 4.7, 74.3, 1),
('Cebada', 'Cereal utilizado en la producción de cerveza y alimentos', 354, 12.5, 2.3, 73.5, 1),
('Centeno', 'Cereal utilizado en la producción de pan y alcohol', 335, 9.7, 1.7, 69.3, 1),
('Quinoa', 'Cereal sin gluten, alta en proteínas', 368, 14.1, 6.1, 64.2, 1),
('Mijo', 'Cereal pequeño y redondeado', 378, 11, 3.9, 73.5, 1),
('Lentejas', 'Legumbre rica en proteínas', 353, 24.6, 1.1, 63.4, 1),
('Garbanzos', 'Legumbre utilizada en platos como el hummus', 364, 19, 6, 61, 1),
('Frijoles negros', 'Legumbre utilizada en platos como los frijoles refritos', 339, 21.6, 0.9, 62.4, 1),
('Frijoles rojos', 'Legumbre utilizada en platos como el chili', 333, 24, 1.5, 60, 1),
('Guisantes', 'Legumbre rica en proteínas y fibra', 81, 5.4, 0.4, 14.5, 1),
('Soja', 'Legumbre utilizada en alimentos como la leche de soja y el tofu', 446, 36.5, 20.2, 30.2, 1),
('Alubias', 'Legumbre utilizada en platos como la fabada', 337, 21.6, 0.6, 60.1, 1);


-- frutas y verduras
INSERT INTO alimento (alimento, descripcion, calorias, proteinas, grasas, carbohidratos, id_unidades)
VALUES
('Manzana', 'Fruta de forma redonda y sabor dulce.', 52, 0.3, 0.2, 14, 2),
('Plátano', 'Fruta alargada y sabor dulce.', 96, 1.2, 0.2, 23, 2),
('Naranja', 'Fruta cítrica y jugosa.', 43, 0.9, 0.1, 11, 2),
('Fresa', 'Pequeña fruta roja y dulce.', 32, 0.7, 0.3, 7.7, 2),
('Piña', 'Fruta tropical con sabor dulce y ácido.', 50, 0.5, 0.2, 13, 2),
('Mango', 'Fruta tropical de color naranja y sabor dulce.', 60, 0.82, 0.38, 15, 2),
('Uva', 'Pequeñas frutas redondas y dulces.', 69, 0.72, 0.16, 18, 2),
('Sandía', 'Fruta grande y jugosa, de color rojo.', 30, 0.6, 0.2, 7.6, 2),
('Melón', 'Fruta de forma redonda y pulpa jugosa.', 34, 0.84, 0.19, 8.2, 2),
('Pera', 'Fruta de forma redondeada y sabor dulce.', 57, 0.4, 0.1, 15, 2),
('Cereza', 'Pequeñas frutas rojas y jugosas.', 50, 1, 0.3, 12, 2),
('Durazno', 'Fruta redonda y jugosa, de sabor dulce.', 39, 0.91, 0.25, 9.5, 2),
('Kiwi', 'Fruta pequeña, verde y llena de sabor.', 61, 1.1, 0.5, 15, 2),
('Mandarina', 'Fruta cítrica fácil de pelar.', 53, 0.8, 0.3, 13, 2),
('Coco', 'Fruta tropical con pulpa blanca y líquido.', 354, 3.33, 33.5, 15.2, 2),
('Zanahoria', 'Verdura de color naranja con alto contenido de vitamina A.', 41, 0.9, 0.2, 10.3, 1),
('Tomate', 'Fruta en forma de baya de color rojo utilizado como verdura.', 18, 0.9, 0.2, 3.9, 1),
('Cebolla', 'Vegetal de sabor fuerte y aroma característico utilizado como condimento.', 40, 1.1, 0.1, 9.3, 1),
('Lechuga', 'Planta de hojas verdes utilizada en ensaladas y sandwiches.', 5, 0.5, 0.1, 1.0, 1),
('Espinaca', 'Verdura de hojas verdes ricas en hierro y vitaminas.', 23, 2.9, 0.4, 3.6, 1),
('Brócoli', 'Vegetal de color verde con floretes comestibles.', 34, 2.8, 0.6, 6.6, 1),
('Pepino', 'Fruto de forma cilíndrica y color verde utilizado como verdura.', 15, 0.7, 0.1, 3.6, 1),
('Calabacín', 'Variedad de calabaza de forma alargada y color verde claro.', 17, 1.2, 0.2, 3.1, 1),
('Pimiento', 'Fruto de sabor dulce o picante utilizado como verdura.', 26, 1.0, 0.3, 5.3, 1),
('Col rizada', 'Variedad de col de hojas rizadas y color verde oscuro.', 49, 4.3, 0.9, 8.4, 1),
('Escarola', 'Variedad de lechuga de hojas ligeramente amargas.', 17, 1.2, 0.2, 3.2, 1),
('Apio', 'Vegetal de tallos fibrosos y sabor característico.', 16, 0.7, 0.2, 3.4, 1),
('Puerro', 'Vegetal de sabor suave y aroma parecido a la cebolla.', 61, 1.8, 0.3, 14.4, 1),
('Espárrago', 'Verdura de tallos tiernos y sabor delicado.', 20, 2.2, 0.2, 3.7, 1),
('Champiñón', 'Hongo comestible de sabor suave y textura carnosa.', 22, 3.1, 0.3, 3.3, 1),
('Granada', 'Fruta con múltiples semillas dulces.', 83, 1.67, 1.17, 19, 2);

-- bebidas
INSERT INTO alimento (alimento, descripcion, calorias, proteinas, grasas, carbohidratos, id_unidades)
VALUES
("Agua", "Bebida refrescante sin calorías", 0, 0, 0, 0, 3),
("Café negro", "Bebida caliente hecha con granos de café", 1, 0.1, 0, 0.3, 3),
("Té verde", "Infusión de hojas de té sin azúcar", 1, 0.1, 0, 0, 3),
("Té negro", "Infusión de hojas de té sin azúcar", 1, 0, 0, 0, 3),
("Té de hierbas", "Infusión de hierbas sin azúcar", 2, 0, 0, 0, 3),
("Coca-Cola", "Refresco carbonatado", 42, 0, 0, 10.6, 3),
("Pepsi", "Refresco carbonatado", 41, 0, 0, 10.6, 3),
("Sprite", "Refresco carbonatado sin colorantes", 38, 0, 0, 9.8, 3),
("Fanta naranja", "Refresco carbonatado sabor naranja", 44, 0, 0, 11.3, 3),
("Mirinda", "Refresco carbonatado sabor naranja", 44, 0, 0, 11.3, 3),
("7 Up", "Refresco carbonatado sin cafeína", 38, 0, 0, 9.8, 3),
("Agua mineral", "Agua con gas", 0, 0, 0, 0, 3),
("Agua con gas", "Agua carbonatada", 0, 0, 0, 0, 3),
("Agua tónica", "Bebida carbonatada con quinina", 32, 0, 0, 8, 3),
("Limonada", "Bebida refrescante de limón sin azúcar", 30, 0.1, 0, 8, 3);


CREATE TABLE solicitud_alimento(
id_solicitud INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
id_usuario INT NOT NULL,
alimento VARCHAR(35) NOT NULL,
descripcion VARCHAR(300) NOT NULL,
id_unidades INT NOT NULL,
calorias SMALLINT,
proteinas DECIMAL(5,1) NOT NULL,
grasas DECIMAL(5,1) NOT NULL,
carbohidratos DECIMAL(5,1) NOT NULL,
FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

INSERT INTO solicitud_alimento (id_usuario, alimento, descripcion, id_unidades, calorias, proteinas, grasas, carbohidratos)
VALUES
(1, 'Tacos al pastor', 'Deliciosos tacos de carne de cerdo marinada con especias y adobo, servidos en tortillas de maíz.', 1, 450, 25.5, 12.3, 32.7),
(1, 'Enchiladas verdes', 'Tortillas de maíz rellenas de pollo deshebrado, bañadas en salsa verde y queso rallado.', 1, 380, 18.2, 14.9, 42.6);


CREATE TABLE unidades (
id_unidades INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
descripcion VARCHAR(30)
);


INSERT INTO unidades (descripcion) VALUES
("100 g"),("Unidad(es)"),("100 ml"),("Taza(s)"),("Onza(s)"),("Cucharada(s)");


CREATE TABLE comida(
id_comida INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
fecha DATE NOT NULL,
id_usuario INT NOT NULL,
num_comida TINYINT NOT NULL,
FOREIGN KEY (fecha) REFERENCES dia(fecha),
FOREIGN KEY (id_usuario) REFERENCES dia(id_usuario)
);

CREATE TABLE alimentos_comida(
id_alimentos_comida INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
id_alimento INT NOT NULL,
id_comida INT NOT NULL,
cantidad DECIMAL(7,2),
FOREIGN KEY (id_alimento) REFERENCES alimento(id_alimento),
FOREIGN KEY (id_comida) REFERENCES comida(id_comida)
);