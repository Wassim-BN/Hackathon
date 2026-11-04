

# TP1 - Hackathon: mise en place de l'ORM (Object Relational Mapping)

## Prérequis
- PHP [version], Composer, Symfony CLI
- MySQL [version]

## Installation

```bash
git clone [https://github.com/Wassim-BN/Hackathon]
cd [Hackathon]
composer install
```

    $ symfony check:requirements
    $ symfony new my_project_directory --version="8.1.*" --webapp
    $ composer create-project symfony/skeleton:"8.1.*" my_project_directory
    $ cd my_project_directory
    $ composer require webapp

Créer un fichier `.env.local` avec :

```
DATABASE_URL="mysql://usr_hack:[mot_de_passe]@127.0.0.1:3306/Hackathon?serverVersion=[version]&charset=utf8mb4"
```
Valeurs à adapter selon votre configuration

En option : Créer la base si celle-ci n'existe pas
```bash
php bin/console doctrine:database:create
```

## Entités

| Entité | Attributs principaux
|---|---|
| Hackathon | id, dateheuredebut, dateheurefin

## Migration de l'entité
Pour créer la table Hackathon dans la base de données :

    $ php bin/console make:migration
    $ php bin/console doctrine:migrations:migrate

## Fixtures

Générer le jeu d'essai en définissant les fixtures

    $ composer require --dev doctrine/doctrine-fixtures-bundle
    $ php bin/console doctrine:fixtures:load

Test :

    <?php
    
    namespace App\DataFixtures;
    
    use App\Entity\Hackathon;
    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Persistence\ObjectManager;
    
    class AppFixtures extends Fixture
    {
        public function load(ObjectManager $manager): void
        {
            // $product = new Product();
            // $manager->persist($product);
            for ($i = 0; $i < 3; $i++) {
                $hackathon = new Hackathon();
                $hackathon->setDateHeureDebut("8:00:00");
                $hackathon->setDateHeureFin("17:00:00");
                $manager->persist($hackathon);
            }
    
            $manager->flush();
        }
    }

Réponse correcte.
Les "id" ne sont pas nuls, j'ai bien mes trois champs avec les heures.

## Test d'interrogation

Requête :

```bash
php bin/console dbal:run-sql "SELECT * FROM hackathon LIMIT 5"
```

Résultat (extrait) :

```
---- ------------------ ---------------- --------- ---------- --------- 
  id   date_heure_debut   date_heure_fin   lieu      ville      theme    
 ---- ------------------ ---------------- --------- ---------- --------- 
  4    08:00              18:00            Lycée 1   Paris      Thème 1  
  5    08:00              18:00            Lycée 2   Lyon       Thème 2  
  6    08:00              18:00            Lycée 3   Nantes     Thème 3  
  7    08:00              18:00            Lycée 4   Lille      Thème 4  
  8    08:00              18:00            Lycée 5   Bordeaux   Thème 5  
 ---- ------------------ ---------------- --------- ---------- --------- 
```

## Difficultés rencontrées
[2 ou 3 lignes maximum]
