# Définition

Une API est une interface avec votre application. C'est un moyen de communiquer avec elle. Ainsi par exemple, en tapant www.tkof.com/profil.php?Pseudo=Coolman&info=Twitter l'application devra renvoyer le compte Twitter de Coolman dans une forme que nous sommes capable d'interpreter. Les deux formes les plus utilisés sur le Web sont XML et Json. Nous en avions déjà parlé.
En somme, une API est une manière d'intéragire avec d'autres programmes. Les programmes complexes sont souvent composés de plusieurs briques. Chacune d'entre elles communique avec les autres via des API. Il est donc important pour nous de voir non seulement des API existantes mais également d'en programmer une minimaliste. 

## Exemples d'API
### [OpenWeater](http://openweathermap.org/api) Météo en ligne

Pour obtenir la Méto pour une **ville donnée**, ici **Londres** :
  
    In JSON api.openweathermap.org/data/2.5/weather?q=London,uk
    in XML api.openweathermap.org/data/2.5/weather?q=London&mode=xml

### [Vélib](https://developer.jcdecaux.com/#/opendata/vls?page=static&contract=Lyon)

Cliquez sur le titre Vélib pour voir les différentes villes disponibles.

Pour obtenir l'état de tous les vélos actuellement en ligne sur Amiens

https://api.jcdecaux.com/vls/v1/stations?contract=Amiens&apiKey=e9c2693dfe1a3c061bbc102703796fe78639b119

# Exercice isolé

* Récuperer sur **OpenWeathermap** la météo à **Paris** aujourd'hui.
* Récuperer sur Toyama au Japon la méto ainsi que l'état des vélibs actuellement. On pourrait imaginer une application se servant de ces deux APIs. 

Par exemple, en étudiant l'influence de la météo sur l'utilisation des Vélibs ! 
De nombreuses données d’institutions publiques sont maintenant disponibles, voir par exemple; https://www.data.gouv.fr/fr/, http://opendatafrance.net/, http://www.data-publica.com/.

* Cherchez des APIS (par exemple avec les liens des institutions publiques) et imaginer des applications utilisant plusieurs API. Vous pouvez également utiliser des flux RSS.

# Exercice projet

Nous allons faire une API pour deux fonctionnalités. Elles doivent renvoyer les données en format JSON. Vous trouverez just en dessous un exemple de format JSON simple qui renvoit deux résutats (séparés par des crochets). 

    [
      {
        "_id": "54929a47330cf352a01c1d28",
        "index": 0,
        "guid": "035cda1a-fecb-4a11-9fce-7a86ce845ce4",
        "isActive": true,
        "balance": "$3,575.97",
        "picture": "http://placehold.it/32x32",
        "tags": [
          "cupidatat",
          "exercitation",
          "exercitation",
          "in",
          "in",
          "ea",
          "in"
        ]
      },
      {
        "_id": "54929a47b754b2733b011d24",
        "index": 1,
        "guid": "ea2be448-a759-489d-8e59-6844b04de838",
        "isActive": true,
        "balance": "$2,846.62",
        "picture": "http://placehold.it/32x32",
        "tags": [
          "voluptate",
          "proident",
          "in",
          "incididunt",
          "est",
          "aute",
          "in"
        ]
      }
    ]

Voici les fonctionnalités à développer pour le projet : 

* La position du joueur quand on donne le nom du joueur, la saison et la journée **via des paramètres d'URL**. Nous allons utiliser la particularité des formulaires envoyés par la METHOD "GET" qui transmettent les données dans l'URL. J'attire votre attention sur le fait que nous développons ici une API. Une API n'est pas destinée à l'utilisateur final mais aux développeurs. Nous n'allons pas développer une interface en HTML mais simplement coder un script qui exploitera l'URL donnée.

Ainsi en tappant (comme dit dans l'introduction) : 

    www.tkof.com/profil.php?Pseudo=Coolman&info=Twitter

Notre API devra générer un text renvoyant les donneés demandées au format JSON.

* Le message d'accueil écrit par un administrateur. On pourrait imaginer une application qui utilisera cette API pour récuperer très simplement ce message et l'afficher sur une application mobile par exemple.
