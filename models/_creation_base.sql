--------------------------------------------------------------------------------------------------------
-- Script de création de la base de données php_store
--------------------------------------------------------------------------------------------------------
-- Creation de la base de données 
CREATE DATABASE IF NOT EXISTS `php_store`;
USE `php_store`;

--------------------------------------------------------------------------------------------------------
-- Table user
--------------------------------------------------------------------------------------------------------
-- Creation de la table
CREATE TABLE IF NOT EXISTS `user` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `full_name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `role` ENUM('admin', 'staff', 'user') NOT NULL DEFAULT 'user',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Suppression des données existantes dans la table 
DELETE FROM `user`;

-- Insertion de données dans la table 
INSERT INTO `user` (`email`, `full_name`, `password`,`role`) VALUES 
('admin@email.com', 'Admin', 'admin','admin'),
('jondoe@email.com', 'Jon Doe', 'Digital123=','staff'),
('janedoe@email.com', 'Jane Doe', 'Digital123=','staff'),
('mathieunebra@email.com', 'Mathieu Nebra', 'Digital123=','user'), 
('mickaelandrieu@email.com', 'Mickaël Andrieu', 'Digital123=','user'),
('laurenecastor@email.com', 'Laurène Castor', 'Digital123=', 'user'),
('mamadousala@email.com', 'Mamadou Sala', 'Digital123=','user'),
('fantadiallo@email.com', 'Fanta Diallo', 'Digital123=', 'user');

--------------------------------------------------------------------------------------------------------
-- Table profile
--------------------------------------------------------------------------------------------------------
-- Creation de la table
CREATE TABLE IF NOT EXISTS `profile` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `pseudo` VARCHAR(255) NOT NULL,
    `address` VARCHAR(255) NOT NULL,
    `postcode` VARCHAR(20) NOT NULL,
    `city` VARCHAR(255) NOT NULL,
    `dob` DATE NOT NULL,
    `image` VARCHAR(255),
    `user_id` INT(11) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `user`(`id`),
    UNIQUE (`pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Suppression des données existantes dans la table 
DELETE FROM `profile`;

-- Insertion de données dans la table 
INSERT INTO `profile` (`user_id`, `pseudo`, `address`, `postcode`, `city`, `dob`) VALUES
(1, 'admin', '1 rue de la Paix', '1000', 'Bruxelles', '1980-01-01'),
(2, 'jodo', '2 Liberty road', '69H01', 'New York', '2015-05-05'),
(3, 'jado', '3 Republic road', '13001', 'London', '1990-10-10'),
(4, 'mane', '4 place de la Concorde', '75001', 'Paris', '1995-03-15'),
(5, 'mian', '5 allée de la Victoire', '44001', 'Nantes', '2000-08-20'),
(6, 'laca', '6 chemin de la Liberté', '59001', 'Liege', '2005-12-25'),
(7, 'masa', '7 rue des sages', '75002', 'Dakar', '2010-07-30'),
(8, 'fadi', '8 rue des ancetres', '13002', 'Bamako', '1985-11-05');

--------------------------------------------------------------------------------------------------------
-- Table contact
--------------------------------------------------------------------------------------------------------
-- Creation de la table contact
CREATE TABLE IF NOT EXISTS `contact` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL UNIQUE,
    `message` TEXT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Suppression des données existantes dans la table contact
DELETE FROM `contact`;

-- Insertion de données dans la table contact 
INSERT INTO `contact` (`name`, `email`, `message`) VALUES
('Mickaël Andrieu', 'mickaelandrieu@email', 'Message de contact de Mickaël Andrieu.'), 
('Laurène Castor', 'laurenecastor@email.com', 'Message de contact de Laurène Castor.'),
('Mamadou Sala', 'mamadousala@email.com', 'Message de contact de Mamadou Sala.');

--------------------------------------------------------------------------------------------------------
-- Table category
------------------------------------------ --------------------------------------------------------------
-- Creation de la table category
CREATE TABLE IF NOT EXISTS `category` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL, 
    `description` TEXT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Suppression des données existantes dans la table category
DELETE FROM `category`;

-- Insertion de données dans la table category
INSERT INTO `category` (`name`, `description`) VALUES
('informatique', 'Produits informatiques et high-tech'),
('livre', 'Livres de tous genres et pour tous les âges'),
('hi-fi', 'Matériel audio et vidéo de qualité');

