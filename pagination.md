# Pagination
La clause LIMIT est utilisé pour limiter le nombre de résultats renvoyé dans une requete SQL. Si vous avez 1000 tuples mais ne voulez traiter que les 10 premiers :
	SELECT column FROM table
	LIMIT 10

la clause LIMIT doit toujours apparaitre à la fin d'une requete MySQL.

Supposons maintenant que nous voulons affichier les tuples de 11 à 15. Avec la clause OFFSET, c'est très facile : 
	SELECT column FROM table
	LIMIT 5 OFFSET 10

Le 10 est non inclus.

Par exemple sur la table d'exemple de [W3SCHOOL](http://www.w3schools.com/sql/trysql.asp?filename=trysql_select_columns)

La requête : 

	SELECT *
	FROM orders
	ORDER BY OrderID ASC
	LIMIT 2 OFFSET 4

affichera la commande 10252 et la commande 10253 (deux commandes car LIMIT est égal à 2).

traduction issue de : http://www.petefreitag.com/item/451.cfm

# Exemple concret sur T-KOF : pagination sur la page joueurs

## On définit en premier lieu le numero de la page

	if( isset($_GET['page']) && is_numeric($_GET['page']) )
	    $page = ..............;
	else
	    $page = 1;

## Définir le nombre de tuples affichés par page
	$pagination = 10;

## Numero du premier tuple à lire
	$limit_start = ($page - 1) * $pagination;

## Requête
	$sql = ................... LIMIT ........ OFFSET
	$resultat = mysql_query($sql);

## Boucle d'affichage des données
	while ( $donnee = mysql_fetch_assoc($resultat) ) {
			..................
	}

## Nombre d'enregistrement total 
	$nb_total = mysql_query('SELECT COUNT(*) AS nb_total FROM table');
	$nb_total = mysql_fetch_array($nb_total);
	$nb_total = $nb_total['nb_total'];

## Nombre de pages
	$nb_pages = ceil($nb_total / $pagination);

ceil() — Arrondit au nombre supérieur

## Affichage de la pagination avec lien 

Penser à mettre un lien sur chaque page. Pour se faire, se rappeler que l'on a utilisé une methode GET pour transmettre les pages et que donc on peut accéder aux pages via l'URL.

	echo '<p>[ Page :';
	// Boucle sur les pages
	for ( ...................... ) {
	    if ($i == $page )
	        echo " $i";
	    else
	        .....................
	}
	echo ' ]</p>';
