<?php include("header.php"); ?>

<div class="container">
	<p>Salut sdles joueurs !<p>
			<p>Salut sdles joueurs !<p>



	<p>Salut sdles joueurs !<p>


</div>

<?php
if($bdd == True)
{
    // Si la connexion a réussi
	$requete = "SELECT nom, prenom FROM joueurs";
	$resultat = mysqli_query($bdd, $requete);
}
else // Mais si elle rate…
{
    echo 'Erreur, de connexion à la base de données'; // On affiche un message d'erreur.
}
	echo '<table border class="table">';

	echo "<tr>";
		
		echo ' <th>Nom</th> <th>Prenom</th> ';
		 while($donnees = mysqli_fetch_assoc($resultat))
			{
				echo "<tr>";
				echo "<td>";
				echo $donnees['nom'];
				echo "</td>";
				
				echo "<td>";
				echo $donnees['prenom'];
				echo "</td>";
				echo"<br/>";
				echo "</tr>";
			}
	echo "</tr>";
	echo "</table>";

mysqli_free_result($resultat);
?>

<?php include("footer.php"); ?>