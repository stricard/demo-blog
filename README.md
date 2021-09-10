<div align="center">
<h1>Demo Blog</h1>
</div>

<br>
Demo Blog est une petite application web de demo contenant un service API permettant de gérer des articles et ses auteurs.

## Installation

Cette application est livrée avec un ensemble de jeux de tests et de données de test pour s'assurer de son bon fonctionnement pour de futures mise à jour. 

La procédure d'installation est relativement simple : 

#### Avec docker : 
>Nécessite d'avoir Docker Desktop (pour windows ou Mac).

Dans le répertoire courant, lancez la commande (pour windows) : 
```console
docker-start.cmd
```
ou si vous n'êtes pas sur windows : 
```console
docker-start.sh
```

Attention, un message peut apparaître sur votre écran (en bas à droite sur windows) vous demandant de partager le volume. Il faut cliquer sur "share".

Une fois le container lancé, l'installation des différentes dépendances peut prendre quelques minutes. Vous pouvez suivre l'avancée de l'installation en consultant les actions lancées par le container (via docker-desktop sur windows).
Une fois les commandes terminées, l'application est disponible via : http://localhost:8000/

#### Sans docker : 
Il est bien sûr nécessaire d'avoir php et composer d'installé sur votre machine. Ci-dessous les différentes étapes d'installation.

#### 1 - Installation des dépendances : 

La première étape conciste à installer l'ensemble des dépendances `PHP`, ainsi que le framework Laravel
```console
composer install
```

#### 2 - Configuration

##### 2.1 Fichier .env

La seconde étape consiste à créer le fichier `.env` nécessaire au fonctionnement de laravel. 
Un fichier `.env.example` est disponible et configuré pour une installation locale. **Il doit être modifié pour un déploiement sur serveur**

Des apikey ont été défini dans ce fichier de configuration pour faciliter l'installation et le test de l'application. Il est bien sûr recommandé en temps normal de ne mettre aucune info de sécurité dans le fichier `.env.example`

##### 2.2 Laravel key

Générez ensuite la key de l'application via la commande
```console
php artisan key:generate
```
Cela va remplir automatiquement le champ adéquat dans le fichier`.env`

##### 2.3 Base de données

De même que pour le fichier .env, il faut créer le fichier de base de données sqlite. Pour plus de simplicité, vous pouvez copier le fichier `db.sqlite.example` en le nommant `db.sqlite`.
Il vous faudra ensuite modifier le fichier `.env` en renseignant le lien absolu du fichier `db.sqlite`

Générez ensuite les tables et ses données via la commande : 
```console
php artisan migrate:fresh --seed
```

L'application est prête à être testée et utilisée via http://localhost:8000/

## Les jeux de test
Comme précisé précedemment, l'application est livrée avec un ensemble de jeux de test permettant de vérifier le bon fonctionnement des API et ses divers composants.

>Il convient d'exécuter les tests avec les données de tests fournies pour s'assurer de maîtriser l'environnement de test

### Les différents tests

L'application contient deux types de tests : 

##### Les tests unitaires (`/test/Unit`)
Le rôle de ces tests est de s'assurer du fonctionnement de chaque composants applicatifs (Helpers, Request, Model, Resources ...). 

Ces tests ne requièrent pas de se trouver dans un contexte de fonctionnement pour être exécutés : Ils n'utilisent pas la classe incluant le trait "`CreatesApplication`".

##### Les tests fonctionnels (`/test/Feature`)

À l'inverse des tests unitaires les tests fonctionnels visent à s'assurer qu'une action fonctionnelle (exemple : un appel API) déclenche les bonnes actions.

**Exemple** : *Vérifier que l'appel à l'API : `POST : /articles` entraîne bien la création d'un article*

Ils sont légérements plus complexes car nécessitent parfois de préparer un environnement spécifique (Création d'une ligne temporaire par exemple).

### Comment éxecuter les tests

Ces tests peuvent être lancés avec la commande suivante (à la racine du projet) : 
```
php artisan test 
```

> Il est possible d'ajouter l'arguement `--coverage-html ./public/coverage` pour générer un rapport de couverture de test dans le dossier `./public/coverage`.

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

## Mise en production 

Les précédentes étapes permettent d'installer l'applcation localement ou sur des environnements de développement. 
Pour une mise en production ou recette, il faudra bien entendu modifier certains paramètres de configuration (nottament les gestion des apikeys) comme les 
paramètres `APP_ENV` et `APP_DEBUG`. 