--------------------------------------------------------------------------------------------------------
-- Table product
--------------------------------------------------------------------------------------------------------
-- Creation de la table product
CREATE TABLE IF NOT EXISTS `product` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `description` TEXT NOT NULL,
    `price` DECIMAL(10, 2) NOT NULL,
    `quantity` INT(11) DEFAULT 0,
    `category_id` INT(11) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`category_id`) REFERENCES `category`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Suppression des données existantes dans la table product
DELETE FROM `product`;

-- Insertion de données dans la table product. 5 produits différents pour chaque catégorie de produit.
INSERT INTO `product` (`name`, `description`, `price`, `category_id`) VALUES
(
    'Ordinateur portable',
    'Ordinateur portable avec écran tactile, processeur Intel Core i7, 16 Go de RAM et 1 To de stockage SSD.',
    1499.99,
    1
),
(
    'Livre de cuisine',
    'Livre de cuisine avec des recettes de cuisine traditionnelles et modernes pour tous les goûts.',
    29.99,
    2
),
(
    'Enceinte Bluetooth',
    'Enceinte Bluetooth portable avec une autonomie de 10 heures, une puissance de 20 W et une connectivité sans fil.',
    79.99,
    3
),
(
    'PC de bureau',
    'PC de bureau avec processeur AMD Ryzen 7, 32 Go de RAM et 2 To de stockage HDD.',
    999.99,
    1
),
(
    'Roman policier',
    'Roman policier avec une intrigue captivante, des personnages mystérieux et un dénouement surprenant.',
    19.99,
    2
),
(
    'Casque audio sans fil',
    'Casque audio sans fil avec réduction de bruit active, autonomie de 20 heures et connectivité Bluetooth.',
    129.99,
    3
),
(
    'Tablette tactile',
    'Tablette tactile avec écran Retina, processeur Apple A12 Bionic, 128 Go de stockage et connectivité Wi-Fi.',
    499.99,
    1
),
(
    'Livre de science-fiction',
    'Livre de science-fiction avec des voyages interstellaires, des extraterrestres et des technologies futuristes.',
    24.99,
    2
),
(
    'Enceinte connectée',
    'Enceinte connectée avec assistant vocal intégré, connectivité Wi-Fi et Bluetooth, et compatibilité avec les services de streaming.',
    149.99,
    3
),
(
    'Smartphone',
    'Smartphone avec écran AMOLED, processeur Qualcomm Snapdragon 888, 256 Go de stockage et connectivité 5G.',
    799.99,
    1
),
(
    'Développement personnel',
    'Livre de développement personnel avec des conseils pratiques pour améliorer sa vie personnelle et professionnelle.',
    34.99,
    2
),
(
    'Écouteurs sans fil',
    'Écouteurs sans fil avec autonomie de 15 heures, résistance à l''eau et à la transpiration, et commandes tactiles.',
    59.99,
    3
),
(
    'Imprimante multifonction',
    'Imprimante multifonction avec scanner, copieur, fax, connectivité Wi-Fi et impression recto-verso automatique.',
    199.99,
    1
),
(
    'Livre de poésie',
    'Livre de poésie avec des vers libres, des rimes riches et des thèmes universels comme l''amour, la nature et la mort.',
    14.99,
    2
),
(
    'Barre de son',
    'Barre de son avec caisson de basses sans fil, puissance de 200 W, connectivité HDMI ARC et Bluetooth.',
    249.99,
    3
),
( 
    'Console de jeu',
    'Console de jeu avec processeur AMD Zen 2, GPU AMD RDNA 2, 16 Go de RAM GDDR6 et SSD NVMe de 1 To.',
    499.99,
    1
),
(
    'Livre d''histoire',
    'Livre d''histoire avec des récits authentiques, des témoignages poignants et des analyses approfondies.',
    39.99,
    2
),
(
    'Écran de télévision',
    'Écran de télévision OLED 4K avec HDR, Dolby Vision, Dolby Atmos, connectivité HDMI 2.1 et Wi-Fi.',
    999.99,
    3
);

--------------------------------------------------------------------------------------------------------
-- Table article
--------------------------------------------------------------------------------------------------------
-- Creation de la table article
CREATE TABLE IF NOT EXISTS `article` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `content` TEXT NOT NULL,
    `article_author_id` INT(11) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`article_author_id`) REFERENCES `user`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Suppression des données existantes dans la table article
DELETE FROM `article`;

