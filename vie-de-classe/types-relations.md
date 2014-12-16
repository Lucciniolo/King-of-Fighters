Un site avec très peu de fonctionnalités peut reposer sur une unique table. Cependant, si la base de données nécessite d'être plus complexe, il sera indispensable d'avoir plusieurs tables reliées entre elles à l'aide de **relations**. Cela est indispensable pour éviter **la redondance** et pour accroitre l’efficacité de l’application. 

Il existe trois type de relations :

# Cours


## Les relations O2O (One-to-one relationships)

Chaque tuple d’une table est relié à un et seulement un autre tuple dans une autre table. 

Dans une relation O2O entre une table A et une table B, chaque tuple de la table A est relié à à un autre tuple de la table B. Le nombre de colonnes de la table A doit être égale au nombre de colonne de la table B.

Ce type de relation peut sembler inutile puisque l’on aurait pu simplement regrouper les tables A et B sur la mềme page. Mais on peut ansi mettre sur la table A des champs très souvent utilisés et sur la B des champs moins utilisés.

## Les relations O2M (One-to-many relationships)

Chaque tuple d’une table donnée peut être relié à plusieurs tuples d’une autre table. Cela permet d’économiser notamment du stockage puisque les données n’ont pas à être recopiés à chaque fois .

Par exemple, si nous avons tous les employés d’une entreprise dans une table et les informations de cette entreprise dans une autre, il suffit simplement de faire mention de **la clé primaire** de l’entreprise dans la table des employés pour retrouver toutes informations sur leur entreprise à l’aide d’une jointure. On parle de **clé étrangère**.

## Les relations M2M (Many-to-many relationships)

Dans une relation M2M, un ou plusieurs tuples d’une table peut faire référence à ou plusieurs tuples d’une autre table. Une table de **mapping** est nécessaire pour implémenter ce genre de relation.

Par exemple, si l’on cherche à modéliser un système de location de voiture, on remarque qu’un client peut conduire plusieurs voitures différentes et que les voitures peuvent être conduite par plusieurs clients différents.

# Exercice

* Pour chaque type de relation, chercher un exemple dans la base de données du projet KOF. Si vous n'en trouvez pas (il se peut que certains type de relations n'existe pas dans notre projet, **proposer** des fonctionnalités simples qui en ont besoin. 
* Appelez moi pour que je les valide.
* Créer une table **profil**. Faire en sorte qu'une relation O2O relit cette table avec la table **joueurs**. Vous y stockerez des informations comme "compte Twitter", "Age", "Description" et toute informations que vous jugerez utile pour la page de profil de vos joueurs. 
* Justifier ce choix.






