<?php 

$bdd = mysqli_connect('localhost', 'kof', 'EAF5F3nSZaUKrLTR', 'kof');

if(!isset($_GET['id']))
{
	$requete = mysqli_query($bdd, 'SELECT * FROM joueurs');
	$data = mysqli_fetch_assoc($requete);
	?>
	[
			{
				"id" : <?php echo $data['id'];?>
				"Pseudo" : <?php echo $data['Pseudo'];?>
			}

		<?php while($data = mysqli_fetch_assoc($requete))
		{
			?>,
			{
				"id" : <?php echo $data['id'];?>
				"Pseudo" : <?php echo $data['Pseudo'];?>
			}
		<?php
		}?>

	]<?php
}

elseif(isset($_GET['id'], $_GET['saison'], $_GET['day']))
{
	$id = $_GET["id"];
	$saison = $_GET['saison'];
	$day = $_GET['day'];
	$requete = mysqli_query($bdd, 	"SELECT joueurs.id, joueurs.pseudo, positions.position 
									FROM joueurs
									INNER JOIN positions
									ON joueurs.id = positions.joueur
									WHERE joueurs.id = '$id'
									AND positions.saison = '$saison'
									AND positions.journee = '$day'");
	$data = mysqli_fetch_assoc($requete);
	?>
	[
			{
				"id" : <?php echo $data['id'];?>,
				"pseudo" : <?php echo $data['pseudo'];?>,
				"position" : <?php echo $data['position'];?>
			}

	]<?php
}

else
{
	$id = $_GET["id"];
	$requete = mysqli_query($bdd, "SELECT * FROM joueurs WHERE id = '$id'");
	$data = mysqli_fetch_assoc($requete);
	?>
	[
			{
				"id" : <?php echo $data['id'];?>,
				"Pseudo" : <?php echo $data['Pseudo'];?>
			}

	]<?php
}
?>


