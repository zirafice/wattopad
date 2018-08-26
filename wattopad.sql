-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 26. srp 2018, 13:36
-- Verze serveru: 10.1.32-MariaDB
-- Verze PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `wattopad`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `anime`
--

CREATE TABLE `anime` (
  `anime` varchar(155) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `beletrie`
--

CREATE TABLE `beletrie` (
  `beletrie_ID` int(11) NOT NULL,
  `nazev` varchar(155) COLLATE utf8_czech_ci NOT NULL,
  `autor` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `dokonceno` tinyint(1) NOT NULL,
  `jazyk` enum('Čeština','Slovenština','Jiný','') COLLATE utf8_czech_ci NOT NULL,
  `popis` text COLLATE utf8_czech_ci,
  `zanry` set('Akční','ChickLit','Detektivka','Dětská literatura','Dobrodružný','Fantasy','Historický','Horor','Humor','Katastrofický','Krimi','Obecná fikce','Paranormal','Postapokalyptický','Romantický','Sci-fi','Thriller','Upíři','Válečný','Vlkodlaci') COLLATE utf8_czech_ci NOT NULL,
  `keywords` text COLLATE utf8_czech_ci,
  `spolery` text COLLATE utf8_czech_ci,
  `romantika` int(11) NOT NULL,
  `pocet_kap` int(11) DEFAULT NULL,
  `delka_kap` int(11) DEFAULT NULL,
  `delka_pribehu` enum('Krátký (do 5K slov)','Stření (5K-30K slov)','Dlouhý (nad 30K slov)','Soubor povídek') COLLATE utf8_czech_ci NOT NULL,
  `mature` enum('Žádný','13+ (vyšší výskyt vulgarismů)','15+ (vyšší výskyt násilí)','18+ (erotika)','Extrémní (znásilnění nebo podrobně popsané krvavé scény)') COLLATE utf8_czech_ci NOT NULL,
  `forma` enum('Er','Ich','Jiná','') COLLATE utf8_czech_ci NOT NULL,
  `lgbt` tinyint(1) NOT NULL,
  `lgbt_typ` set('Girl x girl','Boy x boy','Trans','Asexual') COLLATE utf8_czech_ci DEFAULT NULL,
  `lgbt_vyznam` enum('Hlavní','Vedlejší','','') COLLATE utf8_czech_ci DEFAULT NULL,
  `vic_hl_postav` tinyint(1) NOT NULL,
  `vek` enum('Dítě (<12 let)','Puberťák (12-15 let)','Teenager (16-19 let)','Dospělý (20+ let)') COLLATE utf8_czech_ci DEFAULT NULL,
  `pohlavi` enum('Muž','Žena','Jiné/nemá','') COLLATE utf8_czech_ci DEFAULT NULL,
  `rate_up` int(11) NOT NULL DEFAULT '0',
  `rate_down` int(11) NOT NULL DEFAULT '0',
  `ratio` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `fandomy`
--

CREATE TABLE `fandomy` (
  `fandom` varchar(155) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `fanfikce`
--

CREATE TABLE `fanfikce` (
  `fanfikce_ID` int(11) NOT NULL,
  `nazev` varchar(155) COLLATE utf8_czech_ci NOT NULL,
  `autor` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `dokonceno` tinyint(1) NOT NULL,
  `jazyk` enum('Čeština','Slovenština','Jiný','') COLLATE utf8_czech_ci NOT NULL,
  `popis` text COLLATE utf8_czech_ci,
  `typFF` enum('Fandomy','Osobnosti','Anime','') COLLATE utf8_czech_ci NOT NULL,
  `crossover` enum('Ne','Crossover v rámci typu','Crossover více typů','') COLLATE utf8_czech_ci NOT NULL,
  `fandom` varchar(155) COLLATE utf8_czech_ci DEFAULT NULL,
  `osobnost` varchar(155) COLLATE utf8_czech_ci DEFAULT NULL,
  `anime` varchar(155) COLLATE utf8_czech_ci DEFAULT NULL,
  `keywords` text COLLATE utf8_czech_ci,
  `spolery` text COLLATE utf8_czech_ci,
  `romantika` int(11) NOT NULL,
  `pocet_kap` int(11) DEFAULT NULL,
  `delka_kap` int(11) DEFAULT NULL,
  `delka_pribehu` enum('Krátký (do 5K slov)','Stření (5K-30K slov)','Dlouhý (nad 30K slov)','Soubor povídek') COLLATE utf8_czech_ci NOT NULL,
  `mature` enum('Žádný','13+ (vyšší výskyt vulgarismů)','15+ (vyšší výskyt násilí)','18+ (erotika)','Extrémní (znásilnění nebo podrobně popsané krvavé scény)') COLLATE utf8_czech_ci NOT NULL,
  `forma` enum('Er','Ich','Jiná','') COLLATE utf8_czech_ci NOT NULL,
  `lgbt` tinyint(1) NOT NULL,
  `lgbt_typ` set('Girl x girl','Boy x boy','Trans','Asexual') COLLATE utf8_czech_ci DEFAULT NULL,
  `lgbt_vyznam` enum('Hlavní','Vedlejší','','') COLLATE utf8_czech_ci DEFAULT NULL,
  `AU` tinyint(1) NOT NULL,
  `OC` enum('Všechny nebo většina postav OC','OC především hlavní postava','Bez OC nebo OC jen ve vedlejších rolích','') COLLATE utf8_czech_ci NOT NULL,
  `ship` set('Ne','Kánonický ship','Nekánonický ship','Ship OC s kánonickou postavou') COLLATE utf8_czech_ci NOT NULL,
  `rate_up` int(11) NOT NULL DEFAULT '0',
  `rate_down` int(11) NOT NULL DEFAULT '0',
  `ratio` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `osobnosti`
--

CREATE TABLE `osobnosti` (
  `Osobnost` varchar(155) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `uživatelé`
--

CREATE TABLE `uživatelé` (
  `uzivatele_id` int(11) NOT NULL,
  `jmeno` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `heslo` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `beletrie`
--
ALTER TABLE `beletrie`
  ADD PRIMARY KEY (`beletrie_ID`);

--
-- Klíče pro tabulku `fanfikce`
--
ALTER TABLE `fanfikce`
  ADD PRIMARY KEY (`fanfikce_ID`);

--
-- Klíče pro tabulku `uživatelé`
--
ALTER TABLE `uživatelé`
  ADD PRIMARY KEY (`uzivatele_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `beletrie`
--
ALTER TABLE `beletrie`
  MODIFY `beletrie_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `fanfikce`
--
ALTER TABLE `fanfikce`
  MODIFY `fanfikce_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `uživatelé`
--
ALTER TABLE `uživatelé`
  MODIFY `uzivatele_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
