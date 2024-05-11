-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 11 mai 2024 à 12:23
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `doclive`
--

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id` int(11) NOT NULL,
  `nomutilisateur` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `nomutilisateur`, `nom`, `prenom`, `email`, `motdepasse`) VALUES
(2, 'fabiola', 'fabuola', 'acodji', 'fabiolaacodji4@gmail.com', '$2y$10$E0AEorlAyEX.vZbw.SoVkemhCfpyxd8vh.atuYkluBQCnzr.Jcggm'),
(3, 'fabiola', 'fabuola', 'acodji', 'fabiolaacodji4@gmail.com', '$2y$10$25NCq0.tztOVykpdb/Mxw.COZ8KYPfP0moMf/qt23dMZ4beqr8fXi'),
(4, 'fabiola', 'fabuola', 'acodji', 'fabiolaacodji4@gmail.com', '$2y$10$EswejLx1OlFqXDQOujJGyOgRh77WL5nE50b9GpswaWxKD3TNFTzgm'),
(5, 'fabiola', 'fabuola', 'acodji', 'fabiolaacodji4@gmail.com', '$2y$10$fkP5zyJwTj4zzNFHVbZHyu3CUvvg9zSAbDoN0kaUR3QKKyXlDl0e2'),
(6, 'fabiola', 'fabioola', 'acodji', 'fabiolaacodji4@gmail.com', '$2y$10$EvCXBBDpAuXIpSYRKSAII.cN2Y..L/JBk2D8tso4TgJHpU/ixAIs.'),
(7, 'fabiola', 'fabioola', 'acodji', 'fabiolaacodji4@gmail.com', '$2y$10$yMlIvziwaDQ1WvieR0FrAuLI52PLcs60lKOAziDaPy3W2CoqELXb.'),
(8, 'fabiola', 'fabioola', 'acodji', 'fabiolaacodji4@gmail.com', '$2y$10$jd.YNjdinNt3HHdyXonjWu/raCb/G4gJBxqFsRDmY3FJeP9MXaxsq'),
(9, 'fabiola', 'fabioola', 'acodji', 'fabiolaacodji4@gmail.com', '$2y$10$PSo.5RxSx1J8Jg.LqNvXsuS2t4rtjUPQUvmD5ZPjHyJaVTJkKNiSm'),
(10, 'fabiola', 'fabioola', 'acodji', 'fabiolaacodji4@gmail.com', '$2y$10$lvEd8gcCxtJ514VpuKfKZO.w1fqKhG2/67B6QOvBzqE27K3dlCRb6'),
(11, 'fabiola', 'fabioola', 'acodji', 'fabiolaacodji4@gmail.com', '$2y$10$1ycHYW0hxdvptuX0bTaQVu4PAOQvEhsNnZ1zZ7CBSpPb0v8n14xtu'),
(12, 'fabiola', 'fabioola', 'acodji', 'fabiolaacodji4@gmail.com', '$2y$10$hKj5MP1YZK.fQZLwdcjETeHx7/SPZhBUoZuQCBOJ0xD88otUq1EEG'),
(13, '', 'fabioola', 'acodji', 'fabiolaacodji4@gmail.com', '$2y$10$aSYmcDDP9j/kUJ2BOZt2VegiZltNY.YM.0477UxDyaC83sHHPSy7u'),
(14, '', 'fabioola', 'acodji', 'fabiolaacodji4@gmail.com', '$2y$10$lSPcuuzPha7pFQ3fYgJ0SuUQf/lM/LV5HkcXlebgUZ9JkOhpvvzl6'),
(15, '', 'h,gchgh,', 'hcv,bhj,v', 'fabiola@gmail.com', '$2y$10$JpnAdE8rGdlZ6Aawijzx6eDinqejRjPuGB0u1beDNy35x/xseztkm'),
(16, '', 'h,gchgh,', 'hcv,bhj,v', 'fabiola@gmail.com', '$2y$10$OMO6p9GFxG5WpvPVF08hOelj6.dZjswp/QjXr4292lhyzG.EqASCe'),
(17, '', 'h,gchgh,', 'hcv,bhj,v', 'fabiola@gmail.com', '$2y$10$PwKgqwNkdM6RjWu7bRidoujghB2PjAznnIRumgA5xoxXUdnRulQbG'),
(18, '', 'Eurin12345', 'NEXA12', 'e@gmail.com', '$2y$10$0HlKilEtKR7vEbbURIz/euqF1qepPxzbt74.b8Z3WVz5gE7lzp.q.'),
(19, '', 'Eurin12345', 'NEXA12', 'fabiolaacodji4@gmail.com', '$2y$10$ATXswQY3hIi3aB3Av3oV9unmb9ViktiXxPJriYPDWHcTMk.ReNB3m');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
