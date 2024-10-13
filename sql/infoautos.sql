-- phpMyAdmin SQL Dump
-- version 2.8.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 17-08-2012 a las 00:43:05
-- Versión del servidor: 5.0.21
-- Versión de PHP: 5.1.4
-- 
-- Base de datos: `infoautos`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `auto`
-- 

CREATE TABLE `auto` (
  `Patente` varchar(10) character set utf8 collate utf8_unicode_ci NOT NULL,
  `Marca` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `Modelo` int(11) NOT NULL,
  `DniDuenio` varchar(10) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`Patente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `auto`
-- 

INSERT INTO `auto` (`Patente`, `Marca`, `Modelo`, `DniDuenio`) VALUES
('BCD 123', 'Toyota', 2010, '31265847'),
('FFF 456', 'Chevrolet', 2005, '27485963'),
('AAA 789', 'Volkswagen', 2000, '29456987'),
('RTE 852', 'Renault', 2002, '32547896'),
('GHJ 741', 'Ford', 2012, '29874563'),
('AA 234 BB', 'Peugeot', 2001, '30125489'),
('BVF 963', 'Fiat', 2008, '28765498'),
('PLK 741', 'Honda', 2015, '26789541'),
('JKL 741', 'Volkswagen', 2013, '32478596'),
('CD 987 BD', 'Chevrolet', 2018, '31546978'),
('MMM 654', 'Toyota', 2017, '30965874'),
('AE 123 CD', 'Ford', 2014, '29874512'),
('AB 321 BA', 'Fiat', 2019, '32658741'),
('ASD 124', 'Volkswagen', 2003, '30745812'),
('XX 987 YY', 'Peugeot', 2011, '31879654'),
('RPL 951', 'Honda', 2009, '30658794'),
('AP 987 KL', 'Chevrolet', 2016, '32054879'),
('BMC 321', 'Ford', 2020, '28496325'),
('ZZ 741 ZX', 'Renault', 2015, '29254781'),
('QWE 963', 'Citroen', 2007, '31647985'),
('AB 852 ZZ', 'Ford', 2013, '32147895'),
('LKJ 741', 'Chevrolet', 2009, '31125698'),
('OP 963 HG', 'Peugeot', 2010, '30247895'),
('AC 741 JF', 'Toyota', 2021, '29654782'),
('GB 852 HG', 'Volkswagen', 2018, '28749652'),
('MN 741 AZ', 'Fiat', 2020, '32587412'),
('TYU 963', 'Citroen', 2007, '29365478'),
('ET 963 JK', 'Renault', 2015, '31978546'),
('JK 852 PL', 'Peugeot', 2014, '30178542'),
('DRE 963', 'Volkswagen', 2021, '29852479'),
('LKJ 123', 'Nissan', 2012, '32789541'),
('YU 963 ZX', 'Renault', 2018, '30985746'),
('CV 741 AS', 'Peugeot', 2015, '29748596'),
('LP 963 QW', 'Fiat', 2020, '31687495'),
('RTY 852', 'Ford', 2000, '29231457'),
('ZX 123 PO', 'Volkswagen', 2021, '31045782'),
('BNM 963', 'Honda', 2019, '30547896'),
('AGH 852', 'Toyota', 2016, '31356987'),
('YU 789 HG', 'Citroen', 2018, '29548756'),
('DF 741 GH', 'Chevrolet', 2019, '32475963');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `persona`
-- 

CREATE TABLE `persona` (
  `NroDni` varchar(10) character set utf8 collate utf8_unicode_ci NOT NULL,
  `Apellido` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `Nombre` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `fechaNac` date NOT NULL,
  `Telefono` varchar(20) character set utf8 collate utf8_unicode_ci NOT NULL,
  `Domicilio` varchar(200) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`NroDni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `persona`
-- 

INSERT INTO `persona` (`NroDni`, `Apellido`, `Nombre`, `fechaNac`, `Telefono`, `Domicilio`) VALUES
('31265847', 'Alvarez', 'Juan', '1980-11-04', '299-1542587', 'Mitre 120'),
('27485963', 'Gonzalez', 'Sofia', '1985-09-12', '299-1589632', 'Salta 23'),
('29456987', 'Fernandez', 'Lucia', '1979-04-30', '299-1567894', 'Corrientes 45'),
('32547896', 'Martinez', 'Carlos', '1990-07-11', '299-1594871', 'Belgrano 88'),
('29874563', 'Diaz', 'Javier', '1987-03-22', '299-9654781', 'La Pampa 130'),
('30125489', 'Sanchez', 'Valeria', '1992-12-19', '299-9632145', 'Jujuy 150'),
('28765498', 'Rodriguez', 'Marcos', '1984-01-02', '299-9874521', 'San Juan 17'),
('26789541', 'Perez', 'Ana', '1989-08-21', '299-1547896', 'La Rioja 78'),
('32478596', 'Gomez', 'Pablo', '1993-05-14', '299-9654782', 'Catamarca 61'),
('31546978', 'Romero', 'Laura', '1978-06-03', '299-1587963', 'Entre Rios 80'),
('30965874', 'Luna', 'Camila', '1986-09-07', '299-9685741', 'Neuquén 76'),
('29874512', 'Silva', 'Martin', '1991-02-17', '299-9574863', 'Mendoza 102'),
('32658741', 'Ruiz', 'Daniela', '1988-11-26', '299-9685742', 'Cordoba 202'),
('30745812', 'Ortiz', 'Julian', '1994-04-06', '299-9641253', 'Chaco 22'),
('31879654', 'Castro', 'Cecilia', '1983-01-13', '299-9632584', 'Formosa 95'),
('30658794', 'Benitez', 'Emilio', '1982-03-18', '299-9651248', 'Misiones 67'),
('32054879', 'Herrera', 'María', '1985-12-29', '299-9632147', 'San Luis 33'),
('28496325', 'Vega', 'Guillermo', '1990-10-08', '299-9654783', 'Santa Cruz 56'),
('29254781', 'Mendoza', 'Gabriela', '1992-06-05', '299-9642153', 'Chubut 48'),
('31647985', 'Cabrera', 'Federico', '1979-08-16', '299-9548712', 'Tucumán 115'),
('32147895', 'Navarro', 'Santiago', '1982-07-19', '299-9587452', 'Rivadavia 45'),
('31125698', 'Torres', 'Florencia', '1986-01-25', '299-9685743', 'San Martin 78'),
('30247895', 'Dominguez', 'Ignacio', '1991-02-11', '299-9641587', '9 de Julio 112'),
('29654782', 'Morales', 'Patricia', '1984-09-16', '299-9785412', 'Maipu 27'),
('28749652', 'Suarez', 'Federico', '1990-04-05', '299-9654712', 'Leandro N. Alem 48'),
('32587412', 'Molina', 'Maria', '1989-11-17', '299-9632547', 'Roca 215'),
('29365478', 'Rojas', 'Sebastian', '1981-12-27', '299-9541268', 'Mitre 304'),
('31978546', 'Acosta', 'Luciana', '1983-07-22', '299-9854127', 'Chaco 89'),
('30178542', 'Flores', 'Rodrigo', '1992-03-15', '299-9645781', 'Santa Cruz 75'),
('29852479', 'Pereyra', 'Liliana', '1987-10-23', '299-9632148', 'Neuquén 110'),
('32789541', 'Carrizo', 'Julieta', '1993-06-12', '299-9647854', 'La Pampa 63'),
('30985746', 'Sosa', 'Nicolas', '1978-02-19', '299-9874513', 'Corrientes 18'),
('29748596', 'Medina', 'Daniel', '1994-08-05', '299-9563214', 'Salta 155'),
('31687495', 'Vargas', 'Agustin', '1985-05-21', '299-9685749', 'Entre Rios 45'),
('29231457', 'Chavez', 'Andrea', '1986-12-14', '299-9541257', 'Jujuy 230'),
('31045782', 'Cruz', 'Guillermo', '1980-11-03', '299-9632548', 'Formosa 9'),
('30547896', 'Ferreyra', 'Valentina', '1991-01-27', '299-9841256', 'Misiones 77'),
('31356987', 'Aguilar', 'Hernan', '1989-04-10', '299-9741256', 'Tucumán 300'),
('29548756', 'Escobar', 'Romina', '1992-11-11', '299-9785412', 'Chubut 60'),
('32475963', 'Coria', 'Lucas', '1988-09-25', '299-9632149', 'San Juan 105'),
('32879654', 'Villalba', 'Pilar', '1983-06-17', '299-9654787', 'La Rioja 210'),
('30698541', 'Ponce', 'Matias', '1987-02-12', '299-9587456', 'Santa Fe 115'),
('29785649', 'Correa', 'Emilia', '1993-07-13', '299-9685748', 'Córdoba 98'),
('31245876', 'Ojeda', 'Franco', '1984-08-07', '299-9654785', 'Santa Cruz 43'),
('30356798', 'Palacios', 'Noelia', '1979-03-25', '299-9632541', 'San Luis 57'),
('31456978', 'Arias', 'Diego', '1986-10-16', '299-9587457', 'Mendoza 123'),
('29985741', 'Jara', 'Lucia', '1991-05-06', '299-9632141', 'San Juan 85'),
('31798564', 'Maldonado', 'Marina', '1990-09-19', '299-9645785', 'Neuquén 25'),
('32965874', 'Campos', 'Ricardo', '1981-07-09', '299-9587458', 'Jujuy 13'),
('30874563', 'Salas', 'Gabriela', '1994-02-24', '299-9685747', 'Entre Rios 121');

CREATE TABLE ciudad (
  ciu_id int(3) NOT NULL PRIMARY KEY,
  ciu_nombre varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 
-- Volcar la base de datos para la tabla `persona`
-- 
INSERT INTO ciudad (ciu_id, ciu_nombre) VALUES
(1, 'Centenario'),
(2, 'Neuquén'),
(3, 'Cipolletti'),
(4, 'Plottier');
-- -----------------------------------------------------------------

CREATE TABLE comercio (
  com_id int(6) NOT NULL PRIMARY KEY,
  com_nombre varchar(30),
  ciu_id int(3)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `comercio`
-- 

INSERT INTO comercio (com_id, com_nombre, ciu_id) VALUES
(1, 'Panaderia Rico Pan', 1),
(2, 'Panaderia Nacional', 1),
(3, 'Taller de Psstas', 1),
(4, 'Maestro Pizero', 1),
(5, 'Panaderia el Roco', 2),
(6, 'Tallarines Artesanales', 2),
(7, 'Maestro de Pizas Neuquen', 2),
(8, 'Panaderia sin Nombre', 2),
(9, 'Empanadas YA!', 3),
(10, 'Locro al plato frio', 3),
(11, 'Empanadas Salteñas Cipolletti', 3),
(12, 'Panaderia Nacional Cipo', 3),
(13, 'Pastas Frescas sin limite', 4),
(14, 'Empanadas Maestrulli', 4),
(15, 'Pastas Finas La Nona', 4),
(16, 'La mejor Pasta del Valle', 4);

-- --------------------------------------------------------------

/*ALTER TABLE `auto` ADD KEY `idTipoVehiculo` (`DniDuenio`);*/

ALTER TABLE `auto`
ADD CONSTRAINT `auto_ibfk_1` FOREIGN KEY (`DniDuenio`) REFERENCES `persona` (`NroDni`);

ALTER TABLE `comercio`
ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`ciu_id`) REFERENCES `ciudad` (`ciu_id`);

ALTER TABLE comercio
ADD latitud DECIMAL(9,6),
ADD longitud DECIMAL(9,6);



-- ********   IPs   ********* 
-- -Neuquén: 190.93.194.0
-- -Plottier: 
-- -Centenario: 200.59.235.0
-- -Cipolletti: 186.127.32.0

        Neuquén
 * Latitud    *Longitud
# -38.950675   -68.066232
# -38.950608  -68.054821
# -38.953278 -68.060226
# -38.954479 -68.052762
# 
        Cipolletti  
# -38.929299 -67.98658
# -38.926761 -67.984178
# -38.933682 -67.977142
# -38.940091, -68.000136

        Centenario
# -38.832576 -68.122667
# -38.834315 -68.119064
# -38.833914 -68.136138
# -38.828565 -68.136052

INSERT INTO comercio (com_id, com_nombre, ciu_id, latitud, longitud) VALUES
(1, 'Panaderia Rico Pan', 1,-38.832576 ,-68.122667),
(2, 'Panaderia Nacional', 1, -38.834315, -68.119064),
(3, 'Taller de Psstas', 1, -38.833914,-68.136138),
(4, 'Maestro Pizero', 1, -38.828565,-68.136052),
(5, 'Panaderia el Roco', 2, -38.950675,-68.066232),
(6, 'Tallarines Artesanales', 2, -38.950608,-68.054821),
(7, 'Maestro de Pizas Neuquen', 2, -38.953278,-68.060226),
(8, 'Panaderia sin Nombre', 2, -38.954479,-68.052762),
(9, 'Empanadas YA!', 3, -38.929299, -67.98658),
(10, 'Locro al plato frio', 3, -38.926761, -67.984178),
(11, 'Empanadas Salteñas Cipolletti', 3, -38.933682, -67.977142),
(12, 'Panaderia Nacional Cipo', 3, -38.940091, -68.000136)