# Lecture documentation

* Page PHP sur les mots de passe : http://php.net/manual/fr/faq.passwords.php

## Hachage de mot de passe, salt 

* Définition de fonction de hachage (Wikipedia) :

	On nomme fonction de hachage une fonction particulière qui, à partir d'une donnée fournie en entrée, calcule une empreinte servant à identifier rapidement, bien qu'incomplètement, la donnée initiale. Les fonctions de hachage sont utilisées en informatique et en cryptographie.

* Qu'est-ce que MD5 ?

	L'algorithme MD5, pour Message Digest 5, est une fonction de hachage cryptographique qui permet d'obtenir l'empreinte numérique d'un fichier (on parle souvent de message). Il a été inventé par Ronald Rivest en 1991.

## API native de hashage de mot de passe (PHP 5.5)

http://php.net/manual/fr/book.password.php

# Inscription de l'utilisateur 

A faire a travers le formulaire de la page **inscription.php**. Pour écire dans la base de données, penser à faire des "insert into" en SQL. Attention à la sécurité ... Vous devez essayer de prévenir les **injections SQL**.

# Authentification de l'utilisateur 

à Venir ...

# Utilisation des sessions 

Je vous invite à reviser notre utilisation des sessions en début de formation. Nous l'utilisions avant les bases de données pour tester pour la première fois la persistance des données. Je rapelle que contrairement aux bases de données, une session est propre qu'à un seul utilisateur. 
Les sessions sont très proches des cookies dans leur utilisation.

# Jeu !

Vous allez échanger de place avec votre binome et tester son systeme de connexion. Votre but est de trouver des failles de sécurité ... Et de l'aider à les corriger. Nous ferrons un point sur les différentes failles trouvées. Pensez donc s'il-vous-plait à les noter. 

# Liens intéressants

Manuel PHP sur le hachage de mot de passe :
http://php.net/manual/fr/faq.passwords.php
