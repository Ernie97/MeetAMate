-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mag 17, 2018 alle 12:36
-- Versione del server: 10.1.25-MariaDB
-- Versione PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meetamate`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `comentarios`
--

CREATE TABLE `comentarios` (
  `ID_Ocio` int(6) NOT NULL,
  `ID_Usuario` int(6) NOT NULL,
  `Valoracion` int(1) NOT NULL,
  `Comentario` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `comentarios`
--

INSERT INTO `comentarios` (`ID_Ocio`, `ID_Usuario`, `Valoracion`, `Comentario`) VALUES
(3, 135, 3, 'me gusta'),
(3, 139, 2, 'No me ha gustado mucho'),
(4, 138, 4, 'Me encanta esta disco'),
(4, 141, 3, '	Pon aquí tu comentario...'),
(5, 140, 5, 'Genial!'),
(5, 141, 2, '	Pon aquí tu comentario...'),
(6, 140, 5, NULL),
(7, 137, 1, 'muy sucio'),
(7, 141, 4, ''),
(8, 135, 3, NULL),
(9, 137, 5, 'excelente ubicación! '),
(9, 141, 3, 'me gusta'),
(10, 136, 3, NULL),
(10, 140, 5, 'me ha encantado vivir aquí'),
(10, 141, 3, '	Pon aquí tu comentario...');

-- --------------------------------------------------------

--
-- Struttura della tabella `companieros`
--

CREATE TABLE `companieros` (
  `Usuario1` int(6) NOT NULL,
  `Usuario2` int(6) NOT NULL,
  `1PuedeVer2` tinyint(1) NOT NULL,
  `2PuedeVer1` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `companieros`
--

INSERT INTO `companieros` (`Usuario1`, `Usuario2`, `1PuedeVer2`, `2PuedeVer1`) VALUES
(138, 139, 0, 1),
(138, 143, 1, 1),
(139, 143, 0, 0),
(143, 137, 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `discotecas`
--

CREATE TABLE `discotecas` (
  `ID_Disco` int(6) NOT NULL,
  `Imagen_Perfil` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Galeria` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Link` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `discotecas`
--

INSERT INTO `discotecas` (`ID_Disco`, `Imagen_Perfil`, `Galeria`, `Link`) VALUES
(3, 'dsbad', NULL, 'sdjnjkd'),
(4, 'high', NULL, 'sdba');

-- --------------------------------------------------------

--
-- Struttura della tabella `fiestas`
--

CREATE TABLE `fiestas` (
  `ID_Fiesta` int(6) NOT NULL,
  `Imagen_Perfil` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Galeria` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Link` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha_Inicio` date NOT NULL,
  `Fecha_Fin` date DEFAULT NULL,
  `RRHH` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `fiestas`
--

