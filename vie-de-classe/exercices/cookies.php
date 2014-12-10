<?php
if (isset($_POST['prenom'])) {
	 // Ecriture d'un cookie
	 setcookie('prenom', $_POST['prenom'], time() + 10*24*3600, null, null, false, true);
}
?>
<html>
<head>
	<title>Recherche</title>
    <meta charset="utf-8">

</head>
<body>

<h1>Ecriture du cookie</h1>

<form action="cookies.php" method="POST">
Enregistrer mon prenom dans un cookie :<br>
<input type="text" name="prenom" value="">
<input type="submit" value="Submit">
</form> 

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

</body>
</html>