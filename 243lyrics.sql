-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 15 Juin 2018 à 02:46
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `243lyrics`
--

-- --------------------------------------------------------

--
-- Structure de la table `data_albums`
--

CREATE TABLE `data_albums` (
  `id_alb` int(11) NOT NULL,
  `nom_album` varchar(255) NOT NULL,
  `nb_morceau` int(11) NOT NULL,
  `date_sortie` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `nb_apparitions` int(11) NOT NULL,
  `nb_cliques` int(11) NOT NULL,
  `date_ajout` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_art` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `data_audio`
--

CREATE TABLE `data_audio` (
  `id_aud` int(11) NOT NULL,
  `nom_audio` varchar(255) NOT NULL,
  `id_mus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `data_categories`
--

CREATE TABLE `data_categories` (
  `id_cat` int(11) NOT NULL,
  `nom_cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `data_categories`
--

INSERT INTO `data_categories` (`id_cat`, `nom_cat`) VALUES
(1, 'RNB'),
(2, 'TRAP');

-- --------------------------------------------------------

--
-- Structure de la table `data_images`
--

CREATE TABLE `data_images` (
  `id_img` int(11) NOT NULL,
  `nom_img` varchar(255) NOT NULL,
  `id_alb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `data_images_musiques`
--

CREATE TABLE `data_images_musiques` (
  `id_img_mus` int(11) NOT NULL,
  `nom_img` varchar(255) NOT NULL,
  `id_mus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `data_musiques`
--

CREATE TABLE `data_musiques` (
  `id_mus` int(11) NOT NULL,
  `id_alb` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `duree` varchar(255) NOT NULL,
  `paroles` text,
  `maison_prod` varchar(255) NOT NULL,
  `date_ajout` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_art` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `data_users`
--

CREATE TABLE `data_users` (
  `id_art` int(11) NOT NULL,
  `nom_artiste` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` text NOT NULL,
  `ip_art` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `numero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `data_albums`
--
ALTER TABLE `data_albums`
  ADD PRIMARY KEY (`id_alb`);

--
-- Index pour la table `data_audio`
--
ALTER TABLE `data_audio`
  ADD PRIMARY KEY (`id_aud`);

--
-- Index pour la table `data_categories`
--
ALTER TABLE `data_categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `data_images`
--
ALTER TABLE `data_images`
  ADD PRIMARY KEY (`id_img`);

--
-- Index pour la table `data_images_musiques`
--
ALTER TABLE `data_images_musiques`
  ADD PRIMARY KEY (`id_img_mus`);

--
-- Index pour la table `data_musiques`
--
ALTER TABLE `data_musiques`
  ADD PRIMARY KEY (`id_mus`);

--
-- Index pour la table `data_users`
--
ALTER TABLE `data_users`
  ADD PRIMARY KEY (`id_art`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `data_albums`
--
ALTER TABLE `data_albums`
  MODIFY `id_alb` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `data_audio`
--
ALTER TABLE `data_audio`
  MODIFY `id_aud` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `data_categories`
--
ALTER TABLE `data_categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `data_images`
--
ALTER TABLE `data_images`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `data_images_musiques`
--
ALTER TABLE `data_images_musiques`
  MODIFY `id_img_mus` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `data_musiques`
--
ALTER TABLE `data_musiques`
  MODIFY `id_mus` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `data_users`
--
ALTER TABLE `data_users`
  MODIFY `id_art` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
