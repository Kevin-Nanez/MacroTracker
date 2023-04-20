DROP DATABASE IF EXISTS macrotracker;

CREATE DATABASE IF NOT EXISTS macrotracker;

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

INSERT INTO usuario (usuario, password, sexo, edad, altura, peso, dias_af, cal_mant, cal_subir, cal_bajar, objetivo) 
VALUES 
  ('Anuel', 'contrasena123', 'M', 28, 175, 80.5, 5, 2000, 2400, 1600, 1750),
  ('Lyanno', 'clave456', 'F', 42, 162, 65.2, 3, 1500, 1850, 1200, 1850),
  ('Luar La L', 'pwd789', 'M', 20, 180, 90.0, 7, 2200, 2600, 1800, 2000),
  ('Myke Towers', 'clave246', 'F', 35, 170, 68.7, 2, 1600, 1900, 1300, 2200),
  ('Tiago PZK', 'contraseña135', 'M', 50, 185, 95.2, 6, 2300, 2600, 2000, 1900);



CREATE TABLE dia (
fecha DATE NOT NULL,
id_usuario int NOT NULL,
objetivo int NOT NULL default 0,
cal_consumidas int default 0,
cal_restantes int default 0,
FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
PRIMARY KEY (fecha,id_usuario)
);



INSERT INTO dia (fecha, id_usuario)
VALUES 
    ('2023-04-18', 1 ), 
    ('2023-04-19', 1  ), 
    ('2023-04-18', 2), 
    ('2023-04-19', 2), 
    ('2023-04-18', 3), 
    ('2023-04-19', 3), 
    ('2023-04-18', 4), 
    ('2023-04-19', 4), 
    ('2023-04-18', 5), 
    ('2023-04-19', 5);

-- llenar columna objetivo
SET SQL_SAFE_UPDATES = 0;
UPDATE dia INNER JOIN usuario ON dia.id_usuario = usuario.id_usuario
SET dia.objetivo = usuario.objetivo;
-- llenar calorias restantes
UPDATE dia SET cal_restantes = objetivo - cal_consumidas;
SET SQL_SAFE_UPDATES = 1;



-- que escuche cuando se modifique dia
DROP TRIGGER IF EXISTS update_cal_restantes; 
DELIMITER //
CREATE TRIGGER update_cal_restantes
BEFORE UPDATE ON dia
FOR EACH ROW
BEGIN
IF NEW.objetivo <> old.objetivo or NEW.cal_consumidas <> old.cal_consumidas
then 
  SET new.cal_restantes = new.objetivo - new.cal_consumidas;
	end if;
    end//
DELIMITER ; 
-- dispara trigger: update dia set objetivo = 123200 where id_usuario = 1 and fecha ='2023-04-18';

CREATE TABLE comida(
id_comida int primary key not null auto_increment,
fecha date not null,
id_usuario int NOT NULL,
num_comida int not null,
num_alimentos int not null default 0,
calorias_comida int default 0,
FOREIGN KEY (fecha) REFERENCES dia(fecha),
FOREIGN KEY (id_usuario) REFERENCES dia(id_usuario)
);
CREATE INDEX fecha_idx ON comida (fecha);

INSERT INTO comida (fecha, id_usuario, num_comida) VALUES
('2023-04-18', 1, 1),
('2023-04-18', 1, 2),
('2023-04-18', 1, 3),
('2023-04-18', 2, 1),
('2023-04-18', 2, 2),
('2023-04-18', 2, 3),
('2023-04-18', 3, 1),
('2023-04-18', 3, 2),
('2023-04-18', 3, 3),
('2023-04-19', 4, 1),
('2023-04-19', 4, 2),
('2023-04-19', 4, 3),
('2023-04-19', 5, 1),
('2023-04-19', 5, 2),
('2023-04-19', 5, 3);


CREATE TABLE alimento(
id_alimento int primary key AUTO_INCREMENT not null,
alimento varchar(35) not null,
descripcion varchar(300) not null,
contenido ENUM('100 g', '100 ml', '1 unidad'),
calorias int,
proteinas float,
grasas float,
carbohidratos float,
img blob
);

INSERT INTO alimento (alimento, descripcion, contenido, calorias, proteinas, grasas, carbohidratos)
VALUES ('Huevo', 'Huevo de gallina', '1 unidad', 78, 6.29, 5.3, 0.6),
('Pechuga de pollo', 'Pechuga de pollo sin piel', '100 g', 165, 31, 3.6, 0),
('Arroz', 'Arroz blanco cocido', '100 g', 130, 2.7, 0.3, 28),
('Mazapan de la rosa (28g)', 'Mazapan de cacahuate', '1 unidad', 71, 2.5, 5, 19),
('Gansito', 'Pastelillo de chocolate relleno de crema', '1 unidad', 180, 2, 7, 29),
('Coca-cola', 'Refresco de cola', '100 ml', 42, 0, 0, 10.6),
('Avena', 'Avena en hojuelas', '100 g', 379, 13, 6.5, 67),
('Leche', 'Leche entera', '100 ml', 66, 3.3, 3.6, 4.8);



