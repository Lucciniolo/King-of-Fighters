<?php include("header.php"); ?>
<div class="container">
<br />
<br />
<br />
<br />
<br />

<?php
	if($bdd == True)
	{	
		if(isset($_GET['page']) && is_numeric($_GET['page']))//valeur par défaut de la variable $page = 1
		{
			$page = $_GET['page'];
		}	
		else
		{
			$page = 1;
		}	

		//valeur LIMIT = nombre de lignes (joueurs() affichés par page
		$pagination = 10
		;
		//valeur OFFSET = à partir de quelle ligne
		$limit_start = ($page - 1) * $pagination;

		//requête avec variables $pagination et $limit_start
		$requete = "SELECT * FROM joueurs ORDER BY pseudo LIMIT $pagination OFFSET $limit_start";
		$resultat = mysqli_query($bdd, $requete);

		//déterminer le nombre de joueurs dans la base de données
		$requete_2 = "SELECT COUNT(*) AS nb_total FROM joueurs";
		$resultat_2 = mysqli_query($bdd, $requete_2);
		$donnees = mysqli_fetch_array($resultat_2);
		$nb_total = $donnees['nb_total'];
		
		$nb_pages = ceil($nb_total / $pagination);//calcul du nombre de pages nécessaire à l'affichage de tous les joueurs (compte tenu de $pagination)	
	}
	else // Mais si elle rate…
	{
		echo "Erreur, de connexion à la base de données"; // On affiche un message d'erreur.
	}
		

		echo "<table class='table'>";

		echo "<tr>";
		
		echo "<th>Pseudo</th> <th>Nom</th> <th>Prenom</th> <th>Image</th>";
		
		echo "</tr>";
		
		 while($donnees = mysqli_fetch_assoc($resultat))
			{
				echo "<tr>";
				echo "<td>";
				echo $donnees['Pseudo'];
				echo "</td>";
				
				echo "<td>";
				echo $donnees['nom'];
				echo "</td>";
								
				echo "<td>";
				echo $donnees['prenom'];
				echo "</td>";
				
				echo "<td>";
				echo "<img src='" . $donnees['image'] . "' alt='" . $donnees['Pseudo']."'>";
				echo "</td>";
				echo "</tr>";
			}
	
		echo "</table><br />";

		
		for($i = 1; $i <= $nb_pages; $i++)//boucle pour afficher un lien pour chaque page (utilisation de variable $nb_pages)
		{
			
			if ($i == $page )
		{
			echo " $i";
		}
    		else
    		{
    			echo "<a href='joueurs.php?page=" . $i . "' >" . $i . "</a> ";//affichage du lien : prévoir l'envoi de la variable GET
    		}
       		 
       	}
	

mysqli_free_result($resultat);
mysqli_free_result($resultat_2);
?>

<?php include("footer.php"); ?>
</div>
