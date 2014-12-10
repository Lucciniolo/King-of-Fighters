<?php 
	function rechercheLineaire($element, $tableau)
	{

	// avec for
	/*	   for($i=0; $i < count($tableau); $i++)
	      if($tableau[$i]==$element)
	         return true;
	*/

	// avec foreach
	   foreach ($tableau as $value) {
	   		if($value == $element)
	   			return true;
	   }
	   	
	   return false;
	}	

	function trier($tableau)
	{
	    $tailleTableau = count($tableau);

	    // Si le tableau est vide, on sort de la fonction en renvoyant false
	    if ($tailleTableau <= 0) 
	    	return false;

	    // On va utiliser une variable $ok qui nous servira de sortir de la boucle
	    // en changeant simple la valeur de $ok
	    $ok = false;


	    // Il est évident que nous devons parcourir tous les éléments du tableau.
	    // Nous allons donc utiliser une boucle for pour tous les parcourir
	    // Dans cette boucle for, nous allons comparer un element avec son voisin.
	    // Nous changerons leur position si l'un est plus grand que l'autre.
	    // Dans l'autre cas, nous ne ferons rien.
	    // A la fin de cette boucle, on se retrouvera avec quelque chose d'un peu plus trié.
	    // Mais en echangeant les positions des voisins, on ne compare jamais des éléments éloignés.
	    // Il faut donc une deuxième boucle qui repetera cette action ...
	    // Tant que le tableau n'est pas entierement trié.


	    do
	    {
	    	// On dit à notre boucle do--while que si elle ne rencontre pas de $ok=true
	    	// Alors elle devra s'arreter. Ce qui reviendra à dire que tous les éléments 
	    	// étaient triés.
	        $ok = false;

	        // On parcourt tout le tableau en partant du dernier element jusqu'au premier
	        for($j=$tailleTableau-1; $j!=0; $j--)
	        {
	        	// Si l'element en cours (indice $j) est plus petit que l'element d'avant ($j-1)
	            if ($tableau[$j] < $tableau[$j-1])
	            {
	            	// On echange la position des deux elements avec une variable $tempon
	            	// Le nombre le plus petit sera mis en premier
	                $tampon = $tableau[$j];
	                $tableau[$j] = $tableau[$j-1];
	                $tableau[$j-1] = $tampon;

	                // On dit à la boucle do...while que nous avons changé au moins une position
	                // dans la boucle (et donc que le tableau n'était pas encore trié)
	                $ok = true;
	             }
	         }
	     }
	     while($ok);


	     return $tableau;
	}

?>



<html>
<head>
	<title>Recherche</title>
    <meta charset="utf-8">

</head>
<body>

<h1>Recherche séquentielle</h1>
<?php 
	
	$tableau = array();
	$tailleTableau = 20;
	$nombreRecherche = 5;

	// On remplie le tableu de valeurs aléatoires entre 0 et $tailleTableau
	for ($i=0; $i < $tailleTableau; $i++) { 
		$tableau[$i] = mt_rand(0, $tailleTableau);
	}

	print_r($tableau);

	echo "<br/>";
	echo "<br/>";

	if (rechercheLineaire($nombreRecherche, $tableau)) {
		echo "On a <b>trouvé</b> le nombre " . $nombreRecherche . " youpi !";
	}
	else
		echo "On a <b>pas trouvé</b> le nombre " . $nombreRecherche . " sniff !";


 ?>

 <h1>Tri par ordre croissant du tableau</h1>

<?php 
	echo "Tableau <b>non trié</b> : <br/>";
	print_r($tableau);
	echo "<br/>";
	echo "<br/>";

	echo "Tableau <b>trié</b> : <br/>";
	print_r(trier($tableau));




 ?>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

</body>
</html>