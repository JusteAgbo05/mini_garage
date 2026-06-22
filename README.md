# Mini Garage - Laravel 12

Projet Laravel 12 de gestion d'un garage de reparation automobile,
realise dans le cadre de l'Activite 4 du cours Developpement Web
niveau avance (Programme DCLIC / OIF).

---

## Presentation

L'application permet de gerer les vehicules, les reparations et les
techniciens d'un garage automobile. Elle couvre la persistance des
donnees avec Eloquent ORM, une API REST et une interface Blade
avec Bootstrap 5.

---

## Fonctionnalites

- Gestion complete des vehicules (CRUD)
- Gestion complete des reparations (CRUD)
- Gestion complete des techniciens (CRUD)
- Recherche de vehicules par marque ou immatriculation
- Assignation multiple de techniciens a une reparation
- API REST testee avec Thunder Client
- Composant Blade reutilisable (VehiculeCard)
- Model Binding dans les controleurs
- Laravel Debugbar en mode developpement

---

## Technologies utilisees

| Technologie       | Version  | Role                        |
|-------------------|----------|-----------------------------|
| Laravel           | 12.x     | Framework PHP backend       |
| PHP               | 8.2.12   | Langage de programmation    |
| MySQL             | XAMPP    | Base de donnees             |
| Bootstrap         | 5.3.3    | Framework CSS               |
| Bootstrap Icons   | 1.11.3   | Icones                      |
| Laravel Debugbar  | --dev    | Debogage                    |

---

## Prerequis

- PHP >= 8.2
- Composer
- MySQL (XAMPP ou autre)
- Laravel 12

---

## Installation

### 1. Cloner le depot

```bash
git clone https://github.com/ton-username/mini_garage.git
cd mini_garage
```

### 2. Installer les dependances

```bash
composer install
```

### 3. Configurer l'environnement

```bash
cp .env.example .env
php artisan key:generate
```

Ouvre le fichier `.env` et configure la base de donnees :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=garage_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Creer la base de donnees

Cree une base de donnees nommee `garage_db` dans phpMyAdmin puis execute :

```bash
php artisan migrate
```

### 5. Peupler la base de donnees

```bash
php artisan db:seed
```


### 6. Lancer le serveur

```bash
php artisan serve
```

L'application est accessible sur `http://127.0.0.1:8000`.

---

## Structure de la base de donnees

1. table_vehicules

id, immatriculation, marque, modele, couleur,

annee, kilometrage, carrosserie, energie, boite

2. table_reparations

id, vehicule_id (FK), date,

duree_main_oeuvre, objet_reparation

3. table_techniciens

id, nom, prenom, specialite

4. table_reparation_technicien (table pivot)

reparation_id (FK), technicien_id (FK)

---

## Relations Eloquent

Vehicule    --< Reparation        (hasMany / belongsTo)

Reparation  >--< Technicien       (belongsToMany)

---

## API REST

Base URL : `http://127.0.0.1:8000/api`

| Methode | Endpoint                  | Action                      |
|---------|---------------------------|-----------------------------|
| GET     | /vehicules                | Liste des vehicules         |
| GET     | /vehicules/{id}           | Detail d'un vehicule        |
| POST    | /vehicules                | Creer un vehicule           |
| PUT     | /vehicules/{id}           | Modifier un vehicule        |
| DELETE  | /vehicules/{id}           | Supprimer un vehicule       |
| GET     | /reparations              | Liste des reparations       |
| GET     | /reparations/{id}         | Detail d'une reparation     |
| POST    | /reparations              | Creer une reparation        |
| PUT     | /reparations/{id}         | Modifier une reparation     |
| DELETE  | /reparations/{id}         | Supprimer une reparation    |
| GET     | /techniciens              | Liste des techniciens       |
| GET     | /techniciens/{id}         | Detail d'un technicien      |
| POST    | /techniciens              | Creer un technicien         |
| PUT     | /techniciens/{id}         | Modifier un technicien      |
| DELETE  | /techniciens/{id}         | Supprimer un technicien     |

---

## Exemple de requete API

**Creer un vehicule :**

```bash
curl -X POST http://127.0.0.1:8000/api/vehicules \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "immatriculation": "AB-123-CD",
    "marque": "Renault",
    "modele": "Clio",
    "couleur": "Rouge",
    "annee": 2020,
    "kilometrage": 45000,
    "carrosserie": "Berline",
    "energie": "Essence",
    "boite": "Manuelle"
  }'
```

---

## Structure du projet

mini_garage/

├── app/

│   ├── Http/Controllers/

│   │   ├── VehiculeController.php

│   │   ├── ReparationController.php

│   │   └── TechnicienController.php

│   ├── Models/

│   │   ├── Vehicule.php

│   │   ├── Reparation.php

│   │   └── Technicien.php

│   └── View/Components/

│       └── VehiculeCard.php

├── database/

│   ├── factories/

│   ├── migrations/

│   └── seeders/

├── resources/views/

│   ├── base.blade.php

│   ├── components/

│   │   └── vehicule-card.blade.php

│   └── garage/

│       ├── vehicules/

│       ├── reparations/

│       └── techniciens/

└── routes/

├── web.php

└── api.php

---

## Auteur

Réalisé par Juste Vivien Agbo

Cours Developpement Web -- Niveau avance
Programme DCLIC / OIF -- Juin 2026
