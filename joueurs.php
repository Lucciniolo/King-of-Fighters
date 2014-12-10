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
?>
<div class="container" style="top:10px">

	<form name="search" method="POST" action="joueurs.php" role="form">
		<label>Rechercher les joueurs</label>
		<button id="btn" type="submit" class="btn btn-default">OK</button><br/>
		Position Min :
		<input type="text" name="posMin">
		Position Max :
		<input type="text" name="posMax">
		Journée :
		<select type="text" name="day" class="input-small">
			<?php
				$day = mysqli_query($bdd, 
					'SELECT journee
					FROM positions
					GROUP BY journee'
					);

				while($data = mysqli_fetch_assoc($day))
			{
				echo "<option>".$data['journee']."</option>";
			}
			?>

		</select>
		Saison :
		<select type="text" name="saison" class="input-small">
			<?php
				$saison = mysqli_query($bdd, 
					'SELECT saison
					FROM positions
					GROUP BY saison'
					);

				while($data = mysqli_fetch_assoc($saison))
			{
				echo "<option>".$data['saison']."</option>";
			}
			?>
		</select>
	</form>

<?php

	function search()
	{

		global $bdd;	
		$cond = array();

		/*$query = "SELECT `positions`.`position`, `joueurs`.`prenom`, `joueurs`.`nom`, `joueurs`.`image`
				  FROM positions
				  INNER JOIN joueurs
				  ON `positions`.`joueur` = `joueurs`.`id`
				  WHERE journee = 1
				  AND saison = 1
				  AND position >= 2 
				  AND position <= 5";*/

		$query = "SELECT `positions`.`position`, `joueurs`.`prenom`, `joueurs`.`nom`, `joueurs`.`image`
				  FROM positions
				  INNER JOIN joueurs
				  ON `positions`.`joueur` = `joueurs`.`id`";

		if(null!=($_POST['posMin']))
		{
			$posMin = $_POST['posMin'];

			$cond[] = "position >= '$posMin'";
		}

		if(null!=($_POST['posMax']))
		{
			$posMax = $_POST['posMax'];

			$cond[] = "position <= '$posMax'";
		}

		if(null!=($_POST['day']))
		{
			$day = $_POST['day'];

			$cond[] = "journee = '$day'";
		}

		if(null!=($_POST['saison']))
		{
			$saison = $_POST['saison'];

			$cond[] = "saison = '$saison'";
		}
		//	array("position >= 3", "position <= 4", "journee = 2", "saison = 4");


		if (count($cond))
		{
			// Bien penser à mettre les espaces 
			$query .= ' WHERE '.implode(' AND ', $cond).' ORDER BY `positions`.`position` ASC ';
		}



		$result = mysqli_query($bdd, $query);

		echo "<table class='table table-condensed table-striped'>";
		echo "<br/><label>Résultat de la recherche</label>";
		echo "<tr><th>Position</th><th>Prénom</th><th>Nom</th><th></th></tr>";

		

			while($data = mysqli_fetch_assoc($result))
			{
				echo "<tr>";
				echo "<td>".$data['position']."</td>";
				echo "<td>".$data['prenom']."</td>";
				echo "<td>".$data['nom']."</td>";
				echo "<td>"."<img src='".strip_tags($data['image'])."'/>"."</td>";
				echo "</tr>";
			}

		mysqli_free_result($result);
	}	



	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		search();
	}


mysqli_free_result($resultat);
mysqli_free_result($resultat_2);
?>

<?php include("footer.php"); ?>
</div>