CREATE TABLE alimentos_comida(
id_alimentos_comida int primary key AUTO_INCREMENT not null,
fecha date not null,
id_alimento int not null,
alimento varchar(35),
id_comida int not null,
cantidad float not null,
contenido ENUM('100 g', '100 ml', '1 unidad'),
calorias_detalle int,
proteinas_detalle float,
grasas_detalle float,
carbohidratos_detalle float,
FOREIGN KEY (id_alimento) REFERENCES alimento(id_alimento),
FOREIGN KEY (id_comida) REFERENCES comida(id_comida),
FOREIGN KEY (fecha) REFERENCES comida(fecha)
);

INSERT INTO alimentos_comida (id_alimento, fecha, id_comida, cantidad) VALUES
(1, '2023-04-18', 1, 2),
(2, '2023-04-18', 1, 3),
(3, '2023-04-18', 1, 1),
(5, '2023-04-18', 1, 2),
(8, '2023-04-18', 1, 1),
(4, '2023-04-18', 2, 3),
(6, '2023-04-18', 2, 2),
(1, '2023-04-18', 2, 1),
(3, '2023-04-18', 3, 1),
(6, '2023-04-18', 3, 3),
(7, '2023-04-18', 3, 2),
(2, '2023-04-19', 4, 1),
(4, '2023-04-19', 4, 2),
(6, '2023-04-19', 4, 3),
(5, '2023-04-19', 5, 1),
(3, '2023-04-19', 5, 2),
(8, '2023-04-19', 5, 3),
(1, '2023-04-19', 6, 3),
(2, '2023-04-19', 6, 2),
(4, '2023-04-19', 6, 1),
(8, '2023-04-19', 7, 2),
(7, '2023-04-19', 7, 3),
(6, '2023-04-19', 7, 1),
(1, '2023-04-19', 8, 2);

-- traer campos alimento y contenido de tabla alimento 
SET SQL_SAFE_UPDATES = 0;
UPDATE alimentos_comida
INNER JOIN alimento ON alimentos_comida.id_alimento = alimento.id_alimento
SET alimentos_comida.alimento = alimento.alimento,
    alimentos_comida.contenido = alimento.contenido;
-- calcular calorias, proteinas, grasas y carbohidratos.
UPDATE alimentos_comida
SET calorias_detalle = (
    SELECT calorias * cantidad
    FROM alimento
    WHERE id_alimento = alimentos_comida.id_alimento
), proteinas_detalle = (
    SELECT proteinas * cantidad
    FROM alimento
    WHERE id_alimento = alimentos_comida.id_alimento
), grasas_detalle = (
    SELECT grasas * cantidad
    FROM alimento
    WHERE id_alimento = alimentos_comida.id_alimento
), carbohidratos_detalle = (
    SELECT carbohidratos * cantidad
    FROM alimento
    WHERE id_alimento = alimentos_comida.id_alimento
);

-- actualizar num alimentos 1ra vez
SET SQL_SAFE_UPDATES = 0;
UPDATE comida
SET num_alimentos = (SELECT COUNT(*) FROM alimentos_comida WHERE id_comida = comida.id_comida);

-- obtener calorias_comida por primera vez
UPDATE comida
SET calorias_comida = (
  SELECT SUM(calorias_detalle)
  FROM alimentos_comida
  WHERE alimentos_comida.id_comida = comida.id_comida
);


-- actualizar calorias_comida de comida

DELIMITER //
CREATE TRIGGER actualizar_calorias_comida
AFTER INSERT ON alimentos_comida
FOR EACH ROW
BEGIN
  UPDATE comida
  SET calorias_comida = (
    SELECT SUM(calorias_detalle)
    FROM alimentos_comida
    WHERE id_comida = NEW.id_comida
  )
  WHERE id_comida = NEW.id_comida;
END//

CREATE TRIGGER actualizar_calorias_comida_actualizar
AFTER UPDATE ON alimentos_comida
FOR EACH ROW
BEGIN
  UPDATE comida
  SET calorias_comida = (
    SELECT SUM(calorias_detalle)
    FROM alimentos_comida
    WHERE id_comida = NEW.id_comida
  )
  WHERE id_comida = NEW.id_comida;
END//


CREATE TRIGGER actualizar_calorias_comida_eliminar
AFTER DELETE ON alimentos_comida
FOR EACH ROW
BEGIN
  UPDATE comida
  SET calorias_comida = (
    SELECT SUM(calorias_detalle)
    FROM alimentos_comida
    WHERE id_comida = OLD.id_comida
  )
  WHERE id_comida = OLD.id_comida;
