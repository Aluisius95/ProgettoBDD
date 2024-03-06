-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 28, 2023 alle 18:27
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progettonoto`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `Titolo` varchar(30) NOT NULL,
  `id_autore` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL,
  `id_stile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `blog`
--

INSERT INTO `blog` (`id`, `Titolo`, `id_autore`, `id_tema`, `id_stile`) VALUES
(10, 'Alu in cucina', 43, 1, 1),
(11, 'Tolkien', 45, 6, 1),
(12, 'Folk Norvegese', 43, 4, 2),
(18, 'League of Legends', 51, 2, 4),
(19, 'Il fantasy', 52, 6, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `commento`
--

CREATE TABLE `commento` (
  `id` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `testo` varchar(250) NOT NULL,
  `inserimento` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `commento`
--

INSERT INTO `commento` (`id`, `id_utente`, `id_post`, `testo`, `inserimento`) VALUES
(3, 43, 17, 'Adoro questa saga! È forse tra le mie preferite.. i film li avrò visti centinaia di volte, ma i libri ancora non sono riuscito a leggerli per bene! Tolkien aveva una scrittura molto articolata T_T', '2023-01-26 12:09:18'),
(4, 48, 17, 'È vero, è stupenda come saga, concordo con @Aluisius95!!', '2023-01-26 13:07:14'),
(10, 48, 26, 'Waaaaa, dall\'aspetto sembra buonissima!! La devo provare', '2023-01-28 16:14:56'),
(11, 52, 19, 'Un libro bellissimo! Peccato quando hanno fatto il film e lo hanno rovinato :c', '2023-01-28 18:06:30'),
(12, 43, 34, 'Un grande, ho letto due dei suoi libri! Molto belli e anche divertenti ahahah', '2023-01-28 18:13:39'),
(13, 43, 33, 'Il mio ruolo principale! È davvero difficile come ruolo, ma è troppo bello!', '2023-01-28 18:16:15');

-- --------------------------------------------------------

--
-- Struttura della tabella `co_autore`
--

CREATE TABLE `co_autore` (
  `id_utente` int(11) NOT NULL,
  `id_blog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `elementi`
--

CREATE TABLE `elementi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_blog` int(11) NOT NULL,
  `titolo` varchar(30) NOT NULL,
  `testo` text NOT NULL,
  `data_creazione` datetime NOT NULL,
  `sottotema` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `premium` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `elementi`
--

INSERT INTO `elementi` (`id`, `id_user`, `id_blog`, `titolo`, `testo`, `data_creazione`, `sottotema`, `img`, `premium`) VALUES
(17, 45, 11, 'Il signore degli anelli', 'Il Signore degli Anelli è una trilogia basata sull\'universo immaginario di Arda, inventato dallo scrittore inglese J.R.R. Tolkien intorno al 1950.\r\n\r\nIl primo libro, chiamato La Compagnia dell\'Anello ....\r\nIl secondo libro, chiamato Le due Torri ....\r\nIl terzo libro, chiamato Il Ritorno del Re ....', '2023-01-25 21:51:20', 18, '1020211.jpeg', 0),
(19, 45, 11, 'Lo hobbit', 'Lo hobbit è il secondo libro Della storia principale dell\'universo di Arda.\r\n\r\nScritto originariamente per i suoi figli, divenne un cult del fantasy etc etc', '2023-01-25 23:08:55', 18, '', 1),
(26, 43, 10, 'La focaccia', 'Innanzitutto preparare 48h prima l\'impasto per pizza (o comprarlo già fatto).\nDopo la lievitazione, stendere per bene l\'impasto facendo un cerchio.\nPreparare il condimento da mettere sopra lo strato, chiudere per bene su sé stesso e spennellare la superficie con il tuorlo di un uovo. \nMettere nel forno a 160° e controllare la cottura ogni tanto. Allego la foto della mia ultima creatura!', '2023-01-26 14:42:13', 2, 'focaccia.jpeg', 1),
(32, 51, 18, 'I ruoli di LoL', 'League of Legends è un gioco di tipo 5v5: esistono 3 corsie e 5 ruoli differenti. Il Top gioca nella corsia superiore o corsia del Barone. Il Mid gioca nella corsia centrale. Nella corsia inferiore si trovano l\'Attack Damage Carry e il Support. Infine il Jungler gioca, appunto, in giungla e dovrà dare supporto a tutti i suoi alleati!', '2023-01-28 17:45:43', 7, '', 0),
(33, 51, 18, 'L\'ADC', 'È forse tra i ruoli più complicati, soprattutto perché si deve saper gestire bene il last hit dei minion, il kiting e il positioning.', '2023-01-28 18:00:15', 7, 'lol.jpeg', 0),
(34, 52, 19, 'Mitnick', 'Kevin David Mitnick, detto Condor (Los Angeles, 6 agosto 1963), è un programmatore, phreaker, cracker e imprenditore statunitense, che si è distinto per avere introdotto la tecnica dell\'IP spoofing e per le sue notevoli capacità nell\'ingegneria sociale, avendo eseguito alcune tra le più ardite incursioni nei computer del governo degli Stati Uniti. Catturato, è stato condannato a svariati anni di carcere. Il suo arresto e il suo trattamento in prigione hanno sollevato ampie controversie.', '2023-01-28 18:10:38', 19, 'mitnick.jpeg', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `sottotema`
--

CREATE TABLE `sottotema` (
  `id_tema` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `sottogenere` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `sottotema`
--

INSERT INTO `sottotema` (`id_tema`, `id`, `sottogenere`) VALUES
(1, 1, 'Primi'),
(1, 2, 'Secondi'),
(2, 3, 'Calcio'),
(2, 4, 'Pallavolo'),
(1, 5, 'Dolci'),
(1, 6, 'Regionale'),
(2, 7, 'E-Sports'),
(2, 8, 'Basket'),
(3, 9, 'Telefonia'),
(3, 10, 'Computer'),
(3, 11, 'Tablet'),
(4, 12, 'Rock'),
(4, 13, 'Folk'),
(4, 14, 'Pop'),
(5, 15, 'Serietv'),
(5, 16, 'Film'),
(5, 17, 'Fiction'),
(6, 18, 'Fantasy'),
(6, 19, 'Storici'),
(6, 20, 'Romanzi'),
(7, 21, 'Fisica'),
(7, 22, 'Astronomia'),
(7, 23, 'Informatica');

-- --------------------------------------------------------

--
-- Struttura della tabella `stile`
--

CREATE TABLE `stile` (
  `id` int(11) NOT NULL,
  `nome_stile` varchar(20) NOT NULL,
  `tipo_font` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `stile`
--

INSERT INTO `stile` (`id`, `nome_stile`, `tipo_font`) VALUES
(1, 'Classico', 'Times New Roman'),
(2, 'Cambria', 'Cambria'),
(3, 'Sans - Serif', 'Franklin Gothic Medium'),
(4, 'Ereditato', 'Unbounded');

-- --------------------------------------------------------

--
-- Struttura della tabella `tema`
--

CREATE TABLE `tema` (
  `id` int(11) NOT NULL,
  `genere` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `tema`
--

INSERT INTO `tema` (`id`, `genere`) VALUES
(1, 'Cucina'),
(2, 'Sport'),
(3, 'Elettronica'),
(4, 'Musica'),
(5, 'Cinema'),
(6, 'Libri'),
(7, 'Scienza');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `imgprof` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'default.png',
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `password` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `data_di_nascita` date NOT NULL,
  `biografia` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `numero_di_telefono` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `premium` tinyint(1) NOT NULL DEFAULT 0,
  `carta_di_credito` varchar(16) NOT NULL,
  `cvc` varchar(3) NOT NULL,
  `ccmonth` varchar(10) NOT NULL,
  `ccyear` varchar(4) NOT NULL,
  `ccname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id`, `username`, `imgprof`, `nome`, `cognome`, `password`, `data_di_nascita`, `biografia`, `numero_di_telefono`, `email`, `premium`, `carta_di_credito`, `cvc`, `ccmonth`, `ccyear`, `ccname`) VALUES
(43, 'Aluisius95', 'mestesso.jpg', 'Luigi', 'Noto', '69c30cb7af91ed14dbc1b89818c472db', '1995-10-06', 'Semplice studente universitario di 27 anni con tre passioni principali: la musica, il cibo...e i videogiochi!', '3331234567', 'ciao@ciao.it', 0, '', '', '', '', ''),
(45, 'edoardosampoli', 'edo.jpg', 'Edoardo', 'Sampoli', 'd0dfa8c27c134a522c2664936942bc8d', '2002-06-16', 'Studente di psicologia. Appassionato di lettura e tisane!', '1234567890', 'edo.samp@pinki.com', 1, '5263125478569856', '325', 'january', '2026', 'Edoardo Sampoli'),
(47, 'Ross_1998', 'finale.jpg', 'Rosa', 'D\'Apice', '53fa88cc01d636e589054b37dff4551c', '1998-09-09', 'Sono una studentessa laureata in Germanistica, bla bla bla, nerdo, faccio cosplay, bla bla bla ddhfdxhxfh hffhxfxhxfhf', '3121235469', 'r.apice@test.it', 1, '1235469852136548', '235', 'september', '2030', 'Rosa D\'Apice'),
(48, 'Doomsday98', 'default.png', 'Luigi', 'Raia', '7ac28ce4939a730aee0e805c0ab0379d', '1998-01-02', 'Sono un ragazzo fortunato perché mi hanno regalato un sogno. bla bla', '3301254698', 'l.raia@hotmail.it', 0, '', '', '', '', ''),
(49, 'mongobolide ', 'default.png', 'carlo ', 'de leonardis ', 'e69787fdbc694f6fcfccf8e07627514d', '2003-02-11', NULL, '3427706233', 'gxb8816@gmail.com', 0, '', '', '', '', ''),
(50, 'No', 'default.png', 'Povero', 'Illuso', 'c805dcd13cce080bbd3ab2dba63bd874', '1999-01-01', NULL, '3335555175', 'morteinsucco@gmail.com', 1, '1234567890912345', '123', 'january', '2023', 'qwert ertyu'),
(51, 'GiFi18', 'persone-fatte-dal-pc8.jpg', 'Gianfranco', 'Filippeschi', 'ca2d8caa05a84d2a53554139ff49236a', '1992-01-12', NULL, '3212201542', 'test@test.it', 0, '', '', '', '', ''),
(52, 'FDeli', 'profilo.jpg', 'Francesca', 'De La Gherardesca', 'bf413720dcb848d35ead01c6a5bf4db8', '2000-02-15', 'Appassionata di musica e libri storici', '3255621548', 'some@thing.it', 1, '5246325142548752', '125', 'august', '2031', 'Francesca De La Gherardesca');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Titolo` (`Titolo`,`id_autore`),
  ADD KEY `aut_fk` (`id_autore`),
  ADD KEY `theme_fk` (`id_tema`),
  ADD KEY `stile_fk` (`id_stile`);

--
-- Indici per le tabelle `commento`
--
ALTER TABLE `commento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usrcom_fk` (`id_utente`),
  ADD KEY `postcom_fk` (`id_post`);

--
-- Indici per le tabelle `co_autore`
--
ALTER TABLE `co_autore`
  ADD PRIMARY KEY (`id_utente`,`id_blog`),
  ADD KEY `blog_fk` (`id_blog`);

--
-- Indici per le tabelle `elementi`
--
ALTER TABLE `elementi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_blog` (`id_blog`,`titolo`),
  ADD KEY `subt_fk` (`sottotema`),
  ADD KEY `userp_fk` (`id_user`);

--
-- Indici per le tabelle `sottotema`
--
ALTER TABLE `sottotema`
  ADD PRIMARY KEY (`id`,`id_tema`),
  ADD KEY `tema_fk` (`id_tema`);

--
-- Indici per le tabelle `stile`
--
ALTER TABLE `stile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome_stile` (`nome_stile`);

--
-- Indici per le tabelle `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT per la tabella `commento`
--
ALTER TABLE `commento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `elementi`
--
ALTER TABLE `elementi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT per la tabella `sottotema`
--
ALTER TABLE `sottotema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT per la tabella `stile`
--
ALTER TABLE `stile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `tema`
--
ALTER TABLE `tema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `aut_fk` FOREIGN KEY (`id_autore`) REFERENCES `utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stile_fk` FOREIGN KEY (`id_stile`) REFERENCES `stile` (`id`),
  ADD CONSTRAINT `theme_fk` FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id`);

--
-- Limiti per la tabella `commento`
--
ALTER TABLE `commento`
  ADD CONSTRAINT `postcom_fk` FOREIGN KEY (`id_post`) REFERENCES `elementi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usrcom_fk` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `co_autore`
--
ALTER TABLE `co_autore`
  ADD CONSTRAINT `blog_fk` FOREIGN KEY (`id_blog`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coaut_fk` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `elementi`
--
ALTER TABLE `elementi`
  ADD CONSTRAINT `blogp_fk` FOREIGN KEY (`id_blog`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subt_fk` FOREIGN KEY (`sottotema`) REFERENCES `sottotema` (`id`),
  ADD CONSTRAINT `userp_fk` FOREIGN KEY (`id_user`) REFERENCES `utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `sottotema`
--
ALTER TABLE `sottotema`
  ADD CONSTRAINT `tema_fk` FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
