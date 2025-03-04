-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2025 at 11:20 PM
-- Wersja serwera: 11.4.3-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catalogue`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `accounts`
--

CREATE TABLE `accounts` (
  `IdKlienta` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `template`
--

CREATE TABLE `template` (
  `IdTemplate` int(11) NOT NULL,
  `TemplateHtml` text NOT NULL,
  `TemplateStyle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`IdTemplate`, `TemplateHtml`, `TemplateStyle`) VALUES
(1, '<header>\r\n        <h1>Nazwa katalogu</p>\r\n    </header>\r\n\r\n    <main>\r\n        <section class=\"content\">\r\n            <h2>Twoje pliki/linki</h2>\r\n            <p>1. Algebra</p>\r\n            <p>2. Geometria</p>\r\n<p>3. Statystyka</p>\r\n<p>4. Matematyka dyskretna</p>\r\n<p>5. Liczby zespolone</p>\r\n<p>6. Planimetria</p>\r\n<p>7. Matematyka finansowa</p>\r\n            \r\n    </main>\r\n\r\n    <footer>\r\n        <p>&copy; 2025 Catalogue schemat | Wszystkie prawa zastrzeżone</p>\r\n    </footer>', '/* Resetowanie domyślnych stylów */\r\n* {\r\n    margin: 0;\r\n    padding: 0;\r\n    box-sizing: border-box;\r\n    font-family: \"Arial\", sans-serif;\r\n}\r\n\r\nbody {\r\n    background: #f5f5f5;\r\n    color: #333;\r\n    text-align: center;\r\n    padding: 20px;\r\n}\r\n\r\nheader {\r\n    background: #007bff;\r\n    color: white;\r\n    padding: 40px 20px;\r\n    border-radius: 10px;\r\n}\r\n\r\nheader h1 {\r\n    font-size: 2em;\r\n}\r\n\r\nmain {\r\n    margin: 20px auto;\r\n    max-width: 600px;\r\nheight:50vh;\r\n}\r\n\r\n.content {\r\n    background: white;\r\n    padding: 20px;\r\n    border-radius: 10px;\r\n    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);\r\n}\r\n\r\nh2 {\r\n    color: #007bff;\r\n    margin-bottom: 10px;\r\n}\r\n\r\n.btn {\r\n    display: inline-block;\r\n    margin-top: 15px;\r\n    padding: 10px 20px;\r\n    background: #007bff;\r\n    color: white;\r\n    text-decoration: none;\r\n    border-radius: 5px;\r\n    transition: 0.3s;\r\n}\r\n\r\n.btn:hover {\r\n    background: #0056b3;\r\n}\r\n\r\nfooter {\r\n    margin-top: 30px;\r\n    font-size: 0.9em;\r\n    color: #666;\r\n}\r\n'),
(2, '<header>\r\n        <h1>Nazwa katalogu</p>\r\n    </header>\r\n\r\n    <main>\r\n        <section class=\"content\">\r\n            <h2>Twoje pliki/linki</h2>\r\n            <p>1. Algebra</p>\r\n            <p>1. Geometria</p>\r\n<p>1. Statystyka</p>\r\n            \r\n    </main>\r\n\r\n    <footer>\r\n        <p>&copy; 2025 Catalogue schemat | Wszystkie prawa zastrzeżone</p>\r\n    </footer>', '/* Resetowanie domyślnych stylów */\r\n* {\r\n    margin: 0;\r\n    padding: 0;\r\n    box-sizing: border-box;\r\n    font-family: \"Arial\", sans-serif;\r\n}\r\n\r\nbody {\r\n    background: #fafafa;  /* Jasny odcień szarości */\r\n    color: #333;  /* Ciemny szary tekst */\r\n    text-align: center;\r\n    padding: 20px;\r\n}\r\n\r\nheader {\r\n    background: #8e44ad;  /* Fioletowy gradient */\r\n    color: white;\r\n    padding: 40px 20px;\r\n    border-radius: 10px;\r\n}\r\n\r\nheader h1 {\r\n    font-size: 2em;\r\n}\r\n\r\nmain {\r\n    margin: 20px auto;\r\n    max-width: 600px;\r\n}\r\n\r\n.content {\r\n    background: #ffffff;  /* Biały background */\r\n    padding: 20px;\r\n    border-radius: 10px;\r\n    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);\r\n}\r\n\r\nh2 {\r\n    color: #8e44ad;  /* Pasujący fioletowy do nagłówków */\r\n    margin-bottom: 10px;\r\n}\r\n\r\n.btn {\r\n    display: inline-block;\r\n    margin-top: 15px;\r\n    padding: 10px 20px;\r\n    background: #3498db;  /* Niebieski */\r\n    color: white;\r\n    text-decoration: none;\r\n    border-radius: 5px;\r\n    transition: 0.3s;\r\n}\r\n\r\n.btn:hover {\r\n    background: #2980b9;  /* Ciemniejszy niebieski po najechaniu */\r\n}\r\n\r\nfooter {\r\n    margin-top: 30px;\r\n    font-size: 0.9em;\r\n    color: #7f8c8d;  /* Stonowany szary */\r\n}\r\n'),
(3, '<header>\r\n        <h1>Nazwa katalogu</p>\r\n    </header>\r\n\r\n    <main>\r\n        <section class=\"content\">\r\n            <h2>Twoje pliki/linki</h2>\r\n            <p>1. Algebra</p>\r\n            <p>1. Geometria</p>\r\n<p>1. Statystyka</p>\r\n            \r\n    </main>\r\n\r\n    <footer>\r\n        <p>&copy; 2025 Catalogue schemat | Wszystkie prawa zastrzeżone</p>\r\n    </footer>', '/* Resetowanie domyślnych stylów */\r\n* {\r\n    margin: 0;\r\n    padding: 0;\r\n    box-sizing: border-box;\r\n    font-family: \"Arial\", sans-serif;\r\n}\r\n\r\nbody {\r\n    background: #404a42;  /* Ciemne tło */\r\n    color: #e0e0e0;  /* Jasny tekst, żeby dobrze kontrastował */\r\n    text-align: center;\r\n    padding: 20px;\r\n}\r\n\r\nheader {\r\n    background: #1f1f1f;  /* Ciemny szary dla nagłówka */\r\n    color: #ffffff;  /* Biały tekst */\r\n    padding: 40px 20px;\r\n    border-radius: 10px;\r\n    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.8);  /* Mocniejszy cień dla efektu */\r\n}\r\n\r\nheader h1 {\r\n    font-size: 2em;\r\n}\r\n\r\nmain {\r\n    margin: 20px auto;\r\n    max-width: 600px;\r\n}\r\n\r\n.content {\r\n    background: #232323;  /* Bardziej stonowany ciemny szary */\r\n    padding: 20px;\r\n    border-radius: 10px;\r\n    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);  /* Delikatny cień */\r\n}\r\n\r\nh2 {\r\n    color: #d32f2f;  /* Czerwony, dla wyróżnienia */\r\n    margin-bottom: 10px;\r\n}\r\n\r\n.btn {\r\n    display: inline-block;\r\n    margin-top: 15px;\r\n    padding: 10px 20px;\r\n    background: #3f51b5;  /* Niebieski przycisk */\r\n    color: white;\r\n    text-decoration: none;\r\n    border-radius: 5px;\r\n    transition: 0.3s;\r\n}\r\n\r\n.btn:hover {\r\n    background: #303f9f;  /* Ciemniejszy niebieski po najechaniu */\r\n}\r\n\r\nfooter {\r\n    margin-top: 30px;\r\n    font-size: 0.9em;\r\n    color: #b0b0b0;  /* Jasnoszary tekst w stopce */\r\n}\r\n');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`IdKlienta`);

--
-- Indeksy dla tabeli `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`IdTemplate`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `IdKlienta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `IdTemplate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
