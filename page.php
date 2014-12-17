<?php
if (isset($_POST['pseudo'])AND isset($_POST['mdp']) AND isset($_POST['rememberMe']) ) {
	 setcookie('pseudo', $_POST['prenom'], time() + 365*24*3600, null, null, false, true);
}
elseif (isset($_POST['pseudo'])AND isset($_POST['mdp'])) {
	 setcookie('pseudo', $_POST['prenom'], time() + 1*24*3600, null, null, false, true);
}

?>
<html>
<head>
	<title>Recherche</title>
    <meta charset="utf-8">

</head>
<body>

<h1>Affichage du cookies déjà enregistré</h1>

<?php 
	if (isset($_COOKIE['prenom'])) {
		echo "Cookie lu. Prenom = " . $_COOKIE['prenom'];
	}
	else {
		echo "Cookies non créé.";
	}
 ?>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

</body>
</html>