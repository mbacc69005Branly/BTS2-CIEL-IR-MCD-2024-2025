# Les migrations sous Laravel

## Qu'est-ce qu'une migration ?
Une migration dans Laravel est un système de contrôle de version pour votre base de données. Elle permet de définir et de modifier la structure de votre base de données de manière programmative et reproductible. Les migrations offrent plusieurs avantages :

1. Versioning de la structure de la base de données
2. Facilité de collaboration entre développeurs
3. Possibilité de revenir en arrière (rollback) si nécessaire
4. Cohérence entre les environnements de développement, de test et de production

Chaque migration est un fichier PHP contenant deux méthodes principales :

* `up()` : définit les changements à apporter à la base de données (comme créer une table, ajouter une colonne, etc.)
* `down()` : annule les changements effectués par la méthode up() (comme supprimer une table, retirer une colonne, etc.)

## Composition d'une ligne de commande pour créer une migration
La commande pour créer une migration dans Laravel suit généralement cette structure :
```bash
php artisan make:migration nom_de_la_migration --table=nom_de_la_table
```
Détaillons chaque partie de cette commande :

1. `php` : L'interpréteur PHP.
2. `artisan` : L'interface en ligne de commande (CLI) de Laravel.
3. `make:migration` : La commande Artisan spécifique pour créer une nouvelle migration.
4. `nom_de_la_migration` : Le nom que vous souhaitez donner à votre migration. Par convention, ce nom décrit l'action que la migration va effectuer, par exemple :
   * create_users_table
   * add_email_to_customers_table
   * change_price_column_in_products_table
5. `--table=nom_de_la_table` (optionnel) : Spécifie le nom de la table concernée par cette migration. Si vous omettez cette option, Laravel essaiera de deviner le nom de la table à partir du nom de la migration.

Exemples concrets :
* Pour créer une table "champions" :
```bash
php artisan make:migration create_champions_table
```
* Pour ajouter une colonne "email" à une table "users" existante :
```bash
php artisan make:migration add_email_to_users_table --table=users
```
* Pour modifier une colonne "price" dans une table "products" :
```bash
php artisan make:migration change_price_column_in_products_table --table=products
```

Après avoir exécuté cette commande, Laravel génère un nouveau fichier de migration dans le dossier `database/migrations` avec un nom au format `YYYY_MM_DD_HHMMSS_nom_de_la_migration.php`. Le timestamp au début du nom de fichier permet à Laravel de déterminer l'ordre dans lequel les migrations doivent être exécutées.
