 
  <?php
  // On spécifie le répertoire ou nous allons déposer les fichiers
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
  // Pour plus d'informations : http://php.net/manual/fr/function.pathinfo.php
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  // Nous allons vérifier s'il s'agit d'une vraie image.
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }
      if($uploadOk){
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
      }
  }
  ?> 


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
