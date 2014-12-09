Vous allez m'envoyer par mail à amari.sofiane.wf3@gmail.com le fichier reponses.php complété sous la forme reponses-prenom.php.

# Exerice 1 (4 points)

Voici un résultat :

	42 44 46 48 50 52 54 100 94 88 82 76 70 64 58 

* **1.** Écrire le programme PHP qui permet d’afficher ce résultat.


# Exerice 2 : test de validation (2 points)
	<?php
	$url = "http:://www.cava.fr";
	if(true)
	  echo "URL Valide";
	else
	  echo "URL non valide";
	?>

Doit donner comme résultat :

	URL non valide.

* **Question :** Remplacer dans le programme "true"  par ce qu'il faut pour que le programme fonctionne. 

# Exercice 3 : Corriger les erreurs (5 points)

Corriger les erreurs dans le code suivant pour qu'il fonctionne. Il doit afficher dans un tableau la liste des joueurs. Soyez attentif à tous les types d'erreurs : erreurs de syntaxe, oubli d'un paramètre, mauvais paramètres ...

	<?php 
	    	// Saisir ici votre réponse
	    	$bdd = mysqli_connect('compte','localhost', 'motdepasse', 'kof');	

			requete = 'SELECT position, pseudo, image FROM positions'
	    	
	    	$resultat = mysqli_query($requete);

	    	echo "<tr><th>Position</th><th>Pseudo</th><th>Image</th></tr>";
	    	while($donnees = mysqli_fetch_assoc($requete))
            {
            	echo "<tr>";
               
                echo "<td>";
                echo $donnees['Pseudo'];
                echo "</td>";
                
                echo "<td>";
                echo $donnees['position'];
                echo "</td>";
                echo "<td>";
                echo "<img src='" . $donnees['image'] ."' alt='" . $donnees['Pseudo'] . "'>";
                echo "</td>";
                              
                echo "</tr>";
           	}

           	mysqli_free_result($resultat);

	     ?>

**ATTENTION** : le code a été mis en commentaire dans reponses.php pour ne pas qu'il fasse bugger la page. Merci de vous assurer que le fichier reponses.php que vous me rendrez ne bugg pas. Si vous ne trouvez pas toutes les erreurs, mettez le code en commentaire. Je regarderai quand même ce que vous avez fait.

# Exercice 4 : quelques requêtes SQL (3 points)

* **Requete 1** : Afficher tous les joueurs dont le prenom contient "man".
* **Requete 2** : Selectionner tous les joueurs entre la position 2 et 3, la journée 1 de la saison 2.
* **Requete 3** : Ceci est une requête de pagination. Ecrire la requête qui permettra d'afficher 2 joueurs par page et qui affichera la deuxième page.

# Exercice 5 : Questions de cours (3 points)

* **Question 1* : Après avoir rappelé brievement ce qu'est une faille XSS, expliquer en quoi la fonction htmlspecialchars() permet d'en eviter.
* **Question 2* : Valider un formulaire coté client (en Javascript) est-il suffisant ? Expliquer votre réponse. 
* **Question 3* : Qu'est-ce qu'un SGBDR ?
* **Question 4* : Quelle est la différence entre la method GET et la method POST dans un formulaire ? 

# Exerice 6 : test d'entretien (sur 3 points)

Écrire un programme qui affiche les nombres de 1 à 199. Mais pour les multiples de 3, afficher “Fizz” au lieu du nombre et pour les multiples de 5 afficher “Buzz”. Pour les nombres multiples de 3 et 5, afficher “FizzBuzz”.

**Remarque :** Vous aurez besoin de l'opérateur Modulo :

	"$c = $a % $b"

% est appelé "l'opérateur Modulo". %c vaut le reste de $a divisé par $b.

