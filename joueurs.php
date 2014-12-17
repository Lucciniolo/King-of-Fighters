<?php
session_start();

	function search()
	{
		global $bdd;
		if(isset($_GET['page']) && is_numeric($_GET['page']))//valeur par défaut de la variable $page = 1
		{
			$page = $_GET['page'];
		}	
		else
		{
			$page = 1;
		}	

		//valeur LIMIT = nombre de lignes (joueurs() affichés par page
		$pagination = 2;

		//valeur OFFSET = à partir de quelle ligne
		$limit_start = ($page - 1) * $pagination;

		//requête avec variables $pagination et $limit_start
		$cond = array();
		$query = "SELECT position, prenom, nom, image, Pseudo
				  FROM positions
				  INNER JOIN joueurs
				  ON joueur = id";

		//déterminer le nombre de joueurs dans la base de données
		$requete_2 = "SELECT COUNT(*) AS nb_total FROM joueurs";
		$resultat_2 = mysqli_query($bdd, $requete_2);
		$donnees = mysqli_fetch_array($resultat_2);
		$nb_total = $donnees['nb_total'];
		
		$nb_pages = ceil($nb_total / $pagination);//calcul du nombre de pages nécessaire à l'affichage de tous les joueurs (compte tenu de $pagination)	
	
		if(isset($_POST['posMin']))
		{
			$posMin = $_POST['posMin'];

			$cond[] = "position >= '$posMin'";
		}

		if(isset($_POST['posMax']))
		{
			$posMax = $_POST['posMax'];

			$cond[] = "position <= '$posMax'";
		}

		if(isset($_POST['day']))
		{
			$day = $_POST['day'];

			$cond[] = "journee = '$day'";
		}

		if(isset($_POST['saison']))
		{
			$saison = $_POST['saison'];

			$cond[] = "saison = '$saison'";
		}

		if (count($cond))
			// Bien penser à mettre les espaces 
			$query .= ' WHERE '.implode(' AND ', $cond).' ORDER BY position ASC LIMIT 10';
		else
			$query .= ' ORDER BY position ASC LIMIT '.$pagination.' OFFSET '. $limit_start;

		$result = mysqli_query($bdd, $query);

		echo "<table class='table table-condensed table-striped'>";
		echo "<tr><th>Position</th><th>Prénom</th><th>Nom</th><th>image</th><th>Vedette</th><th>Supprimer</th></tr>";

		while($data = mysqli_fetch_assoc($result))
			{
				echo "<tr>";
				echo "<td>".$data['position']."</td>";
				echo "<td>".$data['prenom']."</td>";
				echo "<td>".$data['nom']."</td>";
				echo "<td>"."<img src='".strip_tags($data['image'])."'/>"."</td>";
				echo "<td>"; ?> 
				<form action="joueurs.php" method="POST">
				   <input type="hidden" name="pseudo" value="<?php echo $data['Pseudo']; ?>" >
				   <input type="submit" value="Choisir">
				</form>
				<?php
				echo "</td>";
				echo "<td>"; ?> 
				<form action="joueurs.php" method="POST">
				   <input type="hidden" name="supPseudo" value="<?php echo $data['Pseudo']; ?>" >
				   <input type="submit" value="Supprimer">
				</form>
				<?php
				echo "</td>";
				echo "</tr>";
			}

		for($i = 1; $i <= $nb_pages; $i++)//boucle pour afficher un lien pour chaque page (utilisation de variable $nb_pages)
		{	
			if ($i == $page)
				echo " $i";
    		else
    			echo "<a href='joueurs.php?page=" . $i . "' >" . $i . "</a> ";//affichage du lien : prévoir l'envoi de la variable GET
    	}
		mysqli_free_result($result);
		mysqli_free_result($resultat_2);
	}	
?>
<?php include("header.php"); ?>
<br><br><br><br>
<?php
	if($bdd == True)
		search();	
	else // Mais si elle rate…
		echo "Erreur, de connexion à la base de données"; // On affiche un message d'erreur
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
</div>
<?php include("footer.php"); ?>