END//

DELIMITER ;



-- actualizar num alimentos
DROP TRIGGER IF EXISTS update_alimentos_comida; 
DELIMITER //
CREATE TRIGGER update_alimentos_comida
BEFORE UPDATE ON alimentos_comida
FOR EACH ROW
BEGIN
	UPDATE comida
    SET num_alimentos = (SELECT COUNT(*) FROM alimentos_comida WHERE id_comida = NEW.id_comida)
    WHERE id_comida = NEW.id_comida;
    
END//
DELIMITER ;

-- obtener dia(cal_consumidas) por primera vez

UPDATE dia d
SET d.cal_consumidas = (SELECT SUM(c.calorias_comida)
                        FROM comida c
                        WHERE c.fecha = d.fecha AND c.id_usuario = d.id_usuario);
UPDATE dia d
SET d.cal_restantes = d.objetivo - d.cal_consumidas; 

-- detecta cambios en comida(calorias_comida) para actualizar dia(cal_consumidas)
DROP TRIGGER IF EXISTS update_cal_consumidas;
DELIMITER //
CREATE TRIGGER update_cal_consumidas
AFTER UPDATE ON comida
FOR EACH ROW
BEGIN
UPDATE dia d
SET d.cal_consumidas = (
SELECT SUM(c.calorias_comida)
FROM comida c
WHERE c.fecha = d.fecha AND c.id_usuario = d.id_usuario
)
WHERE d.fecha = NEW.fecha AND d.id_usuario = NEW.id_usuario;
UPDATE dia d
SET d.cal_restantes = d.objetivo - d.cal_consumidas
WHERE d.fecha = NEW.fecha AND d.id_usuario = NEW.id_usuario;
END//
DELIMITER ;



-- detecta cambios en cal_consumidas para actualizar cal_restantes
DROP TRIGGER IF EXISTS update_cal_consumidas;
DELIMITER //
CREATE TRIGGER update_cal_consumidas
AFTER UPDATE ON dia
FOR EACH ROW
BEGIN
  IF NEW.cal_consumidas != OLD.cal_consumidas THEN
    UPDATE dia
    SET cal_restantes = NEW.objetivo - NEW.cal_consumidas
    WHERE fecha = NEW.fecha AND id_usuario = NEW.id_usuario;
  END IF;
END //
DELIMITER ;

DROP TRIGGER IF exists update_alimentos_comida;
DELIMITER //
CREATE TRIGGER update_alimentos_comida
BEFORE UPDATE ON alimentos_comida
FOR EACH ROW
BEGIN
    IF NEW.cantidad != old.cantidad THEN 
        SET NEW.calorias_detalle = (
            SELECT calorias * NEW.cantidad
            FROM alimento
            WHERE id_alimento = NEW.id_alimento
        );
		SET NEW.proteinas_detalle = (
            SELECT proteinas * NEW.cantidad
            FROM alimento
            WHERE id_alimento = NEW.id_alimento
        );
		SET NEW.grasas_detalle = (
            SELECT grasas * NEW.cantidad
            FROM alimento
            WHERE id_alimento = NEW.id_alimento
        );
		SET NEW.carbohidratos_detalle = (
            SELECT carbohidratos * NEW.cantidad
            FROM alimento
            WHERE id_alimento = NEW.id_alimento
        );
    END IF;
END//
DELIMITER ;

update alimentos_comida set cantidad = 1033 where id_alimentos_comida = 1;
select * from alimentos_comida;
select * from comida;
SELECT * from dia;


CREATE TABLE solicitud_alimento(
id_solicitud int primary key AUTO_INCREMENT not null,
id_usuario int not null,
alimento varchar(35),
descripcion varchar(300) not null,
contenido ENUM('100 g', '100 ml', '1 unidad'),
calorias int,
proteinas float,
grasas float,
carbohidratos float,
FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

INSERT INTO solicitud_alimento (id_usuario, alimento, descripcion, contenido, calorias, proteinas, grasas, carbohidratos)
VALUES (1, 'Leche', 'Leche descremada en polvo', '100 g', 362, 34.5, 1.0, 52.0),
(1, 'Huevos', 'Huevos de gallina', '1 unidad', 155, 12.6, 10.6, 1.1),
(2, 'Arroz', 'Arroz integral', '100 g', 130, 2.7, 0.9, 28.0),
(2, 'Manzana', 'Manzana fuji', '1 unidad', 95, 0.5, 0.3, 25.1),
(3, 'Atún', 'Atún enlatado', '100 g', 109, 26.5, 0.7, 0.0),
(3, 'Lechuga', 'Lechuga romana', '100 g', 17, 1.2, 0.2, 3.3);

select * from solicitud_alimento;



