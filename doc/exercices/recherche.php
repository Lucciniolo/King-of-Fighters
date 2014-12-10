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

 ?>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

</body>
</html>