-- Insertion de données dans la table article
INSERT INTO `article` (`title`, `content`, `article_author_id`, `created_at`, `updated_at`) VALUES
(
    'Introduction au PHP', 
    'PHP (acronyme récursif de PHP: Hypertext Preprocessor) est un langage de script open source de côté serveur largement utilisé. Il est particulièrement adapté au développement web et peut être intégré directement dans le HTML.',
    4,
    '2024-05-01 10:00:00',
    '2024-05-01 10:00:00'
),
(
    'Techniques SQL avancées', 
    'Les techniques SQL avancées sont utilisées pour optimiser les performances des requêtes SQL et pour effectuer des opérations complexes sur les bases de données. Ces techniques incluent l''utilisation de fonctions SQL avancées, de jointures, de sous-requêtes, de vues et de transactions.', 
    6,
    '2024-05-05 10:00:00',
    '2024-05-05 10:00:00'
),
(
    'Meilleures pratiques de développement web', 
    'Les meilleures pratiques de développement web sont des techniques et des méthodes qui sont utilisées pour améliorer la qualité, la performance et la sécurité des applications web. Ces pratiques incluent l''utilisation de normes de codage, de frameworks, de bibliothèques et d''outils de test.', 
    6,
    '2024-06-01 10:00:00',
    '2024-06-01 10:00:00'
);

--------------------------------------------------------------------------------------------------------
-- Table comment
--------------------------------------------------------------------------------------------------------
-- Creation de la table comment
CREATE TABLE IF NOT EXISTS `comment` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `article_id` INT(11) NOT NULL,
    `comment_author_id` INT(11) NOT NULL,
    `content` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`article_id`) REFERENCES `article`(`id`),
    FOREIGN KEY (`comment_author_id`) REFERENCES `user`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Suppression des données existantes dans la table comment
DELETE FROM `comment`;

-- Insertion de données dans la table comment
INSERT INTO `comment` (`article_id`, `comment_author_id`, `content`, `created_at`) VALUES
(1, 4, 'Merci pour cette introduction au PHP !', '2024-05-05 10:00:00'),
(1, 5, 'Très intéressant, j''ai hâte d''en apprendre plus sur le PHP.', '2024-05-06 10:05:00'),
(2, 6, 'Les techniques SQL avancées sont vraiment utiles pour optimiser les requêtes.', '2024-05-10 10:10:00'),
(2, 4, 'Oui, elles permettent de gagner en performance et en efficacité.', '2024-05-20 10:15:00'),
(3, 5, 'Les meilleures pratiques de développement web sont essentielles pour garantir la qualité des applications.', '2024-06-05 10:20:00'),
(3, 6, 'Absolument, elles permettent de maintenir un code propre et facilement maintenable.', '2024-06-05 10:25:00');


--------------------------------------------------------------------------------------------------------
-- Table chat
-------------------------------------------------------------- --------------------------------------------------------------
-- Creation de la table 
CREATE TABLE IF NOT EXISTS `chat` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `sender_id` INT(11) NOT NULL,
    `receiver_id` INT(11) NOT NULL,
    `message` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`sender_id`) REFERENCES `profile`(`id`),
    FOREIGN KEY (`receiver_id`) REFERENCES `profile`(`id`),
    CONSTRAINT `sender_receiver_check` CHECK (`sender_id` != `receiver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Suppression des données existantes dans la table
DELETE FROM `chat`;

-- Insertion de données dans la table
INSERT INTO `chat` (`sender_id`, `receiver_id`, `message`, `created_at`) VALUES
(5, 6, 'Salut laca, comment vas-tu ?', '2024-05-05 10:00:00'),
(6, 5, 'Bonjour mian, je vais bien merci et toi ?', '2024-05-06 10:05:00'),
(5, 6, 'Je vais bien aussi, merci. Tu as des nouvelles de mane ?', '2024-05-10 10:10:00'),
(6, 5, 'Oui, il m''a dit qu''il était en vacances. Il revient la semaine prochaine.', '2024-05-20 10:15:00'),
(5, 6, 'D''accord, merci pour l''info. On se voit à la réunion de l''équipe demain ?', '2024-06-05 10:20:00'),
(6, 5, 'Oui, je serai là. À demain !', '2024-06-05 10:25:00'),
(8, 7, 'Cava masa?', '2024-04-01 10:00:00'),
(7, 8, 'Cava fadi', '2024-04-01 10:05:00'),
(8, 7, 'Je vais bien aussi, merci. Tu as fini le projet ?', '2024-05-20 10:10:00'),
(7, 8, 'Non, pas pour l''instant. J''espère la semaine prochaine.', '2024-05-25 10:15:00'),
(8, 7, 'D''accord, merci pour l''info. Fais moi signe quant c''est fait STP', '2024-05-25 10:20:00'),
(7, 8, 'OK à plus !', '2024-06-15 10:25:00');
