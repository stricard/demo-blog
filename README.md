<div align="center">
<h1>Demo Blog</h1>
</div>

<br>
<br>
Demo Blog est une petite application web de demo contenant un service API permettant de gérer des articles et ses auteurs.

## Installation

Cette application est livrée avec un ensemble de jeux de tests et de données de test pour s'assurer de son bon fonctionnement pour de futures mise à jour. 

La procédure d'installation est relativement simple : 

#### 1 - Installation des dépendances : 

La première étape conciste à installer l'ensemble des dépendances `PHP`, ainsi que le framework Laravel
```console
composer install
```

#### 2 - Configuration

##### 2.1 Fichier .env

La seconde étape concite à créer le fichier `.env` nécessaire au fonctionnement de laravel. 
Un fichier `.env.example` est disponible et configuré pour une installation locale. **Il doit être modifié pour un déploiement sur serveur**


## Les jeux de test
Comme précisé précedemment, l'application est livrée avec un ensemble de jeux de test permettant de vérifier le bon fonctionnement des API et ses divers composants.

>Il convient d'exécuter les tests avec les données de tests fournies pour s'assurer de maîtriser l'environnement de test

### Les différents tests

L'application contient deux types de tests : 

##### Les tests unitaires (`/test/Unit`)
Le rôle de ces tests est de s'assurer du fonctionnement de chaque composants applicatifs (Helpers, Request, Model, Resources ...). 

Ces tests ne requièrent pas de se trouver dans un contexte de fonctionnement pour être exécutés : Ils n'utilisent pas la classe incluant le trait "`CreateApplication`".

##### Les tests fonctionnels (`/test/Feature`)

À l'inverse des tests unitaires les tests fonctionnels visent à s'assurer qu'une action fonctionnelle (exemple : un appel API) déclenche les bonnes actions.

**Exemple** : *Vérifier que l'appel à l'API : `POST : /articles` entraîne bien la création d'un article*

Ils sont légérements plus complexes car nécessitent parfois de préparer un environnement spécifique (Création d'une ligne temporaire par exemple).

### Comment éxecuter les tests

Ces tests peuvent être lancés avec la commande suivante (à la racine du projet) : 
```
php artisan test 
```

> Il est possible d'ajouter l'arguement `--coverage-html ./public/coverage` pour générer un rapport de couverture de test dans le dossier `./public/coverage` (dossier ignoré par git).

Résultat : 
```
  > php artisan test
   PASS  Tests\Unit\ArticleManagerTest
  ✓ article manager

   PASS  Tests\Unit\UserExistRuleTest
  ✓ user exists
  ✓ user not exists

   PASS  Tests\Unit\ValidArticleStatusRuleTest
  ✓ articlestatus exists
  ✓ articlestatus not exists

   PASS  Tests\Feature\APIArticleControllerTest
  ✓ api articles with wrong apikey
  ✓ get articles with bad parameters with data set "Title invalid"
  ✓ get articles with bad parameters with data set "author invalid"
  ✓ get articles
  ✓ show article with data set "Premier article créé via le seeder"
  ✓ create article with existing article with data set "Titre existant"

   PASS  Tests\Feature\AccessTest
  ✓ acces page accueil
  ✓ acces page articles
  ✓ acces page doc api swagger

  Tests:  14 passed
  Time:   4.34s

```