INSERT INTO `fiestas` (`ID_Fiesta`, `Imagen_Perfil`, `Galeria`, `Link`, `Fecha_Inicio`, `Fecha_Fin`, `RRHH`) VALUES
(5, 'fdsfdsf', NULL, 'uff', '2018-04-30', '2018-04-30', NULL),
(6, 'sdhajdgjh', NULL, 'dakdhka', '2018-04-26', '2018-04-27', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `formulario`
--

CREATE TABLE `formulario` (
  `ID_Usuario` int(6) NOT NULL,
  `Perfil_Publico` tinyint(1) NOT NULL DEFAULT '0',
  `Fecha_Inicio` date NOT NULL,
  `Fecha_Fin` date NOT NULL,
  `Presupuesto_Min` int(4) DEFAULT NULL,
  `Presupuesto_Max` int(4) NOT NULL,
  `Mismo_Sexo_Companeros` tinyint(1) NOT NULL DEFAULT '0',
  `Misma_Nacionalidad` tinyint(1) NOT NULL DEFAULT '0',
  `Es_Fumador` tinyint(1) NOT NULL DEFAULT '0',
  `No_Fumadores` tinyint(1) NOT NULL DEFAULT '0',
  `Tiene_Mascota` tinyint(1) NOT NULL DEFAULT '0',
  `No_Pet_Friendly` tinyint(1) NOT NULL DEFAULT '0',
  `Solo_Centro` tinyint(1) NOT NULL DEFAULT '0',
  `Le_Gusta_Fiesta` tinyint(1) NOT NULL DEFAULT '0',
  `Busca_Tranquilidad` tinyint(1) NOT NULL DEFAULT '0',
  `Se_Habla_Espanol` tinyint(1) NOT NULL DEFAULT '0',
  `Se_Habla_Ingles` tinyint(1) NOT NULL DEFAULT '0',
  `Idioma1` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Idioma2` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Idioma3` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Idioma4` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description_Personal` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `formulario`
--

INSERT INTO `formulario` (`ID_Usuario`, `Perfil_Publico`, `Fecha_Inicio`, `Fecha_Fin`, `Presupuesto_Min`, `Presupuesto_Max`, `Mismo_Sexo_Companeros`, `Misma_Nacionalidad`, `Es_Fumador`, `No_Fumadores`, `Tiene_Mascota`, `No_Pet_Friendly`, `Solo_Centro`, `Le_Gusta_Fiesta`, `Busca_Tranquilidad`, `Se_Habla_Espanol`, `Se_Habla_Ingles`, `Idioma1`, `Idioma2`, `Idioma3`, `Idioma4`, `Description_Personal`) VALUES
(136, 1, '2018-04-10', '2018-06-13', NULL, 500, 1, 0, 0, 1, 0, 1, 0, 1, 0, 1, 1, 'Español', NULL, NULL, NULL, '1'),
(137, 1, '2000-01-01', '2000-01-01', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'English', 'English', 'English', 'English', NULL),
(138, 0, '2000-01-01', '2000-01-01', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'English', 'English', 'English', 'English', NULL),
(139, 1, '2018-04-03', '2018-07-18', NULL, 500, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL),
(143, 1, '2000-01-01', '2000-03-11', 300, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 'English', 'Français', 'English', 'English', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `hashtags`
--

CREATE TABLE `hashtags` (
  `ID_Ocio` int(6) NOT NULL,
  `Hashtag` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `hashtags`
--

INSERT INTO `hashtags` (`ID_Ocio`, `Hashtag`) VALUES
(3, 'bailar'),
(3, 'copas'),
(5, 'espuma'),
(7, 'vinos'),
(8, 'gente'),
(11, 'centro');

-- --------------------------------------------------------

--
-- Struttura della tabella `ocios`
--

CREATE TABLE `ocios` (
  `ID_Ocio` int(6) NOT NULL,
  `Categoria` enum('discotecas','fiestas','pubs','quedadas','residencias') COLLATE utf8_unicode_ci NOT NULL,
  `Nombre_Ocio` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Localizacion` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Latitud` float DEFAULT NULL,
  `Longitud` float DEFAULT NULL,
  `Descripcion` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `ocios`
--

INSERT INTO `ocios` (`ID_Ocio`, `Categoria`, `Nombre_Ocio`, `Localizacion`, `Latitud`, `Longitud`, `Descripcion`) VALUES
(3, 'discotecas', 'kapital', 'calle x', NULL, NULL, '1617: El matemático escocés John Napier (1550-1617), famoso por su invención de los logaritmos, desarrolló un sistema para realizar operaciones aritméticas manipulando barras, a las que llamó \"huesos\" ya que estaban construidas con material de hueso o marfil, y en los que estaban plasmados los dígitos. Dada su naturaleza, se llamó al sistema \"huesos de Napier\" (ábaco neperiano). Los huesos de Napier tuvieron una fuerte influencia en el desarrollo de la regla deslizante (cinco años más tarde) y las máquinas calculadoras subsecuentes, que contaron con logaritmos.'),
(4, 'discotecas', 'pacha', 'calle y', NULL, NULL, '1623: La primera calculadora mecánica fue diseñada por Wilhelm Schickard en Alemania. Llamada \"reloj calculador\", la máquina incorporó los logaritmos de Napier, haciendo rodar cilindros en un albergue grande. Se comisionó un reloj calculador para Johannes Kepler, famoso matemático y astrónomo, pero fue destruido por el fuego antes de que se terminara su construcción.'),
(5, 'fiestas', 'animal party', 'kapital, calle x', NULL, NULL, '1624: La primera regla deslizante fue inventada por el matemático inglés William Oughtred. La regla deslizante (llamada \"Círculos de Proporción\") era un juego de discos rotatorios que se calibraron con los logaritmos de Napier. Se usó como uno de los primeros aparatos de la informática analógica. Su época de esplendor duró más o menos un siglo, el comprendido entre la segunda mitad del siglo XIX y el último cuarto del XX, hasta que a comienzos de 1970, calculadoras portátiles comenzaron a ser populares.'),
(6, 'fiestas', 'flower party', 'blackhaus, calle z', NULL, NULL, '1645: Blaise Pascal inventa la pascalina. Con esta máquina, los datos se representaban mediante las posiciones de los engranajes. La pascalina es una de las primeras calculadoras mecánicas, que funcionaba a base de ruedas de diez dientes en las que cada uno de los dientes representaba un dígito del 0 al 9. Las ruedas estaban conectadas de tal manera que podían sumarse números haciéndolas avanzar el número de dientes correcto.'),
(7, 'pubs', 'guinness pub', 'calle k', NULL, NULL, '1666: Samuel Morland inventa la primera máquina de multiplicar en la corte del rey Carlos II de Inglaterra. El aparato constó de una serie de ruedas, cada una de las cuales representaba decenas, centenas, etc. Un alfiler de acero movía los diales para ejecutar los cálculos. A diferencia de la pascalina, este aparato no tenía avance automático de columnas.'),
(8, 'quedadas', 'chicas chinas', 'calle o', NULL, NULL, '1673: el matemático alemán Gottfried Leibniz inventa la primera calculadora de propósito general. El aparato era una partida de la pascalina; mientras opera usa un cilindro de dientes (la rueda de Leibniz) en lugar de la serie de engranajes. Aunque el aparato podía ejecutar multiplicaciones y divisiones, padeció de problemas de fiabilidad que disminuyó su utilidad.'),
(9, 'residencias', 'micasainn', 'calle fuencarral 45', NULL, NULL, '1769: Wolfgang von Kempelen, un noble húngaro, inventa un jugador de ajedrez supuestamente Autómata, El Turco. Pretendió ser una máquina pura, incluía un jugador de ajedrez \"robótico\", sin embargo fue una farsa, la cabina era una ilusión óptica bien planteada que permitía a un maestro del ajedrez esconderse en su interior y operar el maniquí. Era una sensación dondequiera que iba pero se destruyó en un incendio en 1856.'),
(10, 'residencias', 'micasainn', 'calle brisa 4', NULL, NULL, '1777: Charles Mahon, tercer conde de Stanhope inventa la primera máquina lógica, el demostrador lógico. Era un aparato de bolsillo que resolvía silogismos tradicionales y preguntas elementales de probabilidad. Mahon es el precursor de los componentes lógicos en computadoras modernas.'),
(11, 'quedadas', 'erasmus italianos', 'plaza del sol', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `partecipantes`
--

CREATE TABLE `partecipantes` (
  `ID_Ocio` int(6) NOT NULL,
  `ID_Usuario` int(6) NOT NULL,
  `Nombre_Publico` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `pubs`
--

CREATE TABLE `pubs` (
  `ID_Pub` int(6) NOT NULL,
  `Imagen_Perfil` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Galeria` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Link` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `pubs`
--

INSERT INTO `pubs` (`ID_Pub`, `Imagen_Perfil`, `Galeria`, `Link`) VALUES
(7, 'dfsgfsg', NULL, 'fdfdsf');

-- --------------------------------------------------------

--
-- Struttura della tabella `quedadas`
--

CREATE TABLE `quedadas` (
  `ID_Quedada` int(6) NOT NULL,
  `Fecha_Inicio` date NOT NULL,
  `Fecha_Fin` date DEFAULT NULL,
  `Organizador` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Idioma` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `quedadas`
--

INSERT INTO `quedadas` (`ID_Quedada`, `Fecha_Inicio`, `Fecha_Fin`, `Organizador`, `Idioma`) VALUES
(8, '2018-04-18', '2018-04-19', 'pablo', NULL),
(11, '2018-04-10', '2018-04-11', 'jose', 'italiano');

-- --------------------------------------------------------

--
-- Struttura della tabella `residencias`
--

CREATE TABLE `residencias` (
  `ID_Resi` int(6) NOT NULL,
  `Imagen_Perfil` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Galeria` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Link` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `residencias`
--

INSERT INTO `residencias` (`ID_Resi`, `Imagen_Perfil`, `Galeria`, `Link`) VALUES
(9, 'dfsdfsd', NULL, 'asear'),
(10, 'sdafad', NULL, 'fdfdsfsd');

-- --------------------------------------------------------

--
-- Struttura della tabella `usuario`
--

CREATE TABLE `usuario` (
  `ID_Usuario` int(6) NOT NULL,
  `Nick_Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Contrasena` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Es_Admin` tinyint(1) NOT NULL DEFAULT '0',
  `Nombre_Usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Primer_Apellido` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Segundo_Apellido` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Imagen_Perfil` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Correo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Telefono` int(15) DEFAULT NULL,
  `Test` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `usuario`
--

INSERT INTO `usuario` (`ID_Usuario`, `Nick_Name`, `Contrasena`, `Es_Admin`, `Nombre_Usuario`, `Primer_Apellido`, `Segundo_Apellido`, `Imagen_Perfil`, `Fecha_Nacimiento`, `Correo`, `Telefono`, `Test`) VALUES
(135, 'pepe', 'pepe', 0, 'pepe', 'pérez', NULL, NULL, '1989-12-07', 'correopepe@ok.com', 587426589, 0),
(136, 'ana', 'ana', 0, 'Ana', 'Martín', NULL, NULL, '1990-08-01', 'correodeana@ok.com', NULL, 1),
(137, 'Sara', 'sara', 0, 'Sara', 'López', NULL, NULL, '2018-04-02', 'correodesara@ok.com', NULL, 1),
(138, 'Carlos', 'carlos', 1, 'Carlos', 'Martín', NULL, NULL, '1998-12-12', 'correodecarlos@ok.com', NULL, 1),
(139, 'Laura', 'laura', 0, 'Laura', 'Pérez', NULL, NULL, '1980-05-04', 'correodelaura@ok.com', 687515489, 1),
(140, 'Ludovica', 'ludo', 0, 'Ludovica', 'Verrieri', '', NULL, '0000-00-00', 'ludo_96_@hotmail.it', 2147483647, 0),
(141, 'ludo', 'ludo', 0, 'ludo', 'verri', '', NULL, '0000-00-00', 'ldfnk@hotmail.it', 6457, 0),
(142, 'juan', 'juan', 0, 'juan', 'carlos', '', NULL, '0000-00-00', 'ghj@hotmail.com', 37288, 0),
(143, 'admin', 'admin', 0, 'qwerty', 'qwerty', '', NULL, '2000-01-01', 'qwerty@querty.com', 698754265, 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`ID_Ocio`,`ID_Usuario`),
  ADD KEY `fk6` (`ID_Usuario`);

--
-- Indici per le tabelle `companieros`
--
ALTER TABLE `companieros`
  ADD PRIMARY KEY (`Usuario1`,`Usuario2`),
  ADD KEY `fk11` (`Usuario2`);

--
-- Indici per le tabelle `discotecas`
--
ALTER TABLE `discotecas`
  ADD PRIMARY KEY (`ID_Disco`);

--
-- Indici per le tabelle `fiestas`
--
ALTER TABLE `fiestas`
  ADD PRIMARY KEY (`ID_Fiesta`);

--
-- Indici per le tabelle `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- Indici per le tabelle `hashtags`
--
ALTER TABLE `hashtags`
  ADD PRIMARY KEY (`ID_Ocio`,`Hashtag`);

--
-- Indici per le tabelle `ocios`
--
ALTER TABLE `ocios`
  ADD PRIMARY KEY (`ID_Ocio`);

--
-- Indici per le tabelle `partecipantes`
--
ALTER TABLE `partecipantes`
  ADD PRIMARY KEY (`ID_Ocio`,`ID_Usuario`),
  ADD KEY `fk31` (`ID_Usuario`);

--
-- Indici per le tabelle `pubs`
--
ALTER TABLE `pubs`
  ADD PRIMARY KEY (`ID_Pub`);

--
-- Indici per le tabelle `quedadas`
--
ALTER TABLE `quedadas`
  ADD PRIMARY KEY (`ID_Quedada`);

--
-- Indici per le tabelle `residencias`
--
ALTER TABLE `residencias`
  ADD PRIMARY KEY (`ID_Resi`);

--
-- Indici per le tabelle `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `ocios`
--
ALTER TABLE `ocios`
  MODIFY `ID_Ocio` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT per la tabella `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_Usuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk5` FOREIGN KEY (`ID_Ocio`) REFERENCES `ocios` (`ID_Ocio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk6` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `companieros`
--
ALTER TABLE `companieros`
  ADD CONSTRAINT `fk10` FOREIGN KEY (`Usuario1`) REFERENCES `usuario` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk11` FOREIGN KEY (`Usuario2`) REFERENCES `usuario` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `discotecas`
--
ALTER TABLE `discotecas`
  ADD CONSTRAINT `fk` FOREIGN KEY (`ID_Disco`) REFERENCES `ocios` (`ID_Ocio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `fiestas`
--
ALTER TABLE `fiestas`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`ID_Fiesta`) REFERENCES `ocios` (`ID_Ocio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `formulario`
--
ALTER TABLE `formulario`
  ADD CONSTRAINT `ID_Usuario_fk2` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limiti per la tabella `hashtags`
--
ALTER TABLE `hashtags`
  ADD CONSTRAINT `fk7` FOREIGN KEY (`ID_Ocio`) REFERENCES `ocios` (`ID_Ocio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `partecipantes`
--
ALTER TABLE `partecipantes`
  ADD CONSTRAINT `fk30` FOREIGN KEY (`ID_Ocio`) REFERENCES `ocios` (`ID_Ocio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk31` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `pubs`
--
ALTER TABLE `pubs`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`ID_Pub`) REFERENCES `ocios` (`ID_Ocio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `quedadas`
--
ALTER TABLE `quedadas`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`ID_Quedada`) REFERENCES `ocios` (`ID_Ocio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `residencias`
--
ALTER TABLE `residencias`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`ID_Resi`) REFERENCES `ocios` (`ID_Ocio`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
