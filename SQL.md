# Rappel sur SQL

SQL (Structured Query Language) est un langage standard pour la gestion et la manipulation des bases de données relationnelles.

## Principaux mots-clés SQL

1. **DDL (Data Definition Language)**
   - CREATE: Crée une nouvelle table, vue ou autre objet dans la base de données
   - ALTER: Modifie un objet existant dans la base de données
   - DROP: Supprime un objet existant de la base de données

2. **DML (Data Manipulation Language)**
   - SELECT: Récupère des données de la base de données
   - INSERT: Insère de nouvelles données dans une table
   - UPDATE: Modifie des données existantes dans une table
   - DELETE: Supprime des données d'une table

3. **DCL (Data Control Language)**
   - GRANT: Donne des privilèges spécifiques à un utilisateur
   - REVOKE: Retire les privilèges d'un utilisateur

4. **TCL (Transaction Control Language)**
   - COMMIT: Sauvegarde les changements
   - ROLLBACK: Annule les changements
   - SAVEPOINT: Crée des points dans une transaction où vous pouvez revenir

5. **Clauses et opérateurs**
   - WHERE: Filtre les résultats
   - ORDER BY: Trie les résultats
   - GROUP BY: Groupe les lignes qui ont les mêmes valeurs
   - HAVING: Spécifie une condition de recherche pour un groupe
   - LIKE: Recherche un motif spécifié
   - IN: Spécifie plusieurs valeurs dans une clause WHERE
   - BETWEEN: Sélectionne des valeurs dans une plage donnée
   - JOIN: Combine des lignes de deux ou plusieurs tables

## Exemples de requêtes SQL courantes

1. **Sélectionner toutes les colonnes d'une table**
   ```sql
   SELECT * FROM utilisateurs;
   ```

2. **Sélectionner des colonnes spécifiques avec un filtre**
   ```sql
   SELECT nom, email FROM utilisateurs WHERE age > 18;
   ```

3. **Insérer une nouvelle ligne dans une table**
   ```sql
   INSERT INTO utilisateurs (nom, email, age) VALUES ('Alice', 'alice@email.com', 25);
   ```

4. **Mettre à jour des données existantes**
   ```sql
   UPDATE utilisateurs SET email = 'newemail@email.com' WHERE id = 1;
   ```

5. **Supprimer des données**
   ```sql
   DELETE FROM utilisateurs WHERE id = 1;
   ```

6. **Joindre deux tables**
   ```sql
   SELECT utilisateurs.nom, commandes.produit 
   FROM utilisateurs 
   INNER JOIN commandes ON utilisateurs.id = commandes.utilisateur_id;
   ```

7. **Grouper et compter**
   ```sql
   SELECT departement, COUNT(*) as nombre_employes 
   FROM employes 
   GROUP BY departement;
   ```

8. **Utiliser des sous-requêtes**
   ```sql
   SELECT nom 
   FROM utilisateurs 
   WHERE id IN (SELECT utilisateur_id FROM commandes WHERE total > 1000);
   ```

9. **Trier les résultats**
   ```sql
   SELECT nom, age FROM utilisateurs ORDER BY age DESC;
   ```

10. **Limiter le nombre de résultats**
    ```sql
    SELECT nom FROM produits ORDER BY prix DESC LIMIT 5;
    ```
