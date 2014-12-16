# Upload de fichiers 
Nous allons voir ensemble comment développer une interface permettant aux utilisateurs de mettre en ligne un fichier.
## Script d’exemple
Il est évident qu’à l’aide de javascript il est possible de créer une interface encore plus belle mais ce n’est pas l’objet de ce cours.
Le script pourrait également vérifier les extensions. 

### Le formulaire HTML

      <!DOCTYPE html>
      <html>
      <body>
      <form action="upload.php" method="post" enctype="multipart/form-data">
          Select image to upload:
          <input type="file" name="fileToUpload" id="fileToUpload">
          <input type="submit" value="Upload Image" name="submit">
      </form>
      </body>
      </html> 

### Le script PHP

      <?php
      // On spécifie le répertoire ou nous allons déposer les fichiers
      // Dans une mise en production, il faut s'assurer que nous ayons les droits 
      // D'écriture dans ce répertoire.
      $target_dir = "uploads/";
      // $_FILES  Variable de téléchargement de fichier via HTTP.
        // Pour plus d'informations : http://php.net/manual/fr/reserved.variables.files.php
      // basename() retourne le le nom du fichier d'un chemin.
      // Pour plus d'informations : http://php.net/manual/fr/function.basename.ph
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      // On utilise un booléen qui nous servira à voir si l'upload s'est bien passé. 
      // Comme pour la recherche dichotomique.
      $uploadOk = 1;
      // Pathinfo : retourne des informations sur le fichier, comme son type.
      // Pour plus d'informations : http://php.net/manual/fr/function.pathinfo.php
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      // Nous allons vérifier si il s'agit d'une vraie image.
      if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
          } else {
              echo "File is not an image.";
              $uploadOk = 0;
          }
      }
      ?> 

## Exercice isolé
Les élèves qui s’en sentent capable peuvent utiliser Twitter Bootsrap, les autres ont tout intérêt à utiliser pour cet exercice les fonctionnalités offertes nativement par HTML.
* Mettre en pratique ce script. Sur une page, vous devez pouvoir mettre en ligne un fichier et sur une autre vous devez pouvoir afficher toutes les images mises en ligne. 
Indice : Vous aurez besoin d'écrire dans une table les chemins des fichiers que vous aurez mis en ligne. 

* (Option) Problématiques de redimensionnement
* (Option) Autoriser que certaines extensions
* (Option) Mettre une taille limite

## Exercice projet
Créer une page **profil.php**.
L’objectif de cette page est de pouvoir afficher les informations stockées dans la table **profil** du joueur. Pour accéder à un joueur en particulier, on y accède par méthode GET. Ainsi pour voir le profil de Coolman : www.tkof.com/profil.php?=Coolman
Créer une page editer-profil.php. Chaque joueur ne doit pouvoir accéder qu’à sa page. L’objectif de cette page est de permettre au joueur de mettre en ligne son image. 

# Liens utiles
http://www.w3schools.com/php/php_file_upload.asp

