Nous allons étudier dans ce cours la manière de lire et écrire dans des fichiers.

# Système de fichier

Avant de se poser la question de commenton travaille avec des fichiers en PHP, il est intérésant d'introduire la notion de **système de fichier**.
Pour stocker des informations, il existe de nombreuses manières. Nous en avons étudié une à travers les bases de donnéees relationnelles. 
Un système de fichiers offre à l'utilisateur une vue abstraite sur ses données et permet de les localiser à partir d'un chemin d'accès. Il nous permet de trouver, écrire et lire un fichier.
Si je vous dis "NTFS" ou "FAT", cela vous dit-il quelque chose ? Très probablement. Il s'agit de systemes de fichiers windows. Chaque système de fichier à ses spécificités, avantages et inconvéniants. 

## Ecriture et lecture d'un fichier en PHP

## Ecriture d'un email et d'un nom dans un fichier

    <?php
      // ouverture du fichier en écriture sur la fin du fichier ("a")
      $fp = fopen("php_8_fichier.txt","a"); 
      // Insertion du caractère "retour à la ligne" dans le fichier $fp
      fputs($fp, "\n");
       // on écrit le nom et email dans le fichier
      fputs($fp, "$nom|$email");
      // On ferme le fichier
      fclose($fp);
    ?>

## Lecture d'une page HTML déjà existante

Nous allons voir dans cet exemple comment on peut combiner l'utilisation des expressions régulières avec le système de fichier.

    <?
    // On choisi un fichier présent sur notre site comme "header.php"
    $fp = fopen("header.php","r");
    //on parcourt toutes les lignes
    while (!feof($fp)) { 
    // lecture du contenu de la ligne (4096 est le nombre d'octet maximum lit sur la ligne)
      $page .= fgets($fp, 4096); 
    }
    
    //on isole le titre à l'aide d'une expression régulière
    $titre = eregi("<title>(.*)</title>",$page,$regs); 
   
    // On affiche le résultat de notre script
    echo $regs[1];
    
    fclose($fp);
    
    ?>


## Droits d'écriture

    r	ouverture en lecture seulement
    w	ouverture en écriture seulement (la fonction crée le fichier s'il n'existe pas)
    a	ouverture en écriture seulement avec ajout du contenu à la fin du fichier (la fonction crée le fichier s'il n'existe pas)
    r+	ouverture en lecture et écriture
    w+	ouverture en lecture et écriture (la fonction crée le fichier s'il n'existe pas)
    a+	ouverture en lecture et écriture avec ajout du contenu à la fin du fichier (la fonction crée le fichier s'il n'existe pas)


## Outils

Vous pouvez utiliser **un validateur JSON** qui va vérifier votre synthaxe. En voici [un](http://jsonlint.com/) par exemple.


# Exercice 

* Créer un **simple** fichier **infos-joueurs.json** qui contient :

        [
          {
            "_id": 0,
            "Pseudo": "Wright"
          },
          {
            "_id": 1,
            "Pseudo": "Wilda"
          },
          {
            "_id": 2,
            "Pseudo": "Blair"
          },
          {
            "_id": 3,
            "Pseudo": "John"
          }
        ]
    
Ces informations sont en **durs** et ne sont pas générés par notre scripts.

## Exerice 1 : exercice isolé

* **(1)** Créer une boucle qui permet d'afficher 100 "blocs" contenant simplement un id et un Pseudo. L'ID va de 1 à 100 tandis que le Pseudo est choisi aléatoirement parmis "Julien, Sébastien, Bintou". Pour la selection aléatoire vous, pouvez retourner à l'exercice sur rand().

## Exercice 2 : projet

* **(2)** Télécharger le fichier **nouveaux-joueurs.json** qui est dans vie-de-classe/ . Ce fichier contient une liste de joueurs au format JSON.

Vous allez devoir créer le script qui permet de récupérer les données des joueurs dans *nouveaux-joueurs.json et les importer dans la base de données. Pour ce faire, il faut procéder par étapes :
* **(3)** Créer la fonction **trouver-bloc()** qui récupère un bloc entre crochets. Pour ce faire, vous allez devoir coder une expression régulière.  La fonction trouver-bloc() doit renvoyer simplement un bloc (donc les données d'un joueur).
* **(4)** Créer la fonction **retourner-info("prenom", $bloc)** qui renvoit le prenom d'un $bloc. Ainsi en changeant simple le paramètre de la fonction, vous pourez récupérer les informations que vous voulez. 
* **(5**) Créer la fonction **enregistrer-bloc()** du programme qu via *simplement* récupérer le premier bloc. Ensuite pour chaque "clé" (exemple de clé : Pseudo) l'écrire dans la base de données. Ainsi on aura ajouté le premier joueur.


Nous allons utiliser la fonction fseek qui permet de placer son "pointeur" à l'ondroit que l'on veut du fichier.
Pour plus d'informations : [manuel PHP fseek](http://php.net/manual/fr/function.fseek.php)
* (6) Nous vons maintenant ue fonction qui permet d'enregister **un seul** joueur dans notre base de données. Notre objectif étant d'enregistrer tous les blocs présent dans notre fichier, vous allez devoir concevoir l'algorithme qui permet de passer d'un bloc à l'autre.


*Pour les curieux* : le fichier **nouveaux-joueurs.json** a été généré avec le site **json generator**. Je vous ai mis la structure qui a permis de crééer automatiquement ce jeu de données dans **vie-de-classe/json-generator.txt**.*


