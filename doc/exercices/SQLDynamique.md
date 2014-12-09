# Creer une requete SQL Dynamiquement avec PHP

## Définition

On appelle requête dynamique est une requête construite à la volée par votre script.

Jusqu'à maintenant nous construisions nos requêtes comme cela : 

	<?php
	$req="SELECT * FROM matable WHERE champ1=$valeur1 AND champ2=$valeur2 AND champ3=$valeur3 AND champ4=$valeur4 order by id asc")
	?>

C'est bien, mais c'est long à écrire, cela oblige le posteur à remplir tous les champs car si un seul champ est vide la requête ne va plus fonctionner. L'idéal serait de pourvoir prévoir en fonction des éléments du formulaire.

De manière intuitive, pour résoudre ce problème, on pense à créer de nombreuses conditions avec des IF ou SWITCH. Nous allons voir une solution à ce problème. 

## Exemples d'utilisations

On peut créer un moteur de recherche qui cherchera dans la base de données les éléments choisis par l'utilisateur.

## Exemples commentés

### Exemple sans personnalisation des conditions

* Générer le SELECT d’une requête SQL

		<?php
		$tableauDeChamps = array('nom','prenom','age");
		$chaineDeChamps = implode(',',$tableauDeChamps);
		$sql = 'SELECT '. $chaineDeChamps . ' FROM table;
		?>

résultat : 

		SELECT nom,prenom,age FROM table

* Générer le WHERE d’une requête SQL :

		<?php  
		$tableauDeConditions = array('age>=18','age<50','pays=\'france\');
		$chaineDeConditions = implode(' AND ',$tableauDeConditions);
		$sql = 'SELECT nom, prenom, age FROM table WHERE '.$chaineDeConditions;
		?>

Résultat : 

		SELECT nom, prenom, age FROM table WHERE age>=18 AND age<50 AND pays='france' 

### Exemple avec personnalisation des conditions

Ne pas essayer de copie-coller betement ce code. Il faut l'adapter à votre situation.

	<?php
	// On se connecte à la base de données
	require 'connect.php'; 

	$firstname = 'Patrick';
	$lastname = 'Allaert';

	// On crée une variable qui stockera la requête
	$query = 'SELECT * FROM users';

	// On remplie la condition 
	$cond = array();

	// Si la variable firstname n'est pas vide
	if (!empty($firstname)) {
		// On ajoute au tableau cond, la condition
	    $cond[] = "firstname = '$firstname'";
	}

	// Si la variable lastname n'est pas vide
	if (!empty($lastname)) {
			// On ajoute au tableau cond, la condition
	    $cond[] = "lastname = '$lastname'";
	}

	// S'il y a des conditions dans le tableau cond, on les ajoute dans Where
	if (count($cond)) {
	    $query .= ' WHERE ' . implode(' AND ', $cond);
	}

	// On lance la requête
	$resultat = mysqli_query($bdd, $query);
	while($donnees = mysqli_fetch_assoc($resultat))
	{
			// On parcours ici les résultats 
			print_r($donnees);
	}

	mysqli_free_result($resultat);

	?>

# Exercice

Remarque : Afin de débugger convenablement, je vous conseille de faire un ECHO de la requête finalement générée par votre script.


Vous allez créer un petit formulaire de recherche de joueurs qui sera ajouté à la page «Joueurs». L'objectif est de pouvoir trier les joueurs selon leur positions. 

Je rappelle que les positions des joueurs ne sont pas stockés dans JOUEURS mais dans la table POSITION. Il faudra donc travailler sur deux tables en faisant une jointure pour récupérer le nom des joueurs.

## Partie HTML

**QUESTION 1.** Créer un formulaire HTML permettant de choisir :

* Une position minimale
* Une journée
* Une position maximale

## Partie PHP

**QUESTION 2.** Afin de s'assurer que vous avez bien compris le principe de la requête, créer la réquete permettant de rechercher les joueurs de la journée 1, entre la position 2 et 5. Attention, cela ne doit pas être fait dynamiquement (puisque l'on a fixé les trois paramètres).

Nous allons maintenant relier la partie HTML avec la partie PHP.

**QUESTION 2.** Créer comme nous faisions avant avec des variables PHP la requête puisant les valeurs recherchées dans le formulaire HTML.

 **QUESTION 3.** Créer une requête dynamique en utilisant la fonction PHP implode comme présenté dans la partie " Exemple commenté en utilisant la fonction PHP implode()"


Nous n'avons ici fait que des AND. Vous pouvez vous amusez a essayé de combiner des AND et des OR. 

# Liens intéressants 

* Fonction PHP Implode : http://php.net/manual/fr/function.implode.php
* Requétes préparées : http://php.net/manual/fr/mysqli.quickstart.prepared-statements.php
* Requetes avec PDO : http://www.julp.fr/articles/2-3-requeter.html
* Utiliser implode pour CSV ou SQL : http://www.lerouteur.fr/2008/03/27/php-explode-implode/
* Très bon cours sur les requêtes dynamiques : http://www.expreg.com/expreg_article.php?art=requete_dynamique
* En Anglais mais pas moins interessant : http://patrickallaert.blogspot.fr/2007/09/building-dynamic-sql-queries-elegant.html