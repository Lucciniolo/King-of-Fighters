# Token

## Notion de back-office (ou "d'arrière-guichet")

Ensemble de fonctionnalités accecibles seulement avec une autorisation permettant de modifier les éléments du site visibles par tous. (exemple : modifier un article, supprimer un article ...). La partie visible par tous peut être appelé le front-office.

## Faille CSRF (Cross-Site Request Forgery)

## Etudes de solutions

* Voir : Faille CSRF http://openclassrooms.com/courses/securisation-des-failles-csrf
* Voir : Tokens http://lamidudeveloppeur.fr/php/lutilisation-token-les-formulaires-faille-csrf/

## $_SERVER['HTTP_REFERER']

Contient l'adresse qui a amené le votre visiteur sur le script en cours.

En rajoutant un if, on peut vérifier si cette variable est égale à la page formulaire.php.
	
	"Le referer est envoyé par le navigateur du client, en d'autres termes il est très facile de le modifier ! Ne vous fiez donc pas à lui à 100%, ce n'est qu'une protection complémentaire."

# Oubli du mot de passe

Il est important de définir une politique de récupération du mot de passe qui soit fiable et non contournable. De trop noubreux sites (pourtant à fort trafic) laissent des failles **d'ingénieurie sociale** sur leur site.
des fuites de photo de personnes célébres se sont ainsi récemment retrouvé sur internet parce que la question secrète était trop facile à découvrir. 

# Autorisation

# Authentification à deux étapes

Afin de palier à de nombreux problèmes de sécurité, notaemment les mots de passe trop courts ou trop peu sécurisés, de nombreux sites (iCloud, Google par exemple) utilisent  l'authentification en deux étapes. 

* Google : http://www.google.fr/intl/fr/landing/2step/
* Apple : http://support.apple.com/kb/HT4232?viewlocale=fr\_FR&locale=fr\_FR
