-- Création de la base de données
CREATE DATABASE IF NOT EXISTS cuisine
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

-- Utilisation de la base
USE cuisine;

-- Table des cuisiniers
CREATE TABLE cuisiniers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    specialite VARCHAR(100),
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    avatar VARCHAR(255)
);

-- Table des catégories pour normaliser les types de plats
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL UNIQUE
);

-- Table des plats
CREATE TABLE plats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(150) NOT NULL,
    type_id INT NOT NULL, -- référence à categories
    description TEXT,
    cuisinier_id INT,
    CONSTRAINT fk_plat_cuisinier FOREIGN KEY (cuisinier_id)
        REFERENCES cuisiniers(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE,
    CONSTRAINT fk_plat_categorie FOREIGN KEY (type_id)
        REFERENCES categories(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);

-- Table des utilisateurs avec rôles
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user','cuisinier','admin') NOT NULL DEFAULT 'user',
    cuisinier_id INT DEFAULT NULL,
    CONSTRAINT fk_user_cuisinier FOREIGN KEY (cuisinier_id)
        REFERENCES cuisiniers(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE
);

-- Insertion de cuisiniers
INSERT INTO cuisiniers (nom, specialite, email, password, avatar) VALUES
('Jean Dupont', 'Italienne', 'jean.dupont@example.com', 'password123', 'avatar1.png'),
('Marie Curie', 'Française', 'marie.curie@example.com', 'password456', 'avatar2.png'),
('Ali Ben', 'Orientale', 'ali.ben@example.com', 'password789', 'avatar3.png');

-- Insertion de catégories
INSERT INTO categories (nom) VALUES
('Entrée'),
('Plat Principal'),
('Dessert'),
('Boisson');

-- Insertion de plats
INSERT INTO plats (nom, type_id, description, cuisinier_id) VALUES
('Salade Niçoise', 1, 'Salade traditionnelle avec thon, olives et œufs', 1),
('Spaghetti Carbonara', 2, 'Pâtes à la sauce carbonara classique', 1),
('Crème Brûlée', 3, 'Dessert français à la vanille et caramel', 2),
('Thé à la menthe', 4, 'Boisson traditionnelle orientale', 3),
('Tajine de poulet', 2, 'Plat marocain avec poulet et légumes', 3);

-- Insertion d'exemples d'utilisateurs
INSERT INTO users (nom, email, password, role, cuisinier_id) VALUES
('Alice Martin', 'alice@example.com', 'passalice', 'user', NULL),
('Jean Dupont', 'jean.dupont@user.com', 'passjean', 'cuisinier', 1),
('Admin', 'admin@example.com', 'adminpass', 'admin', NULL);
