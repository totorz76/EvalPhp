# LBB – Mon site cuisine

**LBB** (La Bonne Blanquette) est une application web PHP/MySQL permettant à des cuisiniers de gérer leurs plats, avec authentification sécurisée, gestion de profil et une touche d’humour grâce aux citations de Karadoc dans Kaamelott.

---

## Fonctionnalités

- Authentification sécurisée des cuisiniers (inscription, connexion, déconnexion)
- Gestion des profils :
  - Modification de l’email, mot de passe et avatar
- CRUD sur les plats :
  - Ajouter, modifier, supprimer ses plats
  - Affichage uniquement des plats du cuisinier connecté
- Gestion des catégories de plats
- Sécurité :
  - Mot de passe hashé
  - Protection CSRF et XSS
- Footer avec citation aléatoire de Karadoc (via JSON local)
- Interface responsive avec Bootstrap 5 Slate

---

## Installation

1. **Cloner le dépôt**

```

git clone <URL_DU_DEPOT>
cd EvalPhp
---
2. **Créer la base de données MySQL**
---
CREATE DATABASE cuisine CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE cuisine;

-- Importer le fichier SQL fourni
SOURCE path/to/database.sql;

```

3. **Configurer la connexion PDO**

```

Copier config/pdo.example.php en config/pdo.php

Modifier les informations de connexion :

<?php
$host = 'localhost';
$db   = 'cuisine';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$pdo = new PDO($dsn, $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

```

4. **Installer le dossier JSON pour les citations**

```

Copier le fichier karadoc.json dans public/assets/karadoc.json

Exemple de structure JSON :

```

5. **Ajouter le dossier uploads au gitignore**

```

/uploads/

Les avatars uploadés seront stockés ici.

```

6. **Lancer le serveur PHP**

```
php -S localhost:8080

```

##Arboresence

```

EvalPhp/
├─ config/
│  ├─ pdo.php
│  └─ routes.php
├─ controllers/
│   ├─ AddPlats.php
│   ├─ DeletePlats.php
│   ├─ EditPlats.php
│   ├─ ListPlats.php
│   ├─ Login.php
│   ├─ Logout.php
│   ├─ Profil.php
│   ├─ PublicGetAllPlat.php
│   └─ Register.php
├─ model/
│  ├─ Karadoc.php
│  ├─ Cuisiners.php
│  ├─ Categories.php
│  └─ Plats.php
├─ public/
│  ├─assets
│  │    └─karadoc.json
│  ├─ templates/
│  │  ├─ Profil.html.php
│  │  ├─ accueil.html.php
│  │  ├─ header.html.php
│  │  ├─ footer.html.php
│  │  └─ Plats/
│  │     ├─ ListPlats.html.php
│  │     ├─ AddPlats.html.php
│  │     └─ EditPlats.html.php
├─ uploads/ (avatars)
├─ index.php
├─ 404.php
└─ README.md

```

## Sécurité

```


Les mots de passe sont hachés avec password_hash().

Protection CSRF sur les formulaires.

Protection XSS avec htmlspecialchars() sur toutes les sorties.

Les cuisiniers ne peuvent modifier ou supprimer que leurs propres plats.

Vérification côté serveur pour les champs obligatoires et formats (email, mot de passe, avatar).

```

## Technologies utilisées

```

PHP 8+

MySQL / MariaDB

Bootstrap 5 (Slate)

JSON pour les citations Karadoc

```

## Notes

```

Les citations sont stockées localement dans public/assets/karadoc.json.

Chaque page est incluse via index.php avec routing simple.


La navigation affiche le profil et l’avatar du cuisinier connecté.
