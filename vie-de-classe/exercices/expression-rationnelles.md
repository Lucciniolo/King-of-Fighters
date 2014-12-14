# Les expression rationnelles ou expression régulières

## Principe

Nous sommes quotidiennement submergés par des informations textuelles. 


### Quelques mots de vocabulaire

**REGEX** 

Le **langage PERL** est un langage très utilisé pour travailler avec du texte. Il utilise un langage d'expression particulière avec des parcularités appelé PCRE (Perl Compatible Regular Expression). Ce système est plus riche. 

## Exemples d'utilisation

* Pour valider un formulaire
* Recherche un texte dans un texte
* Controle parental
* Changement de format text
* **à vous d'en trouver**

## Exercices

Pour réaliser des exercices simples sur les expression rationnelles, nous allons utiliser le sytème recherche de **Sublim Text**, logiciel avec lequel vous êtes familiarisés. Dans la section **Liens utiles** vous trouverez une documentation, en Anglais, présentant des fonctionnalités avancées que nous n'aurons pas le temps d'aborder.

### Exercice 1

Voici un extrait du Roman **Jean de Florette** de Marcel Pagnol :

	Le Papet alluma sa pipe, et demanda : "Il y a du nouveau ?
	- Oui, et il y a du bon et du mauvais. Premièrement, les vastes projets, c'est un grand élevage de lapins, en plein air, dans un grillage.
	- Très bien. Il a un livre ?
	- Oui, il me l'a fait voir. C'est tout plein de chiffres. Ça prouve que, si tu commences avec deux lapins, au bout de six mois, tu en as plus de mille. Et si tu laisses continuer, c'est la perdition : c'est comme ça qu'ils ont mangé l'Australie.
	- Je connais ça, dit le Papet. (...) Avec un porte-plume, c'est facile de faire des multiplications et des lapins.
	(...)
	- Lui, il dit qu'il veut se limiter : pas plus de 150 par mois."
	Le Papet ricana :
	"Bravo ! Bravo !
	- Et il va les nourrir avec des coucourdes chinoises qui ont la peau en bois. Il dit que ça pousse aussi vite qu'un serpent qui sort du trou, et chaque plante peut faire au moins cent kilos de coucourdes, mais lui, il se contentera de cinquante.
	- Galinette, tu es sûr que tu n'exagères pas un peu ?
	- Oh ! pas du tout. Je te répète ce qu'il m'a dit.
	- Il s'est peut-être foutu de toi ?
	- Par moments, je me le suis demandé. Et puis non, c'est du sérieux :
	il y croit. Ce matin, il a encore fait monter un gros voyage de grillage, de piquets, de ciment.
	(...)
	- Eh bien, tout ça me plaît beaucoup, parce que cet homme, le Bon Dieu nous l'a fait sur mesure. Dans six mois, il sera parti.


Ecrire dans ce texte l'expression régulière permettant de resortir tous les mots termes suivants : 
* Les lettres a, b et c
* Tous les mots de trois lettres
* Tous les mots qui commencent par la lettre e

Un peu plus tordu ...

* Toutes les phrases issues d'un dialogue
* Toutes les phrases non-issues d'un dialogue
* Proposer une expression régulière intéressante. 

### Exercice 2

Nous allons maintenant utiliser les expressions regulières à travers le PHP. Nous allons pouvoir faire des recherches, des recherches et remplacement ... Et vous l'avez probablement deviné, nous allons utilisé des fonctions PHP pour ce faire. Vous pouvez tester vous expressions régulières sur Sublime Text ou sur ce (site pour tester des REGEX en ligne)[https://regex101.com/].

Voici (le manuel officiel PHP pour les REGEX)[http://php.net/manual/fr/ref.regex.php]. Inutile de dire que ... Vous en aurez besoin.

* Créer un formulaire pouvant recevoir un numéro de téléphone et un email 
* Créer l'expression régulière permettant de vérifier qu'un utilisateur à saisie un numéro de téléphone sous la forme 01 23 45 56 89. Les espaces sont importants. 
* Créer l'expression régulière permettant de vérifier un email.
* Créer l'expression régulière permettant de remplacer ce qu'il y a après l'@ d'un mail par "cachemonmail". Ainsi amari.sofiane.wf3@gmail.com deviendra amari.sofiane.wf3@cachemonmail
* Utiliser la fonction (ereg_replace)[http://php.net/manual/fr/function.ereg-replace.php] pour afficher dans la page reception.php de reception du formalaire (action="reception.php"), le mail saisie par le mail sous la forme cachée.

# Liens utiles

* [Le classsique OpenClassRooms](http://openclassrooms.com/courses/concevez-votre-site-web-avec-php-et-mysql/les-expressions-regulieres-partie-1-2)
* [Une documentation de Sublime Text](http://sublime-text-unofficial-documentation.readthedocs.org/en/latest/search_and_replace/search_and_replace_overview.html)
* [Site d'exercices](http://elizia.net/regex/)
* (Site pour tester des REGEX en ligne)[https://regex101.com/]
