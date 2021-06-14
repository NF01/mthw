# MTHW / More Than Hello World

Repo pour l'application "Ca joue" dans le cadre du cours ProjArt 2021 de la Heig-vd.

# Team

Larry Lam

Leyla Benkais

Lionel Urfer

Jade Perroset

Jeremy Bourqui

Ophélie Baur

Nathan Fourel

# Concept

La web app "Ca joue" est un développement backend en REST API Laravel et un frontend en Vue.js lié à une base de donnée MySQL. 
L'application a pour concept de développer un quizz pour tester la "suissitude" des personnes qui y participent. 
Des questions de culture générale entre en concurrence avec des questions plus ouvertes et décalées sur la Suisse et ses habitants.

# Prérequis

- PHP 7.4+
- Node.js 14+
- npm 6+
- Composer 2+

# Déploiement 

Cloner le répertoire git 

```bash
$> git clone https://github.com/NF01/mthw.git
```

Renommer le fichier `.env.example` en `.env` et modifier les différentes variables d'environnements présentes pour la connexion à la base de donnée MySQL. 

> Partie du fichier `.env`  à modifier
>
> ```
> DB_CONNECTION=mysql
> DB_HOST=127.0.0.1
> DB_PORT=3306
> DB_DATABASE=db_mthw
> DB_USERNAME=change_username
> DB_PASSWORD=change_password
> ```

Rendre exécutable le fichier `mthw.sh`

```bash
$> cd mthw
$> chmod +x mthw.sh
```

> Contenu du fichier mthw.sh
>
> ```
> #!/bin/bash
> composer install 
> npm install
> npm run prod
> php artisan storage:link
> php artisan key:generate
> ```

Exécuter le fichier `mthw.sh`

```bash
$> ./mthw.sh
```

Importer le fichier `create_db_mthw.mysql` (présent dans mthw -> database) dans MySQL (phpMyAdmin)

Lancer les commandes suivantes (dans le dossier mthw) 

```bash
$> php artisan migrate
$> php artisan db:seed 
```

> Les seeders vont rentrer toutes les questions , les réponses et les images pour que le quizz fonctionne correctement.

> REMARQUE: si l'app est déployée sur un serveur ayant plusieurs chemins depuis son nom de domaine 
> Exemple: https://monnomdedomaine/test1 et https://monnomdedomaine/test2 et que le projet est déployé après le /test1 ou /test2, il faudra changer en conséquence la variable globale dans le fichier `vue.blade.php` (ressource -> views) pour que les différent fetch (url relatives) soient exacts.
>
> > Partie du fichier `vue.blade.php`  à modifier
> >
> > ```html
> > <script>
> > 	// DEV URL
> >     window.URL_PREFIX = '/test1/';//test1 est ici pour l'exemple
> > </script>
> > ```



