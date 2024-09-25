# Comment construire un Modèle Conceptuel de Données (MCD)

## Introduction

Le Modèle Conceptuel de Données (MCD) est un outil fondamental dans la conception de bases de données. Il permet de représenter de manière graphique et structurée les données d'un système d'information et leurs relations.

## 1. Comprendre les concepts de base

### 1.1 Entités

Une entité représente un objet ou un concept du monde réel. Par exemple : Champion, Compétence,...
On représente une entité par un rectangle avec dans la partie supérieur son nom.

![image](https://github.com/user-attachments/assets/81145d06-ed21-4e26-9283-d3fba26d2855)

### 1.2 Attributs

Les attributs sont les caractéristiques qui décrivent une entité. Par exemple, pour l'entité Champion : Nom, Description,...
Dans notre modèle, on représente les attributs en dessous du nom dans une partie séparée.

![image](https://github.com/user-attachments/assets/1677222b-8997-4e07-bec1-7ccd19a93e6a)

### 1.3 Relations

Les relations décrivent les liens entre les entités. Par exemple : un Champion "possède" une ou plusieurs Compétences.

![image](https://github.com/user-attachments/assets/518b70cb-8c24-4807-80a5-cea19fb852b3)

### 1.4 Cardinalités

Les cardinalités indiquent le nombre minimum et maximum d'occurrences d'une entité dans une relation. Voici la liste des cardinalités possibles et leur signification :

- (0,1) : Zéro ou un.
  - L'entité peut ne pas participer à la relation, ou y participer une seule fois.
  - Exemple : Un employé peut avoir zéro ou un bureau attitré.
- (1,1) : Exactement un.
  - L'entité doit participer à la relation exactement une fois.
  - Exemple : Une personne a exactement une date de naissance.
- (0,n) : Zéro ou plusieurs.
  - L'entité peut ne pas participer à la relation, ou y participer plusieurs fois.
  - Exemple : Un client peut n'avoir passé aucune commande, ou en avoir passé plusieurs.
- (1,n) : Un ou plusieurs
  - L'entité doit participer à la relation au moins une fois, et peut y participer plusieurs fois.
  - Exemple : Un livre doit avoir au moins un auteur, et peut en avoir plusieurs.
- (i,j) : Entre i et j (où i < j)
  - L'entité doit participer à la relation au minimum i fois et au maximum j fois.
  - Exemple : Une équipe de football doit avoir entre 11 et 23 joueurs (11,23).

## 2. Étapes pour construire un MCD

### 2.1 Identifier les entités

- Listez tous les objets ou concepts importants du système.
- Chaque entité doit avoir un nom unique et être au singulier.

### 2.2 Définir les attributs

- Pour chaque entité, identifiez ses caractéristiques.
- Choisissez un identifiant unique pour chaque entité appelé clé primaire ou primary key (PK) en anglais. Elle sera en gras souligné dans l'entity.

### 2.3 Établir les relations

- Identifiez les liens entre les entités.
- Nommez ces relations avec des verbes à l'infinitif.

### 2.4 Déterminer les cardinalités

- Pour chaque relation, définissez les cardinalités minimales et maximales.
- Utilisez la notation (0,1), (1,1), (0,n), ou (1,n).

### 2.5 Affiner le modèle

- Vérifiez la cohérence globale du modèle.
- Éliminez les redondances éventuelles.
- Assurez-vous que chaque entité a un identifiant unique.

## 3. Exemple pratique

Construisons un MCD simple pour un système de gestion de champions et de leurs abilités :

Entités :
- Champion (ID_Champion, Nom, Titre, Role)
- Abilité (ID_Abilité, Nom, Description, Type)

Relation :
- Un Champion "possède" une ou plusieurs Abilités
- Une Abilité "appartient à" un seul Champion

Cardinalités :
- Champion vers Abilité : (1,n) - Un champion possède au moins une abilité, et peut en avoir plusieurs.
- Abilité vers Champion : (1,1) - Une abilité appartient à un et un seul champion.

Représentation simplifiée :

```
Champion (1,n) ----possède---- (1,1) Abilité
```

Dans ce modèle :
- Chaque champion doit avoir au moins une abilité (cardinalité minimale 1) et peut en avoir plusieurs (cardinalité maximale n).
- Chaque abilité appartient exactement à un champion (cardinalité 1,1).

```mermaid
    CHAMPION ||--|{ ABILITE : possède
    CHAMPION {
        int ID_Champion
        string Nom
        string Titre
        string Role
    }
    ABILITE {
        int ID_Abilite
        string Nom
        string Description
        string Type
    }
```

## 4. Outils pour créer un MCD

Il existe plusieurs outils pour dessiner un MCD :
- Logiciels spécialisés : Lucidchart, Draw.io, MySQL Workbench
- Outils de dessin génériques : Microsoft Visio, Adobe Illustrator

## Conclusion

La création d'un MCD est une étape cruciale dans la conception d'une base de données. Elle permet de clarifier la structure des données et leurs interactions avant de passer à l'implémentation technique. Avec de la pratique, vous deviendrez plus à l'aise pour créer des MCD efficaces et précis.

## L'outil draw.io / diagram.net

1. Rendez-vous sur https://app.diagrams.net/#
2. Sélectionnez GutHub
[image](https://github.com/user-attachments/assets/1604ed49-42a1-4a69-b3e4-db4fbbbbe82b)
3. Cliquez sur `Créer un nouveau diagramme`
![image](https://github.com/user-attachments/assets/1ee0e269-f494-444b-bc9e-051faa71a65b)
4. Selectionnez `Diagramme entité-relation` dans la liste puis le bouton `Créer`.
![image](https://github.com/user-attachments/assets/71def5ad-d918-4861-a6a8-2642bfcbeef6)
5. Cliquez sur `Autoriser`.
![image](https://github.com/user-attachments/assets/09674776-baac-40c7-a023-cd9d14957320)
6. Si ce n'est pas fait, logger vous sur Github puis cliquez sur le bouton `Installer`.
7. Sélectionnez le dossier `<votre_compte>/BTS2-CIEL-IR-MCD-2024-2025` puis `OK`.

## Les entités

- Chaque rectangle représente une entité dans votre modèle.
- Une entité est contitué de plusieurs éléments :
  - Dans la partie supérieure