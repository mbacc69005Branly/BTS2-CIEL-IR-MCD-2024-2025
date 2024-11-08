![image](https://github.com/user-attachments/assets/73fa33ad-3642-4017-91ce-9cfc18aec792)# TP SQL : Requêtes pour la base de données League of Legends

## Objectif
L'objectif de ce TP est de vous familiariser avec l'écriture de requêtes SQL, en utilisant le contexte de League of Branly. Vous pratiquerez la création et la modification de tables, ainsi que diverses opérations sur les données.

## Prérequis
- Connaissance de base du SQL
- Compréhension du MCD de League of Branly fourni ci-dessous
- L'exécution des migrations qui vous sont fournis dans ce repository `League_of_Branly/database/migrations`.
- Si vous ne trouvez pas votre conteneur sur Docker Desktop :
    - Ouvrez un bloc note et copier/coller la commande suivante :
    ```bash
    docker run -p 80:80 -p 443:443 -p 443:443/udp \
        -v D:/csimon.SNIRW/League_of_Branly:/var/www/html \
        shinsenter/laravel:latest
    ```
    - Remplacez `csimon.SNIRW` par le nom de votre dossier dans le lecteur `D:`
    - Ouvrez un **bash** en **administrateur** avec le compte **.\tpdocker**
    - Collez la commande modifiée et exécutez là

```mermaid
erDiagram
    CHAMPION {
        int champion_id PK
        varchar(50) name
        text lore
        varchar(50) title
        int gender_id FK
        int resource_id FK
        int year_id FK
    }
    GENDER {
        int gender_id PK
        varchar(20) name
    }
    POSITION {
        int position_id PK
        varchar(20) name
    }
    SPECIE {
        int specie_id PK
        varchar(50) name
    }
    RESOURCE {
        int resource_id PK
        varchar(30) name
    }
    RANGE {
        int range_id PK
        varchar(20) name
    }
    REGION {
        int region_id PK
        varchar(50) name
        text lore
    }
    YEAR {
        int year_id PK
        int year
    }
    CHAMPION }o--|| GENDER : "has"
    CHAMPION }o--|{ POSITION : "can_play_as"
    CHAMPION }o--|{ SPECIE : "belongs_to"
    CHAMPION }o--|| RESOURCE : "uses"
    CHAMPION }o--|{ RANGE : "has"
    CHAMPION }o--|{ REGION : "comes_from"
    CHAMPION }o--|| YEAR : "released_in"
```

## Contexte
Vous travaillez sur une base de données SQLite qui gère les informations sur les champions de League of Branly. Pour visualiser la base de données et tester vos requêtes vous pouvez utiliser Heidi installé lors du TP précédent.

## Exercices
- Pour chaque exercice, écrivez la requête SQL pure.
- Commentez vos requêtes pour expliquer votre raisonnement.
- Assurez-vous que chaque requête est syntaxiquement correcte et optimisée.
- Pensez à l'utilisation appropriée des index pour améliorer les performances des requêtes.

### 1. Création d'une table
Créez une table `champion` avec les colonnes appropriées basées sur le MCD fourni. Après l'exécution de la requête, votre table `champion` doit avoir strictement la même structure que la table `champions`.
```SQL
CREATE TABLE champions (
id_champion INT AUTO_INCREMENT PRIMARY KEY,
name varchar(50) NOT NULL,
title varchar(50),
lore text,
id_gender int,
id_resource int,
id_year int,
FOREIGN KEY (id_gender) REFERENCES genders(id_gender),
FOREIGN KEY (id_resources) REFERENCES resources(id_resources),
FOREIGN KEY (id_year) REFERENCES year(id_year)
);
```

### 2. Modification d'une table
Ajoutez une nouvelle colonne `popularity` de type INT à la table `champions`.
```SQL
ALTER TABLE "champions" ADD COLUMN "popularity" INTEGER;
```

### 3. Insertion de données
Insérez le champion Fiddlesticks dans la table `champions` avec les attributs suivants :
- Nom : Fiddlesticks
- Titre : The Ancient Fear
- Lore : Something has awoken in Runeterra. Something ancient. Something terrible. The ageless horror known as Fiddlesticks stalks the edges of mortal society, drawn to areas thick with paranoia where it feeds upon terrorized victims. Wielding a jagged scythe, the haggard, makeshift creature reaps fear itself, shattering the minds of those unlucky enough to survive in its wake. Beware the sounding of the crow, or the whispering of the shape that appears almost human... Fiddlesticks has returned. 
- Genre : Autre
- Espèce : Démon
- Ressource : Mana
- Portée : À distance
- Position : Jungle
- Région principale : Runeterra
- Année de sortie : 2009
- Popularité : 5 (sur une échelle de 1 à 10)

```SQL
INSERT INTO champions (id_champion, name, title, lore, gender, resources, year, created_at, updated_at);
```  
```SQL
INSERT INTO champions VALUES ('11','Fiddlesticks', 'The Ancient Fear', 'Something has awoken in Runeterra. Something ancient. Something terrible. The ageless horror known as Fiddlesticks stalks the edges of mortal society, drawn to areas thick with paranoia where it feeds upon terrorized victims. Wielding a jagged scythe, the haggard, makeshift creature reaps fear itself, shattering the minds of those unlucky enough to survive in its wake. Beware the sounding of the crow, or the whispering of the shape that appears almost human... Fiddlesticks has returned.', '3', '1', '9', NULL, NULL);
```
![MM](https://github.com/user-attachments/assets/f122a2a4-faf7-4669-bc98-b522fcced921)

Assurez-vous d'insérer également les données nécessaires dans les tables pivots associées (comme `champion_specie` par exemple).

### 4. Récupération de tous les champions
Écrivez une requête SQL pour récupérer tous les champions, triés par nom.
```SQL
SELECT name FROM champions;
```


### 5. Recherche de champions par nom
Implémentez une requête qui permet de trouver des champions dont le nom contient une chaîne spécifique.
On pourra tester avec la chaîne `ar` qui devra retourner trois noms : `Bard`, `Rengar` et `Gnar`.

### 6. Modification d'un enregistrement
Mettez à jour la popularité des champions en leur attribuant une valeur aléatoire entre 1 et 10. Utilisez la fonction `RANDOM()` (`RAND()` sous MySQL et `RANDOM()` sous SQLite) pour générer cette valeur aléatoire. 

Note : `RANDOM()` genère un nombre entre -9223372036854775808 et +9223372036854775807. Pour générer un nombre entre 1 et 10 vous pouvez vous appuyer sur ce que vous avez fait en co-intervention de maths sur la méthode d'approximation d'une intégrale par la méthode de Monté-Carlo.

### 7. Suppression d'un enregistrement
Supprimez un champion spécifique de la table.

### 8. Jointure avec les positions
Écrivez une requête qui récupère tous les champions avec leurs positions associées. Votre requête affichera deux colonnes :
* Le nom des champions
* La ou les noms des positions

### 9. Groupement par ressource
Créez une requête qui compte le nombre de champions pour chaque type de ressource. Votre requête affichera deux colonnes :
* Le nom des ressources
* Le nombre de champion ayant cette ressource

### 10. Champions par région
Implémentez une requête qui récupère tous les champions d'une région spécifique.

### 11. Champions multi-régions
Trouvez tous les champions qui sont associés à plus d'une région.

### 12. Requête complexe : Champions polyvalents
Écrivez une requête pour trouver les champions qui peuvent jouer à 2 ou plus positions différentes.

## Bonus
- Écrivez une procédure stockée qui effectue une opération complexe sur la base de données.
- Créez une vue qui simplifie une requête complexe fréquemment utilisée.

## Rendu
À la fin du TP, vous devrez soumettre un fichier SQL contenant toutes vos requêtes, accompagnées de commentaires explicatifs. Assurez-vous que votre code est bien formaté et suit les bonnes pratiques SQL.
