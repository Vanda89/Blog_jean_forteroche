# Blog pour Écrivain - OpenClassrooms P4

Ce projet a été réalisé dans le cadre du parcours Développeur Web d'OpenClassrooms. Il s'agit de la création d'un blog pour un écrivain, incluant un système de gestion (CRUD) pour les articles et les commentaires.

## Présentation
🎯 **Objectif du Projet**  
Développer un site web fonctionnel permettant :

- À l'écrivain de gérer ses articles via une interface d'administration sécurisée.
- Aux utilisateurs de consulter les articles publiés et de laisser des commentaires.

✨ **Fonctionnalités**  
**Partie Administrateur**  
- Créer, lire, modifier et supprimer (CRUD) des articles.
- Gestion des commentaires : validation ou suppression.
- Accès sécurisé à l'administration via un système d'authentification.

**Partie Utilisateur**  
- Consultation des articles publiés.
- Ajout de commentaires pour interagir avec l'écrivain.
- Gestion des sessions utilisateur pour commenter les articles.

📂 **Structure du Projet**  
- **/docs/** : Contient la documentation, les exports de la base de données et les fichiers d'architecture (ex. : schéma de la base de données).
- **/public/** : Contient les fichiers accessibles publiquement (images, styles CSS, etc.).
- **/src/** : Contient les fichiers principaux du projet :
  - **controllers/** : Les fichiers de gestion des requêtes.
  - **models/** : Les fichiers pour la gestion de la base de données.
  - **views/** : Les fichiers d'affichage (HTML et templates).
- **index.php** : Point d'entrée principal de l'application.

⚙️ **Technologies Utilisées**  
- PHP (version >= 7.4)
- MySQL : Base de données relationnelle.
- HTML/CSS : Pour le front-end.
- JavaScript : Interactions front-end basiques.
- Composer : Gestion des dépendances PHP.

## 🛠️ **Installation**  

1. Cloner le dépôt :
    ```bash
    git clone https://github.com/Vanda89/Blog_jean_forteroche.git
    cd P4_Blog
    ```

### 🛠️ **Initialisation de la Base de Données**  

Le schéma de la base de données est fourni sous forme de fichier **MySQL Workbench** (`schema.mwb`). Vous pouvez l'ouvrir avec [MySQL Workbench](https://www.mysql.com/products/workbench/) pour visualiser et modifier la structure de la base de données.

#### **Exportation en SQL**  
Si vous préférez utiliser un fichier SQL, vous pouvez exporter le schéma du fichier `.mwb` via MySQL Workbench en suivant ces étapes :
1. Ouvrez le fichier `schema.mwb` dans MySQL Workbench.
2. Allez dans **Database** > **Forward Engineer**.
3. Suivez les étapes pour générer un fichier SQL.
4. Utilisez ce fichier SQL pour créer votre base de données.

### **Lancer le projet en local**  
Via PHP :
```bash
php -S localhost:8000
